<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Fournisseur;
use App\Produit;
use App\Livrer2;

class Livrer2Controller extends Controller
{
    public function index(){

        $Fournisseurs = Fournisseur::all();
        $Produits = Produit::all();
        $Livrer2= new Livrer2();

        return view('Livrer2.stock',compact('Fournisseurs','Produits','Livrer2'));

    }


    public function enregistrer() {

        request()->validate([
            'Frs'=>['required','String',],
            'Prdt'=>['required','String'],
            'dte'=>['required','Date'],
            'Qte'=>['required','Integer']
            
        ]);
        $Livrer2= new Livrer2;
       $today=date("Y-m-d");

            $Livrer2->num_Frs=request('Frs');
            $Livrer2->num_Prdt=request('Prdt');
            $Livrer2->date_Entree=$today;           
            $Livrer2->Qte_achete=request('Qte');
            $ver = $Livrer2->save();

        if($ver){
            
            return back()->with('success','Enregistrement éffectué avec succès');
        }
        

     
    }

    public function lister() {
        /*$Livrer2s = Livrer2::all();

        return view('Livrer2.entree',[
            'Livrer2s'=> $Livrer2s
        ]);*/

        $approvisionnements = DB::table('livrer2s')
        ->join('fournisseurs', 'livrer2s.num_Frs','=','fournisseurs.num_Frs')
        ->distinct()
        ->join('produits','livrer2s.num_Prdt','=','produits.num_Prdt')
        ->distinct()
        ->select('livrer2s.*','fournisseurs.nom_Frs','produits.design_Prdt')
        ->get();
        return view('Livrer2.entree', [
        'approvisionnements' => $approvisionnements
        ]);
    }


    public function edit( $id) {
        $Fournisseurs = Fournisseur::all();
        $Produits = Produit::all();
        
        $approvisionnement = DB::Table('livrer2s')->where('num_Entree','=',$id)->first();
        
       return view('Livrer2.edit_Livr2',compact('approvisionnement','Fournisseurs','Produits'));
    }

    public function update(Request $request, $id) {
       
       $this->validate($request,[
        'Frs'=>'required|String',
        'Prdt'=>'required|String',
        'dte'=>'required|Date',
        'Qte'=>'required|Integer',
        
       
        
    ]);
        DB::Table('livrer2s')->where('num_Entree','=',$id)->update([
       'num_Frs' => $request->Frs,
        'num_Prdt' => $request->Prdt,
        'date_Entree' => $request->dte,
        'Qte_achete' => $request->Qte,
        
        ]);
        
        return redirect()->route('lister_Livr2',$id)->with('success','Modification éffectuée avec succès');

    }


    public function destroy($id) {
        DB::Table('livrer2s')->where('num_Entree','=',$id)->delete();
       return back();
    }

    public function sortie() {

    $cmds = DB::table('porters')
    ->join('commandes','porters.num_Cmde','=','commandes.num_Cmde')
    ->distinct()
    ->join('produits','porters.num_Prdt','=','produits.num_Prdt')
    ->distinct()
    ->join('clients','commandes.num_Clt','=','clients.num_Clt')
    ->distinct()
    ->select('commandes.*','produits.*','clients.nom_Clt','porters.*')
    ->orderBy('commandes.num_Cmde','desc')
    ->get();
    return view('Livrer2.entree', [
    'cmds' => $cmds
    ]);
}
}
