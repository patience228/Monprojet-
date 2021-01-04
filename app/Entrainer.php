<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entrainer extends Model
{
    protected $fillable = ['num_Fact','num_Reglem','MT_Reglem','REM'];
    public function facture(){
        return $this->belongsTo('App\Facture');
    }
    public function reglement(){
        return $this->belongsTo('App\Reglement');
    }
}
