<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHabilidadPokemonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('habilidad_pokemon', function (Blueprint $table) {
             $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            
            $table->bigIncrements('id');
            $table->bigInteger('idpokemon')->unsigned();
            $table->bigInteger('idhabilidad')->unsigned();
            
            $table->timestamps();
            $table->softDeletes();
            
            $table->unique(['idpokemon','idhabilidad']);
            $table->foreign('idpokemon')->references('id')->on('pokemon');
            $table->foreign('idhabilidad')->references('id')->on('habilidad');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('habilidad_pokemon');
    }
}
