<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agent;
use App\Produit;

class Logincontroller extends Controller
{
    public function index(){
        return view('welcome');
        }

    public function login(Request $request){

        
        $email=$request->email;
        $this->validate($request,['email'=>'required|email']);
        $password=$request->password;
        $this->validate($request,['password'=>'required']);
       /* $request=request()->validate([
            'email'=>['required','email'],
            'password'=>['required']
        ]);*/

        $ver=Agent::where(['email'=>$email,'password'=>$password])->first();
       

        if($ver){
            session()->put('Agent',$ver->nom_Ag);
            $Agent=session('Agent');
           // dd($Agent);
            

            if($ver->fonction == "caissier"){
                return redirect('/home');
            }

            if($ver->fonction == "admin"){
                return redirect('/base');
            }
            
            
        }
        return back()->withInput()->withErrors([
            'email' =>'Vos identifiants sont incorrects'
        ]);
        
    }
    public function logout(){
        
    }

    public function show()
    {
        $Produits = Produit::orderBy('num_Prdt','DESC')->Paginate(10);
        return view('Utilisateur.home',compact('Produits'));
    }

    

}
