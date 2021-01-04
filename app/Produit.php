<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $fillable = ['design_Prdt','model_Prdt','PV_Prdt','Qte_achete'];
    protected $primaryKey = 'num_Prdt';
    public function livrer2_produit(){
        return $this->hasMany('App\Livrer2');
    }
}
