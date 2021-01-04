<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Commande;
use App\Agent;
use App\Facture;
use App\Produit;
use Illuminate\Support\Facades\DB;
use App\Charts\BloodPressure;

class baseController extends Controller
{
    public function index(){
        $nb_Clt=Client::all()->Count() ;
        $nb_Fact=Facture::all()->Count() ;
        
        $nb_Ag=Agent::all()->Count() ;
        $nb_Cmd=Commande::all()->Count() ;
        



        $cmd= DB::table('porters')
        ->join('commandes','porters.num_Cmde','=','commandes.num_Cmde')
        ->distinct()
        ->join('produits','porters.num_Prdt','=','produits.num_Prdt')
        ->distinct()
        ->join('clients','commandes.num_Clt','=','clients.num_Clt')
        ->distinct()
        ->select('commandes.*','produits.*','clients.nom_Clt','porters.*')
        ->orderBy('commandes.date_Cmde')
        ->pluck('porters.Qte_Cmde','produits.design_Prdt');
        $carte= new BloodPressure;
        $carte->labels($cmd->keys());
        $carte->dataset( 'Sortie','bar',  $cmd->values())->backgroundColor('#00CED1');
 
        
        $prod=Produit::orderBy('date_Entree')->pluck('Qte_achete','design_Prdt');;
        $produit= new BloodPressure;
        $produit->labels($prod->keys());
        $produit->dataset( 'Entrée','bar',  $prod->values())->backgroundColor('rgba(0,0,0, .4)');
 
        return view('base',compact('carte','produit','nb_Clt','nb_Fact','nb_Ag','nb_Cmd'));
       
    }
}
