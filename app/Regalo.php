<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Regalo extends Model
{
    //
    protected $fillable = [
        'puntos', 'user_regalo', 'user_recibio'
    ];
}
