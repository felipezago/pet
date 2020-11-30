<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVeterinarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('veterinario', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->string('rua');
            $table->string('bairro');
            $table->string('cidade');
            $table->string('telefone');
            $table->string('celular');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('veterinario');
    }
}
