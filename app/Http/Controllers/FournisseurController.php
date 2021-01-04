<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Fournisseur;

class FournisseurController extends Controller
{
    public function index(){

        return view('Fournisseurs.inscrire');
    }


    public function enregistrer() {

        request()->validate([
            'nom'=>['required','String','max:30'],
            'adresse'=>['required','max:15'],
            'BP'=>['required','max:15'],
            'tel'=>['required','Integer','min:8']

        ]);

        $Fournisseur= new Fournisseur;
        
            $Fournisseur->nom_Frs=request('nom');
            $Fournisseur->adr_Frs=request('adresse');
            $Fournisseur->BP_Frs=request('BP');
            $Fournisseur->tel_Frs=request('tel');

        $ver = $Fournisseur->save();

        if($ver){
            
            return back()->with('success','Enregistrement éffectué avec succès');
        }
        
    }

    public function lister() {
        $Fournisseurs = Fournisseur::all();

        return view('Fournisseurs.liste_fournisseur',[
            'Fournisseurs'=> $Fournisseurs
        ]);
    }


    public function edit( $id) {
        
        $Fournisseur = DB::Table('fournisseurs')->where('num_Frs','=',$id)->first();
        
       return view('Fournisseurs.edit_Frs',compact('Fournisseur'));
    }

    public function update(Request $request, $id) {
       
       $this->validate($request,[
        'nom'=>'required|String|max:30',
        'adresse'=>'required|max:15',
        'BP'=>'required|max:15',
        'tel'=>'required|Integer|min:8',
        
    ]);
        DB::Table('fournisseurs')->where('num_Frs','=',$id)->update([
       'nom_Frs' => $request->nom,
        'adr_Frs' => $request->adresse,
        'BP_Frs' => $request->BP,
        'tel_Frs' => $request->tel,
        ]);
        
        return redirect()->route('lister_Frs',$id)->with('success','Modification éffectuée avec succès');

    }


    public function destroy($id) {
        DB::Table('fournisseurs')->where('num_Frs','=',$id)->delete();
       return back()->with('success','Suppression éffectuée avec succès');
    }
    public function search() {
        $q=request()->input('search');
        
        $Fournisseurs=Fournisseur::where('nom_Frs','like',"%$q%")
                    ->orWhere('adr_Frs','like',"%$q%")
                    ->orWhere('BP_Frs','like',"%$q%")
                    ->orWhere('tel_Frs','like',"%$q%")
                    ->get();

        return view('Fournisseurs.search')->with('Fournisseurs',$Fournisseurs);
    }
}
