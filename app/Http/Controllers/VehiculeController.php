<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Vehicule;
class VehiculeController extends Controller
{
  
       public function index(){

        return view('Vehicules.inserer_Veh');
    }


    public function enregistrer() {

        request()->validate([
            'num'=>['required','String','min:6'],
            'marque'=>['required','String','max:15'],
            'categ'=>['required','String','max:15']
            
        ]);

        $Vehicule= new Vehicule;
        
            $Vehicule->num_Mat=request('num');
            $Vehicule->marque=request('marque');
            $Vehicule->categ_veh=request('categ');
          
        
        $ver = $Vehicule->save();

        if($ver){
            return back()->with('success','Enregistrement éffectué avec succès');
            
        }
        
     
    }

    public function lister() {
        $Vehicules = Vehicule::paginate(10);

        return view('Vehicules.liste_Veh',[
            'Vehicules'=> $Vehicules
        ]);
    }

    public function edit( $id) {
        
     
        $Vehicule = DB::Table('vehicules')->where('num_Mat','=',$id)->first();
      
       return view('Vehicules.edit_Veh',compact('Vehicule'));
    }

    public function update(Request $request, $id) {
      
       $this->validate($request,[
        'num'=>'required|String|min:6',
        'marque'=>'required|String|max:15',
        'categ'=>'required|String|max:15',
        
        
    ]);
        DB::Table('vehicules')->where('num_Mat','=',$id)->update([
       'num_Mat' => $request->num,
        'marque' => $request->marque,
        'categ_Veh' => $request->categ,
        
        ]);
        
        return redirect()->route('lister_Veh',$id)->with('success','Modification éffectuée avec succès');

    }


    public function destroy($id) {
        DB::Table('vehicules')->where('num_Mat','=',$id)->delete();
       return back()->with('success','Suppression éffectuée avec succès');
    }

    public function search() {
        $q=request()->input('search');
        
        $Vehicules=Vehicule::where('num_Mat','like',"%$q%")
                    ->orWhere('marque','like',"%$q%")
                    ->orWhere('categ_Veh','like',"%$q%")
                    ->get();

        return view('Vehicules.search')->with('Vehicules',$Vehicules);
    }

}
