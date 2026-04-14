<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //indicar cuales son los campos que el usuario si puede cambiar
    protected $fillable = ['nombre','cantidad','categoria','descuento','precio'];
}
