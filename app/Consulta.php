<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    // vacina, data, veterinario, desc, pet
    protected $table = 'consulta';

    protected $fillable = [
        'vacina', 'data', 'vet_id', 'descricao', 'pet_id', 'remedio', 'user_id'
    ];

    function vet() {
        return $this->belongsTo('App\Veterinario');
    }

    function pet() {
        return $this->belongsTo('App\Pet');
    }

    function user() {
        return $this->belongsTo('App\User');
    }

    public $timestamps = false;

}
