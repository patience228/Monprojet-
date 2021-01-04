<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['nom_Clt','adr_Clt','tel_Clt','BP_Clt','cod_Categ'];
    public function categorie(){
        return $this->belongsTo('App\Categorie_client');
    }
    public function commande_client(){
        return $this->hasMany('App\Commande');
    }
}
