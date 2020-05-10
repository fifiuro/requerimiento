<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ValidarCargoRequest extends FormRequest
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
            'cargo' => 'required|min:1|max:255',
            'estado' => [
                        'required',
                        Rule::in(['1', '0']),
            ]
        ];
    }

    public function messages()
    {
        return [
            'id_are.required' => 'El :attribute es obligatorio.',
            'id_are.exists' => 'El :attribute debe existir en las Areas registradas.',

            'cargo.required' => 'El :attribute es obligatorio.',
            'cargo.min' => 'El :attribute debe contener mas de una letra.',
            'cargo.max' => 'El :attribute debe contener maximo 255 letras.',

            'estado.required' => 'El :attribute es obligatorio',
            'estado.in' => 'El :attribute debe contener estos valores: Activo o Desactivado.'
        ];
    }

    public function attributes()
    {
        return [
            'id_area' => 'Tipo Area',
            'cargo' => 'Nombre de Cargo',
            'estado'=> 'Estado del Cargo'
        ];
    }
}
