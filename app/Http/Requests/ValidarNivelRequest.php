<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ValidarNivelRequest extends FormRequest
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
            'id_are' => 'required|exists:areas,id_are',
            'nivel' => 'required|min:1|max:20',
            'horas' => 'required|numeric',
            'tiempo' => 'required|min:1|max:50',
            'salario' => 'required|numeric',
            'literal' => 'required|min:1|max:255',
            'estado' => [
                        'required',
                        Rule::in(['1', '0']),
            ]
        ];
    }

    public function messages()
    {
        return [
            'id_are' => 'El :attribute es obligatorio.',
            'id_are' => 'El :attribute debe existir en las Areas registradas.',

            'nivel.required' => 'El :attribute es obligatorio.',
            'nivel.min' => 'El :attribute debe contener mas de una letra.',
            'nivel.max' => 'El :attribute debe contener maximo 20 letras.',

            'horas.required' => 'La :attribute es obligatorio.',
            'horas.numeric' => 'La :attribute debe contener solo numeros.',

            'tiempo.required' => 'El :attribute es obligatorio.',
            'tiempo.min' => 'El :attribute debe contener mas de una letra.',
            'tiempo.max' => 'El :attribute debe contener maximo 50 letras.',

            'salario.required' => 'El :attribute es obligatorio.',
            'salario.numeric' => 'El :attribute debe contener solo numeros.',
            
            'literal.required' => 'El :attribute es obligatorio.',
            'literal.min' => 'El :attribute debe contener mas de una letra.',
            'literal.max' => 'El :attribute debe contener maximo 255 letras.',

            'estado.required' => 'El :attribute es obligatorio',
            'estado.in' => 'El :attribute debe contener estos valores: Activo o Desactivado.'
        ];
    }

    public function attributes()
    {
        return [
            'id_area' => 'Tipo Area',
            'nivel' => 'Nivel',
            'horas' => 'Hora',
            'tiempo' => 'Tiempo',
            'salario' => 'Salario',
            'literal' => 'Salario en Literal',
            'estado'=> 'Estado del Cargo'
        ];
    }
}
