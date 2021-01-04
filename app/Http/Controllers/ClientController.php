<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Client;
use App\Categorie_client;

class ClientController extends Controller
{

    public function index(){

        $Categories = Categorie_client::all();
        $Client= new Client();

        return view('Clients.enregistrement',compact('Categories','Client'));

        //return view('Clients.enregistrement');
    }


    public function enregistrer() {

        request()->validate([
            'nom'=>['required','String','max:30'],
            'adresse'=>['required','max:15'],
            'tel'=>['required','Integer','min:8'],
            'BP'=>['required','max:15'],
            'categorie'=>['required','String']
        ]);
            $Client= new Client;
        
            $Client->nom_Clt=request('nom');
            $Client->adr_Clt=request('adresse');
            $Client->tel_Clt=request('tel');
            $Client->BP_Clt=request('BP');
            $Client->cod_Categ=request('categorie');
           
        
        $ver = $Client->save();

        if($ver){
            
            return back()->with('success','Enregistrement éffectué avec succès');
        }
     
    }

    public function lister() {
        /*$Clients = Client::all();

        return view('Clients.liste_client',[
            'Clients'=> $Clients
        ]);*/


        $cats = DB::table('clients')
        ->join('categorie_clients', 'clients.cod_Categ','=','categorie_clients.cod_Categ')
        ->distinct()
        ->select('clients.*','categorie_clients.design_Categ')
        ->get();
        return view('Clients.liste_client', [
        'cats' => $cats
        ]);
    }

    public function lister1() {
        $Clients = Client::all();

        return view('Clients.liste_client1',[
            'Clients'=> $Clients
        ]);
    }

    public function edit( $id) {
        
        $Categories = Categorie_client::all();
        
        $Client =DB::table('clients')
        ->join('categorie_clients', 'clients.cod_Categ','=','categorie_clients.cod_Categ')
        ->distinct()
        ->select('clients.*','categorie_clients.design_Categ')
        ->where('num_Clt','=',$id)->first();
        
       return view('Clients.modifier',compact('Client','Categories'));
       
    }

    public function update(Request $request, $id) {
       
       $this->validate($request,[
        'nom'=>'required|String|max:30',
        'adresse'=>'required|max:15',
        'tel'=>'required|Integer|min:8',
        'BP'=>'required|max:15',
        'categorie'=>'required|String'
        
        
       
    ]);
        DB::Table('clients')->where('num_Clt','=',$id)->update([
       'nom_Clt' => $request->nom,
        'adr_Clt' => $request->adresse,
        'tel_Clt' => $request->tel,
        'BP_Clt' => $request->BP,
        'cod_Categ'=> $request->categorie,
        
        ]);
        
        return redirect()->route('Clients.edit',$id)->with('success','Modification éffectuée avec succès');
      
    }


    public function destroy($id) {
        DB::Table('clients')->where('num_Clt','=',$id)->delete();
       return back()->with('success','Suppression éffectuée avec succès');
    }

    public function search1() {
        $q=request()->input('search');
        
        $Clients=Client::where('nom_Clt','like',"%$q%")
                    ->orWhere('adr_Clt','like',"%$q%")
                    ->orWhere('tel_Clt','like',"%$q%")
                    ->orWhere('BP_Clt','like',"%$q%")
                    ->get();

        return view('Clients.search1')->with('Clients',$Clients);
    }

    public function search() {
        $q=request()->input('search');
        
        $cats=DB::table('clients')
                    ->join('categorie_clients', 'clients.cod_Categ','=','categorie_clients.cod_Categ')
                    ->distinct()
                    ->where('clients.nom_Clt','like',"%$q%")
                    ->orWhere('clients.adr_Clt','like',"%$q%")
                    ->orWhere('clients.tel_Clt','like',"%$q%")
                    ->orWhere('clients.BP_Clt','like',"%$q%")
                    ->orWhere('categorie_clients.design_Categ','like',"%$q%")
                    ->get();

        return view('Clients.search')->with('cats',$cats);
    }

}
