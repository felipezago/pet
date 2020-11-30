<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{

    protected $table = 'usuario';

    protected $fillable = [
        'nome', 'email', 'senha',
    ];

    public $timestamps = false;
}
