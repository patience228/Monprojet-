<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Reglement;



class ReglementController extends Controller
{

  
    public function index(){

        $Reglement= new Reglement();

        return view('Reglements.inserer_reglem',compact('Reglement'));

        
    }


    public function enregistrer() {

        request()->validate([
            'reglem'=>['required','String'],
            'dte'=>['required','Date']
        
            
        ]);
            $Reglement= new Reglement;
        
            $Reglement->type_Reglem=request('reglem');
            $Reglement->date_Reglem=request('dte');
           
            
           
        
        $ver = $Reglement->save();

        if($ver){
            
            return redirect()->route('index_entrainer');
        }
     
    }

    public function lister() {
        


        $cmds =DB::table('entrainers')
        ->join('factures','entrainers.num_Fact','=','factures.num_Fact')
        ->distinct()
        ->join('reglements','entrainers.num_Reglem','=','reglements.num_Reglem')
        ->distinct()
        ->join('commandes','commandes.num_Cmde','=','factures.num_Cmde')
        ->distinct()
        ->select('factures.*','reglements.*','entrainers.*','commandes.code')
        //->where('factures.code','=',$num_client
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
        
       

        return view('Reglements.liste_reglem',compact('cmds','num_client','Commandes','total'));
        
    }



    public function edit( $id) {
        
        //$Agent = Agent::find($id);
        $Reglem = DB::Table('entrainers')->where('num_Reglem','=',$id)->first();
        //dd($Agent->nom_Ag);
       return view('Reglements.edit_reglem',compact('Reglem'));
    }

    public function update(Request $request, $id) {
       // $Agent->update($request->all());
       // return redirect('lister_Ag');
       $this->validate($request,[
        'mont'=>'required|Numeric',
       
        
        
    ]);
    $n=DB::Table('entrainers')->where('num_Reglem','=',$id)->first();

    if($request->mont >  $n->reste){
        return back()->with('success','Montant superieur au reste');
    }
    //dd($n->MT_Reglem);
    $a=$n->MT_Reglem;
    $b=$a+$request->mont;
    $c=$n->reste - $request->mont;
       $ver= DB::Table('entrainers')->where('num_Reglem','=',$id)->update([
       'MT_Reglem' => $b,
       'reste' => $c,
        
        
        ]);
        if($ver){
            return redirect()->route('Reglements.edit',$id)->with('success','Règlement éffectué avec succès');
        }
       

    }

    public function destroy($id) {
        DB::Table('reglements')->where('num_Reglem','=',$id)->delete();
       return back()->with('success','Suppression éffectuée avec succès');
    }


   

    public function search() {

     $q=request()->input('nom');
     request()->validate([
        'nom'=>'String',
        
       
    ]);

    $credits =DB::table('entrainers')
    ->join('factures','entrainers.num_Fact','=','factures.num_Fact')
    ->distinct()
    ->join('reglements','entrainers.num_Reglem','=','reglements.num_Reglem')
    ->distinct()
    ->join('commandes','commandes.num_Cmde','=','factures.num_Cmde')
    ->distinct()
    ->join('clients','commandes.num_Clt','=','clients.num_Clt')
    ->distinct()
    ->select('factures.*','reglements.*','entrainers.*','clients.nom_Clt','commandes.code')
    ->where('entrainers.reste','>', 0)
    ->orderBy('reglements.num_Reglem','asc')
    ->get();
    //dd($credits);

    $num_client='';
        
    foreach ($credits as  $value) {
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

    return view('Etats.credit',compact('q','credits','Commandes','total','num_client'));
}

public function produit() {

    $q=request()->input('nom');
    request()->validate([
       'nom'=>'String',
       
      
   ]);
        $cmds = DB::table('porters')
        ->join('commandes','porters.num_Cmde','=','commandes.num_Cmde')
        ->distinct()
        ->join('produits','porters.num_Prdt','=','produits.num_Prdt')
        ->distinct()
        ->join('clients','commandes.num_Clt','=','clients.num_Clt')
        ->distinct()
        ->select('commandes.*','produits.*','clients.nom_Clt','porters.*')
        ->where('produits.design_Prdt','=',$q)
        ->orderBy('commandes.num_Cmde','asc')
        ->get();

        return view('Etats.produit',compact('q','cmds'));

}


public function model() {

    $q=request()->input('nom');
    request()->validate([
       'nom'=>'String',
       
      
   ]);
        $cmds = DB::table('porters')
        ->join('commandes','porters.num_Cmde','=','commandes.num_Cmde')
        ->distinct()
        ->join('produits','porters.num_Prdt','=','produits.num_Prdt')
        ->distinct()
        ->join('clients','commandes.num_Clt','=','clients.num_Clt')
        ->distinct()
        ->select('commandes.*','produits.*','clients.nom_Clt','porters.*')
        ->where('produits.model_Prdt','=',$q)
        ->orderBy('commandes.num_Cmde','asc')
        ->get();

        return view('Etats.model',compact('q','cmds'));

}

public function client() {

    $q=request()->input('nom');
    request()->validate([
       'nom'=>'String',
       
      
   ]);
        $cmds = DB::table('porters')
        ->join('commandes','porters.num_Cmde','=','commandes.num_Cmde')
        ->distinct()
        ->join('produits','porters.num_Prdt','=','produits.num_Prdt')
        ->distinct()
        ->join('clients','commandes.num_Clt','=','clients.num_Clt')
        ->distinct()
        ->select('commandes.*','produits.*','clients.nom_Clt','porters.*')
        ->where('clients.nom_Clt','=',$q)
        ->orderBy('commandes.num_Cmde','asc')
        ->get();

        return view('Etats.client',compact('q','cmds'));

}


public function categorie() {

    $q=request()->input('nom');
    request()->validate([
       'nom'=>'String',
       
      
   ]);
        $cmds = DB::table('porters')
        ->join('commandes','porters.num_Cmde','=','commandes.num_Cmde')
        ->distinct()
        ->join('produits','porters.num_Prdt','=','produits.num_Prdt')
        ->distinct()
        ->join('clients','commandes.num_Clt','=','clients.num_Clt')
        ->distinct()
        ->join('categorie_clients','clients.cod_Categ','=','categorie_clients.cod_Categ')
        ->distinct()
        ->select('commandes.*','produits.*','clients.nom_Clt','porters.*','categorie_clients.design_Categ')
        ->where('categorie_clients.design_Categ','=',$q)
        ->orderBy('commandes.num_Cmde','asc')
        ->get();

        return view('Etats.categorie',compact('q','cmds'));

}


public function achatP() {

    $q=request()->input('nom');
    request()->validate([
       'nom'=>'String',
       
      
   ]);
        $Produits =  DB::table('produits')
        ->join('fournisseurs', 'produits.num_Frs','=','fournisseurs.num_Frs')
        ->distinct()
        ->select('produits.*','fournisseurs.nom_Frs')
        ->where('produits.design_Prdt','=',$q)
        ->orderBy('produits.num_Prdt','asc')
        ->get();

        return view('Etats.achatP',compact('q','Produits'));

}



public function achatM() {

    $q=request()->input('nom');
    request()->validate([
       'nom'=>'String',
       
      
   ]);
        $Produits =  DB::table('produits')
        ->join('fournisseurs', 'produits.num_Frs','=','fournisseurs.num_Frs')
        ->distinct()
        ->select('produits.*','fournisseurs.nom_Frs')
        ->where('produits.model_Prdt','=',$q)
        ->orderBy('produits.num_Prdt','asc')
        ->get();

        return view('Etats.achatM',compact('q','Produits'));

}



    

}
