<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Livrer2 extends Model
{
    protected $fillable = ['num_Frs','num_Prdt','date_Entree','Qte_achete'];
    public function fournisseur(){
        return $this->belongsTo('App\Fournisseur');
    }
    public function produit(){
        return $this->belongsTo('App\Produit');
    }
}
