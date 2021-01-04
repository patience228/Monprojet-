<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comporter extends Model
{
    protected $fillable = ['num_Fact','num_Prdt','Qte_Fact','Qte_Bouteille'];
    public function facture(){
        return $this->belongsTo('App\Facture');
    }
    public function produit(){
        return $this->belongsTo('App\Produit');
    }
}
