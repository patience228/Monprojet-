<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    protected $fillable = ['date_Cmde','num_Clt','num_Clt','num_Prdt','Qte_Cmde'];
    protected $primaryKey = 'num_Cmde';
    public function client(){
        return $this->belongsTo('App\Client');
    }

    
}
