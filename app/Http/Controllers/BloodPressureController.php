<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\blood_pressure;
use App\Produit;
use Illuminate\Support\Facades\DB;
use App\Charts\BloodPressure;

class BloodPressureController extends Controller
{
    //
    public function index(Request $request){
        $bpRate= blood_pressure::orderBy('created_at')->pluck('rate','created_at');
        $bpSystolic= blood_pressure::orderBy('created_at')
                                ->pluck('systolic','created_at');
       
        $hRate = new BloodPressure;
        $hRate->labels($bpRate->keys());
        $hRate->dataset( 'Heart rate','bar',  $bpRate->values())->backgroundColor('red');

        $hRate->dataset( 'Heart systolic','line',  $bpSystolic->values())->backgroundColor('rgba(0,0,0, .4)');

       

       return view('index',compact('hRate'));
    }
    
}
