<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Produit;
use App\Categorie_client;
use App\Client;
use App\Commande;
use App\Facture;

class ProductController extends Controller
{


    public function index(){

        $Categories = Categorie_client::all();
        $Client= new Client();

        return view('Utilisateur.Clients.enregistrement',compact('Categories','Client'));

        
    }

    public function lister() {
        
        $cats = DB::table('clients')
        ->join('categorie_clients', 'clients.cod_Categ','=','categorie_clients.cod_Categ')
        ->distinct()
        ->select('clients.*','categorie_clients.design_Categ')
        ->get();
        return view('Utilisateur.Clients.liste_client', [
        'cats' => $cats
        ]);
    }

    public function commande($length = 6){

        $Clients = Client::all();
        //$Commandes = Commande::all();
        $Produits = Produit::all();
        $Commande= new Commande();
       // $Porter= new Porter();
       $pool = '0123456789ABCDEFG';

     $num_client = substr(str_shuffle(str_repeat($pool, 5)), 0, $length);

        return view('Utilisateur.Commandes.inserer_Cmd',compact('Clients','Commande','Produits','num_client'));

        
    }


    public function commande_liste() {
        

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

        $fact= DB::table('factures')
        ->join('commandes','factures.num_Cmde','=','commandes.num_Cmde')
        ->distinct()
        ->select('commandes.num_Cmde','factures.num_Cmde')
       // ->where('commandes.num_Cmde','=','factures.num_Cmde')
        ->get();
        
        
       // dd($fact);

        return view('Utilisateur.Commandes.liste_Cmd', [
        'cmds' => $cmds,
        'fact' => $fact
        ]);
    }

    public function produit() {
        $Produits =  DB::table('produits')
        ->join('fournisseurs', 'produits.num_Frs','=','fournisseurs.num_Frs')
        ->distinct()
        ->select('produits.*','fournisseurs.nom_Frs')
        ->get();
        return view('Utilisateur.Produits.lister', [
        'Produits' => $Produits
        ]);

    }

    public function reglement() {
        


        $cmds =DB::table('entrainers')
        ->join('factures','entrainers.num_Fact','=','factures.num_Fact')
        ->distinct()
        ->join('reglements','entrainers.num_Reglem','=','reglements.num_Reglem')
        ->distinct()
        ->join('commandes','commandes.num_Cmde','=','factures.num_Cmde')
        ->distinct()
        ->select('factures.*','reglements.*','entrainers.*','commandes.*')
        ->orderBy('factures.num_Fact','desc')
       // ->where('commandes.code','=',$num_client)
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
        
      // dd($total);

        return view('Utilisateur.Reglements.liste_reglem',compact('cmds','num_client','Commandes','total'));
        
    }
}
