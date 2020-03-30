<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ValidarDepartamentoRequest extends FormRequest
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
            'departamento' => 'required|min:1|max:15|alpha',
            'sigla' => 'required|min:1|max:4|alpha', 
            'estado' => [
                        'required',
                        Rule::in(['1', '0']),
            ]
        ];
    }

    public function messages()
    {
        return [
            'departamento.required' => 'El :attribute es obligatorio.',
            'departamento.min' => 'El :attribute debe contener mas de una letra.',
            'departamento.max' => 'El :attribute debe contener maximo 15 letras.',
            'departamento.alpha' => 'El :attribute solo debe contener letras.',

            'sigla.required' => 'La :attribute es obligatorio.',
            'sigla.min' => 'La :attribute debe contener más de una letra.',
            'sigla.max' => 'La :attribute debe contener maximo 4 letras.',
            'sigla.alpha' => 'La :attribute solo debe contener letras.',

            'estado.required' => 'El :attribute es obligatorio'
        ];
    }

    public function attributes()
    {
        return [
            'departamento' => 'Nombre de Departamento',
            'sigla' => 'Sigla del Departamento',
            'estado'=> 'Estado del Departamento'
        ];
    }
}
