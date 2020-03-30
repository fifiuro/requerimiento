<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ValidarEstadoCivilRequest extends FormRequest
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
            'estadocivil' => 'required|min:1|max:100',
            'estado' => [
                        'required',
                        Rule::in(['1', '0']),
            ]
        ];
    }

    public function messages()
    {
        return [
            'estadocivil.required' => 'El :attribute es obligatorio.',
            'estadocivil.min' => 'El :attribute debe contener mas de una letra.',
            'estadocivil.max' => 'El :attribute debe contener maximo 100 letras.',

            'estado.required' => 'El :attribute es obligatorio',
            'estado.in' => 'El :attribute debe contener estos valores: Activo o Desactivado.'
        ];
    }

    public function attributes()
    {
        return [
            'estadocivil' => 'Estado Civil',
            'estado'=> 'Estado del Departamento'
        ];
    }
}
