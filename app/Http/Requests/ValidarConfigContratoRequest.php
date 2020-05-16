<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarConfigContratoRequest extends FormRequest
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
            'inicial' => 'required|min:1|max:4',
            'correlativo' => 'required|numeric',
            'gestion' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'inicial.required' => 'El :attribute es obligatorio.',
            'inicial.min' => 'El :attribute debe contener mas de una letra.',
            'inicial.max' => 'El :attribute debe contener maximo 4 letras.',

            'correlativo.required' => 'El :attribute es obligatorio.',
            'correlativo.numeric' => 'El :attribute debe ser un Número.',

            'gestion.required' => 'La :attribute es obligatorio.',
            'gestion.numeric' => 'La :attribute deber ser un Número.'
        ];
    }

    public function attributes()
    {
        return [
            'inicial' => 'La Letra Inicial',
            'correlativo' => 'Número Correlativo',
            'gestion' => 'Gestón'
        ];
    }
}
