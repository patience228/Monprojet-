<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Agent;

class Agentcontroller extends Controller
{
       public function index(){

        return view('Agents.inscription');
    }


    public function enregistrer() {

        request()->validate([
            'nom'=>['required','String','max:30'],
            'fonction'=>['required','String','max:20'],
            'adresse'=>['required','max:15'],
            'tel'=>['required','Integer','min:8'],
            'email'=>['required','email','max:255','unique:agents,email'],
            'password'=>['required','min:8']
        ]);

        $Agent= new Agent;
        
            $Agent->nom_Ag=request('nom');
            $Agent->fonction=request('fonction');
            $Agent->adr_Ag=request('adresse');
            $Agent->tel_Ag=request('tel');
            $Agent->email=request('email');
            $Agent->password=(request('password'));
        
        $ver = $Agent->save();

        if($ver){
            return back()->with('success','Enregistrement éffectué avec succès');
            
        }
        
     
    }

    public function lister() {
        $Agents = Agent::paginate(10);

        return view('Agents.liste_Agent',[
            'Agents'=> $Agents
        ]);
    }

    public function edit( $id) {
        
        //$Agent = Agent::find($id);
        $Agent = DB::Table('agents')->where('num_Ag','=',$id)->first();
        //dd($Agent->nom_Ag);
       return view('Agents.edit_Ag',compact('Agent'));
    }

    public function update(Request $request, $id) {
       // $Agent->update($request->all());
       // return redirect('lister_Ag');
       $this->validate($request,[
        'nom'=>'required|String|max:30',
        'fonction'=>'required|String|max:20',
        'adresse'=>'required|max:15',
        'tel'=>'required|Integer|min:8',
        'email'=>'required|email|max:255',
        
        
    ]);
        DB::Table('agents')->where('num_Ag','=',$id)->update([
       'nom_Ag' => $request->nom,
        'fonction' => $request->fonction,
        'adr_Ag' => $request->adresse,
        'tel_Ag' => $request->tel,
        'email' => $request->email,
        
        ]);
        
        return redirect()->route('lister_Ag',$id)->with('success','Modification éffectuée avec succès');

    }


    public function destroy($id) {
        DB::Table('agents')->where('num_Ag','=',$id)->delete();
       return back()->with('success','Suppression éffectuée avec succès');
    }

    public function search() {
        $q=request()->input('search');
        
        $Agents=Agent::where('nom_Ag','like',"%$q%")
                    ->orWhere('fonction','like',"%$q%")
                    ->orWhere('adr_Ag','like',"%$q%")
                    ->orWhere('tel_Ag','like',"%$q%")
                    ->orWhere('email','like',"%$q%")
                    ->get();

        return view('Agents.search')->with('Agents',$Agents);
    }


}
