<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Produit;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($num)
    {
        //
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
        return view('cart.index',compact('num_client','Commandes'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
       // dd($request->id,$request->design,$request->model,$request->prix,$request->qte);

        $nbre=count($request->Qte);
      
        if($nbre > 0){
            $i=0;
           
            while($i<$nbre){

              $produits = Produit::find($request->Prdt[$i]);
              $num=$produits->num_Prdt;
              $name=$produits->design_Prdt;
              $model=$produits->model_Prdt;
              $prix=$produits->PV_Prdt;
              $client=$request->clt;
              $code=$request->code;

              $nom=[$name,$client,$code];
              $name=serialize($nom);
              //->toJson();
             // dd($name,unserialize($name));
             // session()->put('client',$request->clt);
             // session()->put('code',$request->code);
             // $client=session('client');
             // $code=session('code');

//dd($client,$code);

               
              if($produits->Qte_achete<$request->Qte[$i]){
                return back()->with('success','Quantité superieure à celle en stock ');
              }

              $qte = $request->Qte[$i];
              

              Cart::add($num,$name,$qte,$prix)
              ->associate('App\Produit');
              
             
      //dd($num,$name,$prix,$model,$qte);
               // $store=new Porter;
                
            //  dd($request->Prdt[$i],$request->Qte[$i]) ;

             // dd($request->Prdt[0],$request->Qte[0],$request->Prdt[1],$request->Qte[1]) ;
               
              //  $store->num_Cmde=$commande->num_Cmde;
               // $store->save();
                
              
              //  $produits->Qte_achete = $produits->Qte_achete - $request->Qte[$i];
             
                
               // $produits->save();
   
               
                $i++;
                

            }
         }
      
      
       
      return back()->with('success','Ajout éffectué avec succès ');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $rowId)
    {
        //
        Validator::make($request->all(),[
            'qty'=>'required|numeric'
        ]);

        //$n=$request->quantity;

        $data=$request->json()->all();

      /*  if($data['qty'] > $data['stock']){
            Session::flash('success','La quantité de ce produit n\'est pas disponible ');
            return response()->json(['error' => 'Product quantity has Not Available']);
        }*/
        Cart::update($rowId,$n);
        Session::flash('success','La quantité du produit est passée à '.$data['qty'].'.');
        return response()->json(['success' => 'Cart quantity has been updated']);

       /* Cart::update($rowId, [
            'quantity' => ['relative' => false, 'value' => $request->quantity],
        ]);
         
        return back()->with('success','La quantité a été modifié');*/

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($rowId)
    {
        //
        Cart::remove($rowId);
        return back()-> with('success','Le produit a été supprimé.');

    }
}
