<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Categorie_client;

class CategorieController extends Controller
{
    public function index(){

        return view('Categories.insertion');
    }


    public function enregistrer() {

        request()->validate([
            'design_Cat'=>['required','String']
        ]);

        $Categorie= new Categorie_client;
        
            $Categorie->design_Categ=request('design_Cat');
          
        $ver = $Categorie->save();
        if($ver){
            
            return back()->with('success','Enregistrement éffectué avec succès');
        }
        
    }

    public function lister() {
        $Categories = Categorie_client::all();

        return view('Categories.liste_categorie',[
            'Categories'=> $Categories
        ]);
    }


    
    public function edit( $id) {
        
        $Categorie = DB::Table('categorie_clients')->where('cod_Categ','=',$id)->first();
        
       return view('Categories.edit_Cat',compact('Categorie'));
    }

    public function update(Request $request, $id) {
       
       $this->validate($request,[
        'design_Cat'=>'required|String',
        
    ]);
        DB::Table('categorie_clients')->where('cod_Categ','=',$id)->update([
       'design_Categ' => $request->design_Cat,
        
        ]);
        
        return redirect()->route('lister_Categ',$id)->with('success','Modification éffectuée avec succès');

    }


    public function destroy($id) {
        DB::Table('categorie_clients')->where('cod_Categ','=',$id)->delete();
       return back()->with('success','Suppression éffectuée avec succès');
    }


    
    public function search() {
        $q=request()->input('search');
        
        $Categories=Categorie_client::where('design_Categ','like',"%$q%")
                    ->get();

        return view('Categories.search')->with('Categories',$Categories);
    }
}
