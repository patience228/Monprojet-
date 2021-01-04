<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Facture;
use App\Reglement;
use App\Entrainer;
use App\Commande;
use PDF;


class FactureController extends Controller
{
  
    public function index(){

        $Commandes = Commande::all();
        $Facture= new Facture();

        return view('Factures.inserer_fact',compact('Commandes','Facture'));

        
    }



    public function insert(Request $request,$num) {



      $num_client = $num;
      $Commandes = DB::table('porters')
      ->join('commandes','porters.num_Cmde','=','commandes.num_Cmde')
      ->distinct()
      ->join('produits','porters.num_Prdt','=','produits.num_Prdt')
      ->distinct()
      ->join('clients','commandes.num_Clt','=','clients.num_Clt')
      ->distinct()
      ->select('commandes.*','produits.*','clients.*','porters.*')
      ->where('commandes.code','=',$num_client)
      ->get();

      

      $total = 0;
      foreach ($Commandes as  $value) {
        # code...
        $total += $value->Qte_Cmde * $value->PV_Prdt;
      }

    //  dd($total);
        request()->validate([
            //'cmd'=>['required','Integer'],
           // 'fact'=>['required','String'],
            //'dte'=>['required','Date'],
           // 'echeance'=>['required','Date'],
            'mont'=>['required','Numeric'],
           'remise'=>['required','Integer'],
            'reglem'=>['required','String']
            
        ]);

        if($request->mont > $total){
          return back()->with('success','Montant superieur au total');
        }
       
        $commande=DB::table('commandes')->latest('num_Cmde')->first();

            $Facture= new Facture;
            $Facture->date_Fact=date("Y-m-d");
            $Facture->echeance=date("Y-m-d");
           // $Facture->code=$request->code;
            $Facture->num_Cmde=$commande->num_Cmde;
            $Facture->save();
            $fact=DB::table('factures')->latest('num_Fact')->first();

            $Reglement= new Reglement;
            $Reglement->date_Reglem=date("Y-m-d");
            $Reglement->type_Reglem=request('reglem');
            $Reglement->save();
            $reglem=DB::table('reglements')->latest('num_Reglem')->first();

            $ver=$Entrainer= new Entrainer;
            $Entrainer->num_Fact=$fact->num_Fact;
            $Entrainer->num_Reglem=$reglem->num_Reglem;
            $Entrainer->MT_Reglem=request('mont');
            $Entrainer->REM=request('remise');
            $Entrainer->reste=($total-request('remise'))-request('mont');
            $Entrainer->save();
            
            
            
           
        
        

        if($ver){
            
            return back()->with('success','Paiement éffectué avec succès');
        }else{
          return back()->with('success','Paiement non éffectué');
        }
     
    }



    public function enregistrer(Request $request,$num) {



      $num_client = $num;
      $Commandes = DB::table('porters')
      ->join('commandes','porters.num_Cmde','=','commandes.num_Cmde')
      ->distinct()
      ->join('produits','porters.num_Prdt','=','produits.num_Prdt')
      ->distinct()
      ->join('clients','commandes.num_Clt','=','clients.num_Clt')
      ->distinct()
      ->select('commandes.*','produits.*','clients.*','porters.*')
      ->where('commandes.code','=',$num_client)
      ->get();

      

      $total = 0;
      foreach ($Commandes as  $value) {
        # code...
        $total += $value->Qte_Cmde * $value->PV_Prdt;
      }

    //  dd($total);
        request()->validate([
            //'cmd'=>['required','Integer'],
           // 'fact'=>['required','String'],
            //'dte'=>['required','Date'],
            'echeance'=>['required','Date'],
            'mont'=>['required','Numeric'],
           'remise'=>['required','Integer'],
            'reglem'=>['required','String']
            
        ]);

        if($request->mont > $total){
          return back()->with('success','Montant superieur au total');
        }
       
        $commande=DB::table('commandes')->latest('num_Cmde')->first();

            $Facture= new Facture;
            $Facture->date_Fact=date("Y-m-d");
            $Facture->echeance=request('echeance');
           // $Facture->code=$request->code;
            $Facture->num_Cmde=$commande->num_Cmde;
            $Facture->save();
            $fact=DB::table('factures')->latest('num_Fact')->first();

            $Reglement= new Reglement;
            $Reglement->date_Reglem=date("Y-m-d");
            $Reglement->type_Reglem=request('reglem');
            $Reglement->save();
            $reglem=DB::table('reglements')->latest('num_Reglem')->first();

            $ver=$Entrainer= new Entrainer;
            $Entrainer->num_Fact=$fact->num_Fact;
            $Entrainer->num_Reglem=$reglem->num_Reglem;
            $Entrainer->MT_Reglem=request('mont');
            $Entrainer->REM=request('remise');
            $Entrainer->reste=($total-request('remise'))-request('mont');
            $Entrainer->save();
            
            
            
           
        
        

        if($ver){
            
            return back()->with('success','Paiement éffectué avec succès');
        }else{
          return back()->with('success','Paiement non éffectué');
        }
     
    }

    public function lister() {
        
      //$num_client=$num;
        $cmds =DB::table('entrainers')
        ->join('factures','entrainers.num_Fact','=','factures.num_Fact')
        ->distinct()
        ->join('reglements','entrainers.num_Reglem','=','reglements.num_Reglem')
        ->distinct()
        ->join('commandes','commandes.num_Cmde','=','factures.num_Cmde')
        ->distinct()
        ->select('factures.*','reglements.*','entrainers.*','commandes.code')
        //->where('factures.code','=',$num_client)
        ->orderBy('factures.num_Fact','desc')
        ->get();
        $num_client='';
        foreach ($cmds as  $value) {
          # code...
          $num_client=$value->code;
        }

        $Commandes =DB::table('porters')
        ->join('commandes','porters.num_Cmde','=','commandes.num_Cmde')
        ->distinct()
        ->join('produits','porters.num_Prdt','=','produits.num_Prdt')
        ->distinct()
        ->join('clients','commandes.num_Clt','=','clients.num_Clt')
        ->distinct()
        ->select('commandes.*','produits.*','clients.*','porters.*')
        ->where('commandes.code','=',$num_client)
        ->get();

        $total = 0;
    foreach ($Commandes as  $value) {
      # code...
      $total += $value->Qte_Cmde * $value->PV_Prdt;
    }
        
       

        return view('Factures.liste_fact',compact('cmds','num_client','Commandes','total'));
    }


    public function generate_pdf($num)
  {
    $num_client = $num;
    $Commandes =DB::table('commandes')
    ->join('produits','commandes.num_Prdt','=','produits.num_Prdt')
    ->distinct()
    ->join('clients','commandes.num_Clt','=','clients.num_Clt')
    ->distinct()
    ->select('commandes.*','produits.*','clients.nom_Clt')
    ->where('commandes.code','=',$num_client)
    ->get();
    
   

    $total = 0;
    foreach ($Commandes as  $value) {
      # code...
      $total += $value->Qte_Cmde * $value->PV_Prdt;
    }
  
return view('pdf.facture',compact('num_client','Commandes','total') );
  }


  
  public function getPdf ($num)
  {
    $num_client = $num;
    
      // L'instance PDF avec la vue resources/views/posts/show.blade.php
      $pdf = PDF::loadView('pdf.facture',compact('num_client'));
  
      // Lancement du téléchargement du fichier PDF
      return $pdf->stream('facture.pdf');
      
  }

  public function destroy($id) {
    DB::Table('factures')->where('num_Fact','=',$id)->delete();
   return back()->with('success','Suppression éffectuée avec succès');
}
  
}
