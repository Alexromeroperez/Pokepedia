<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComentarioRequest extends FormRequest
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
            'comentario' => 'comentario'
        ];
    }
    
    public function messages()
    {
        $mensaje='El campo :attribute es obligatorio';
        return [
            'comentario.required'    => $mensaje,
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
            'comentario'=>'required',
        ];
    }
}
