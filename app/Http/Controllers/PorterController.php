<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Commande;
use App\Produit;
use App\Porter;
class PorterController extends Controller
{
    public function index(){

        $Commandes = Commande::all();
        $Produits = Produit::all();
        $Porter= new Porter();

        return view('Commandes.inserer_porter',compact('Commandes','Produits','Porter'));

    }


    public function enregistrer() {

       request()->validate([
            //'Cmd'=>['required','String',],
            'Prdt'=>['required','String'],
            'Qte'=>['required','Integer']
            
        ]);
        $Porter= new Porter;
       /* $Commandes = DB::Table('commandes')->get('num_Cmde');
       $arr=['Commandes'=> $Commandes ];
        $num=$arr->last();*/
        $Commandes = DB::Table('commandes')->latest()->get('num_Cmde');
        //$num=implode(',',$Commandes->toArray());
        $num=$Commandes->implode('num_Cmde',',');
        $a=(int)$num;
       // $a=$num->latest();
        
//dd($a);
        
       // $num=$Commandes->num_Cmde;
           $Porter->num_Cmde=$a;
            $Porter->num_Prdt=request('Prdt');
            $Porter->Qte_Cmde=request('Qte');
            
           
        
        $ver = $Porter->save();

        if($ver){
            
            return back();
        }
        

     
    }
}
