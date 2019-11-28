<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pokemon extends Model
{
    //
    use SoftDeletes; //deleted_at
    protected $table = 'pokemon';
    
    protected $hidden = ['created_at','updated_at']; //sólo si hay campos que no se deben mostrar
    protected $fillable = ['nombre','peso','estatura','img' ]; //para definir los campos
     protected $attributes = ['img' => '/img/1.png'];
    
    
    public function habilidadPokemon(){
        return $this->hasMany('App\HabilidadPokemon');
    }
    
    public function post(){
        return $this->hasMany('App\Post');
    }
}
