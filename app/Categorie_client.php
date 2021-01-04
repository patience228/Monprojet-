<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie_client extends Model
{
    protected $fillable = ['design_Categ'];
    public function client_categorie(){
        return $this->hasMany('App\Client');
    }
}
