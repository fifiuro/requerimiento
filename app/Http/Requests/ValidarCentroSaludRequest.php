<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ValidarCentroSaludRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'codigo' => 'required|min:1|max:10',
            'nombre' => 'required|min:1|max:100',
            'direccion' => 'required|min:1|max:255',
            'estado' => [
                        'required',
                        Rule::in(['1', '0']),
            ]
        ];
    }

    public function messages()
    {
        return [
            'codigo.required' => 'El :attribute es obligatorio.',
            'codigo.min' => 'El :attribute debe contener mas de una letra.',
            'codigo.max' => 'El :attribute debe contener maximo 10 letras.',

            'nombre.required' => 'El :attribute es obligatorio.',
            'nombre.min' => 'El :attribute debe contener mas de una letra.',
            'nombre.max' => 'El :attribute debe contener maximo 100 letras.',

            'direccion.required' => 'El :attribute es obligatorio.',
            'direccion.min' => 'El :attribute debe contener mas de una letra.',
            'direccion.max' => 'El :attribute debe contener maximo 255 letras.',

            'estado.required' => 'El :attribute es obligatorio',
            'estado.in' => 'El :attribute debe contener estos valores: Activo o Desactivado.'
        ];
    }

    public function attributes()
    {
        return [
            'codigo' => 'Código del Centro de Salud',
            'nombre' => 'Nombre del Crçentro de Salud',
            'direccion' => 'Dirección del Centro de Salud',
            'estado'=> 'Estado del Departamento'
        ];
    }
}
