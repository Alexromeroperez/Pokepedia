<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HabilidadPokemon extends Model
{
    //
    use SoftDeletes; //deleted_at
    protected $table = 'habilidadpokemon';
    
    protected $hidden = ['created_at','updated_at']; //sólo si hay campos que no se deben mostrar
    protected $fillable = ['idpokemon','idhabilidad' ]; //para definir los campos
    
    public function pokemon(){
        return $this->belongsTo('App\Pokemon','idpokemon');
    }
    public function habilidad(){
        return $this->belongsTo('App\Habilidad','idhabilidad');
    }
}
