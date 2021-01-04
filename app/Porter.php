<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Porter extends Model
{
    protected $fillable = ['num_Cm','num_Prdt','Qte_Cmde'];
    /*public function commande(){
        return $this->belongsTo('App\Commande');
    }*/
    public function produit(){
        return $this->belongsTo('App\Produit');
    }
}
