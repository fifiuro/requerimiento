<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ValidarAfpRequest extends FormRequest
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
            'nombre' => 'required|min:1|max:255',
            'estado' => [
                        'required',
                        Rule::in(['1', '0']),
            ]
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El :attribute es obligatorio.',
            'nombre.min' => 'El :attribute debe contener mas de una letra.',
            'nombre.max' => 'El :attribute debe contener maximo 255 letras.',

            'estado.required' => 'El :attribute es obligatorio',
            'estado.in' => 'El :attribute debe contener estos valores: Activo o Desactivado.'
        ];
    }

    public function attributes()
    {
        return [
            'nombre' => 'nombre de AFP',
            'estado'=> 'Estado de AFP'
        ];
    }
}
