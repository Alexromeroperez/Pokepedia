<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comentario extends Model
{
    //
    use SoftDeletes; //deleted_at
    protected $table = 'comentario';
    
    protected $hidden = ['created_at','updated_at']; //sólo si hay campos que no se deben mostrar
    protected $fillable = ['iduser','idpost','comentario' ]; //para definir los campos

    public function user(){
        return $this->belongsTo('App\User','iduser');
    }
    
    public function pokemon(){
        return $this->belongsTo('App\Post','idpost');
    }
}
