<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Produit;
use App\Fournisseur;


class ProduitController extends Controller
{

    public function index(){
        $Fournisseurs =Fournisseur::all();
        $Produit=new Produit;

        return view('Produits.enregistrer',compact('Fournisseurs','Produit'));
    }


    public function enregistrer() {

        request()->validate([
            'design'=>['required','String','max:20'],
            'model'=>['required','String','max:5'],
            'prix'=>['required','Integer'],
            'Frs'=>['required','String',],
            'Qte'=>['required','Numeric','min:0']
        ]);

        $Produit= new Produit;
        

            $Produit->design_Prdt=request('design');
            $Produit->model_Prdt=request('model');
            $Produit->PV_Prdt=request('prix'); 
            $Produit->num_Frs=request('Frs');
            $Produit->Qte_achete=request('Qte');
            $Produit->date_Entree=date("Y-m-d"); 

        
        $ver = $Produit->save();
        if($ver){
            
            return back()->with('success','Enregistrement éffectué avec succès');
         }
         
    }

    public function lister() {
        $Produits =  DB::table('produits')
        ->join('fournisseurs', 'produits.num_Frs','=','fournisseurs.num_Frs')
        ->distinct()
        ->select('produits.*','fournisseurs.nom_Frs')
        ->get();
        return view('Produits.lister', [
        'Produits' => $Produits
        ]);

    }

    public function edit( $id) {
        
        $Produit = DB::Table('produits')->where('num_Prdt','=',$id)->first();
        $Fournisseurs=Fournisseur::all();
       return view('Produits.edit_Prdt',compact('Produit','Fournisseurs'));
    }

    public function update(Request $request, $id) {
       
       $this->validate($request,[
        'design'=>'required|String|max:20',
        'model'=>'required|String|max:5',
        'prix'=>'required|Integer|min:3',
        'Frs'=>'required|String',
        'Qte'=>'required|Integer',

        
        
    ]);
        DB::Table('produits')->where('num_Prdt','=',$id)->update([
       'design_Prdt' => $request->design,
        'model_Prdt' => $request->model,
        'PV_Prdt' => $request->prix,
        'num_Frs' => $request->Frs,
        'Qte_achete' => $request->Qte,
        
        ]);
        
        return redirect()->route('lister_Prdt',$id)->with('success','Modification éffectuée avec succès');

    }


    public function destroy($id) {
        DB::Table('produits')->where('num_Prdt','=',$id)->delete();
       return back()->with('success','Suppression éffectuée avec succès');
    }

    public function search() {
        $q=request()->input('search');
        
        $Produits=Produit::where('design_Prdt','like',"%$q%")
                    ->orWhere('model_Prdt','like',"%$q%")
                    ->orWhere('PV_Prdt','like',"%$q%")
                    ->get();

        return view('Produits.search')->with('Produits',$Produits);
    }
    
}
