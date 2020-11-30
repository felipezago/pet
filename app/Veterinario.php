<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Veterinario extends Model
{
    //nome, rua, bairro, cidade, telefone

    protected $table = 'veterinario';

    protected $fillable = [
        'nome', 'rua', 'bairro', 'cidade', 'telefone', 'celular', 'user_id'
    ];

    public $timestamps = false;

    function user() {
        return $this->belongsTo('App\User');
    }

}
