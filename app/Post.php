<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    //
    use SoftDeletes; //deleted_at
    protected $table = 'post';
    
    protected $hidden = ['created_at','updated_at']; //sólo si hay campos que no se deben mostrar
    protected $fillable = ['iduser','idpokemon','asunto','contenido' ]; //para definir los campos
    
    public function user(){
        return $this->belongsTo('App\User','iduser');
    }
    
    public function pokemon(){
        return $this->belongsTo('App\Pokemon','idpokemon');
    }
    
    public function comentario(){
        return $this->hasMany('App\Comentario');
    }

}
