<?php

namespace App\Http\Controllers;

use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Client;
use App\Commande;
use App\Produit;
use App\Porter;
class CommandeController extends Controller
{
    public function index($length = 6){

        $Clients = Client::all();
        //$Commandes = Commande::all();
        $Produits = Produit::all();
        $Commande= new Commande();
       // $Porter= new Porter();
       $pool = '0123456789ABCDEFG';

     $num_client = substr(str_shuffle(str_repeat($pool, 5)), 0, $length);

        return view('Commandes.inserer_Cmd',compact('Clients','Commande','Produits','num_client'));

        
    }


    public function enregistrer(Request $request) {
 
      /* $nbre=count($request->Qte);
      
        if($nbre > 0){
            $i=0;
           
            while($i<$nbre){

              $produits = Produit::find($request->Prdt[$i]);


               
              if($produits->Qte_achete<$request->Qte[$i]){
                return back()->with('success','Quantité superieure à celle en stock ');
              }
              
              $cmd=new Commande;
              $cmd->num_Clt=$request->clt;
              $cmd->code=$request->code;
              $cmd->date_Cmde=date("Y-m-d");
              $ver=$cmd->save();
              $commande=DB::table('commandes')->latest('num_Cmde')->first();
             
      
                $store=new Porter;
                
                $store->num_Prdt=$request->Prdt[$i];
                $store->Qte_Cmde=$request->Qte[$i];
                $store->num_Cmde=$commande->num_Cmde;
                $store->save();
                
              
                $produits->Qte_achete = $produits->Qte_achete - $request->Qte[$i];
             
                
                $produits->save();
   
               
                $i++;
                

            }


         }
      
      
       if($ver){
    return back()->with('success','Enregistrement éffectuée avec succès ');
       }*/
       $num_client;
       $code;
       foreach(Cart::content() as $tmp){
        $num_client=unserialize($tmp->name)[1];
        $code=unserialize($tmp->name)[2];
       }
//dd($num_client,$code);
       $cmd=new Commande;
       $cmd->num_Clt=(int)$num_client;
       $cmd->code=$code;
       $cmd->date_Cmde=date("Y-m-d");
       $ver=$cmd->save();

       foreach(Cart::content() as $produits){
        // dd($produits->model->Qte_achete -$produits->qty);
       $commande=DB::table('commandes')->latest('num_Cmde')->first();
      
       $store=new Porter;
                
       $store->num_Prdt=$produits->model->num_Prdt;
       $store->Qte_Cmde=$produits->qty;
       $store->num_Cmde=$commande->num_Cmde;
       $store->save();

       $pro = Produit::find($produits->model->num_Prdt);
       $pro->Qte_achete =$pro->Qte_achete- $produits->qty;
                
      $pro->save();
     }
     if($pro){
      Cart::destroy();
      return redirect()->route('liste_Cmd')->with('success','Commande enregistrée avec succès');
      }
        
        
    }

 

    public function lister() {
        

        $cmds = DB::table('porters')
        ->join('commandes','porters.num_Cmde','=','commandes.num_Cmde')
        ->distinct()
        ->join('produits','porters.num_Prdt','=','produits.num_Prdt')
        ->distinct()
        ->join('clients','commandes.num_Clt','=','clients.num_Clt')
        ->distinct()
        ->select('commandes.*','produits.*','clients.nom_Clt','porters.*')
        ->orderBy('commandes.code','desc')
        ->get();

        



        return view('Commandes.liste_Cmd', [
        'cmds' => $cmds
        ]);
    }



    public function client($num){

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
        return view('Commandes.client',compact('num_client','Commandes','total'));
      }




      public function edit( $id) {
        //$num_client=$num;
        $Clients = Client::all();
        $Produits = Produit::all();
        
        $commandes =Commande::findOrFail($id);
        
       return view('Commandes.edit_Cmd',compact('commandes','Clients','Produits'));
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
      Commande::destroy($id);
       return back()->with('success','suppression éffectuée avec succès');
    }
}
