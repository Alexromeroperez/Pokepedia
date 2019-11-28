<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HabilidadRequest extends FormRequest
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
            'nombre' => 'nombre de la habilidad',
        ];
    }
    
    public function messages()
    {
        //por cada regla tienes que poner una en el array
        $mensaje='El campo :attribute es obligatorio';
        $max='La longitud maxima del campo :attribute es :max';
        return [
            'nombre.required'    => $mensaje,
            'nombre.max'         => $max,
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
            'nombre'=>'required|max:50|alpha_num',
        ];
    }
}
