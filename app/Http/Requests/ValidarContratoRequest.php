<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ValidarContratoRequest extends FormRequest
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
            'contrato' => 'required|min:1|max:255',
            'estado' => [
                        'required',
                        Rule::in(['1', '0']),
            ]
        ];
    }

    public function messages()
    {
        return [
            'contrato.required' => 'El :attribute es obligatorio.',
            'contrato.min' => 'El :attribute debe contener mas de una letra.',
            'contrato.max' => 'El :attribute debe contener maximo 255 letras.',

            'estado.required' => 'El :attribute es obligatorio',
            'estado.in' => 'El :attribute debe contener estos valores: Activo o Desactivado.'
        ];
    }

    public function attributes()
    {
        return [
            'estadocivil' => 'nombre de Contrato',
            'estado'=> 'Estado del Contrato'
        ];
    }
}
