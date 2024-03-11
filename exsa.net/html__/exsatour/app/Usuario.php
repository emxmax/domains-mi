<?php

namespace Exsatour;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';

    protected $fillable = ['nombres', 'apellidos', 'dni', 'ciudad', 'celular', 'email','bcrypt' ,'estado'];
}
