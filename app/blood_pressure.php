<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class blood_pressure extends Model
{
    //
    protected $fillable = [
        'rate',
        'systolic',
        'diastolic',
    ];

    protected $casts =[
        'id' =>'integer',
    ];
}
