<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    protected $fillable = ['date_Fact','type_Fact','echeance','num_Cmde'];
    public function commande(){
        return $this->belongsTo('App\Commande');
    }
}
