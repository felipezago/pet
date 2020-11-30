<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    //nome especie raça altura peso
    protected $table = 'tb_pet';

    protected $fillable = [
        'nome', 'especie', 'raca', 'altura', 'peso', 'user_id'
    ];

    public $timestamps = false;

    function user() {
        return $this->belongsTo('App\User');
    }
}
