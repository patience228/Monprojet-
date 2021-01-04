<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Facture;
use App\Produit;
use App\Comporter;

class ComporterController extends Controller
{
 
    public function index(){

        $Factures = Facture::all();
        $Produits =  DB::table('porters')
        ->join('factures', 'porters.num_Cmde','=','factures.num_Cmde')
        ->distinct()
        ->join('produits', 'porters.num_Prdt','=','produits.num_Prdt')
        ->distinct()
        ->select('porters.*','factures.num_Cmde','produits.*')
        ->orderBy('porters.num_Cmde')
        ->get();
        $Comporter= new Comporter();


        return view('Factures.inserer_comporter',compact('Factures','Produits','Comporter'));

    }


    public function enregistrer() {

       request()->validate([
          
            'Prdt'=>['required'],
            'Qte'=>['required','Integer'],
            'bte'=>['required','Integer']
            
        ]);
        $Comporter= new Comporter;
       
        $Commandes = DB::Table('factures')->latest()->get('num_Fact');
       
        $num=$Commandes->implode('num_Fact',',');
        $a=(int)$num;
       

            $Comporter->num_Fact=$a;
            $Comporter->num_Prdt=request('Prdt');
            $Comporter->Qte_Fact=request('Qte');
            $Comporter->Qte_Bouteille=request('bte');
            
           
        
        $ver = $Comporter->save();

        if($ver){
            
            return back();
        }
        

     
    }
}
