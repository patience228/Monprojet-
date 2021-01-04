<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Agent extends Model 
{

   
    protected $fillable = ['nom_Ag','fonction','adr_Ag','tel_Ag','email','password'];
    

}
