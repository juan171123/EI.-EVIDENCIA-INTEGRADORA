<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'usuarios'; 
    
    //indicar cuales son los campos que el usuario si puede cambiar
    protected $fillable = ['nombre','apellido','telefono','correo','contraseña'];
}
