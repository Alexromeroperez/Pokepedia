<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }


    public function attributes()
    {
        return [
            'asunto' => 'tema',
            'contenido' => 'comentario',
        ];
    }
        
    public function messages()
    {
        //por cada regla tienes que poner una en el array
        $mensaje='El campo :attribute es obligatorio';
        $max='La longitud maxima del campo :attribute es :max';
        return [
            'asunto.required'    => $mensaje,
            'asunto.max'         => $max,
            'contenido.required'     => $mensaje,
        ];
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'iduser'=>'',
            'idpokemon'=>'',
            'asunto'=>'required|max:50',
            'contenido'=>'required'
        ];
    }
}
