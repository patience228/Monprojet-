<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Emballage;

class EmballageController extends Controller
{
    public function index(){

        return view('Emballages.inserer');
    }


    public function enregistrer() {

        request()->validate([
            'design_Emb'=>['required','String']
        ]);

        $Emballage= new Emballage;
        
            $Emballage->design_Emb=request('design_Emb');
          
        $ver = $Emballage->save();
        if($ver){
            
            return back()->with('success','Enregistrement éffectué avec succès');
        }
        
    }

    public function lister() {
        $Emballages = Emballage::all();

        return view('Emballages.liste_emballage',[
            'Emballages'=> $Emballages
        ]);
    }


        
    public function edit( $id) {
        
        $Emballage = DB::Table('emballages')->where('cod_Emb','=',$id)->first();
        
       return view('Emballages.edit_Emb',compact('Emballage'));
    }

    public function update(Request $request, $id) {
       
       $this->validate($request,[
        'design_Emb'=>'required|String',
        
    ]);
        DB::Table('emballages')->where('cod_Emb','=',$id)->update([
       'design_Emb' => $request->design_Emb,
        
        ]);
        
        return redirect()->route('lister_Emb',$id)->with('success','Modification éffectuée avec succès');

    }


    public function destroy($id) {
        DB::Table('emballages')->where('cod_Emb','=',$id)->delete();
       return back()->with('success','Suppression éffectuée avec succès');
    }

    public function search() {
        $q=request()->input('search');
        
        $Emballages=Emballage::where('design_Emb','like',"%$q%")
                    ->get();

        return view('Emballages.search')->with('Emballages',$Emballages);
    }
}
