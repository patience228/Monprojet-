<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    protected $fillable = ['nom_Frs','adr_Frs','BP_Frs','tel_Ag'];
    public function livrer2_fournisseur(){
        return $this->hasMany('App\Livrer2');
    }
}
