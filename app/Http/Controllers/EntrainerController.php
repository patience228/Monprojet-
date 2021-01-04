<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Facture;
use App\Entrainer;
use App\Reglement;

class EntrainerController extends Controller
{

 
    public function index(){

        $Factures = Facture::all();
        $Reglements =  Reglement::all();
        $Entrainer= new Entrainer();


        return view('Reglements.inserer_entrainer',compact('Factures','Reglements','Entrainer'));

    }


    public function enregistrer() {

       request()->validate([
          
            'fact'=>['required'],
            'mont'=>['required','Integer'],
            'remise'=>['required','Integer']
            
        ]);
        $Entrainer= new Entrainer;
       
        $Commandes = DB::Table('reglements')->latest()->get('num_Reglem');
       
        $num=$Commandes->implode('num_Reglem',',');
        $a=(int)$num;
       

            $Entrainer->num_Reglem=$a;
            $Entrainer->num_Fact=request('fact');
            $Entrainer->MT_Reglem=request('mont');
            $Entrainer->REM=request('remise');
            
           
        
        $ver = $Entrainer->save();

        if($ver){
            
            return back();
        }
        

     
    }
}

