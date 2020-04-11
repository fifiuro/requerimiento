<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ValidarDocumentoRequest extends FormRequest
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
            'documento' => 'required|min:1|max:255',
            'estado' => [
                        'required',
                        Rule::in(['1', '0']),
            ]
        ];
    }

    public function messages()
    {
        return [
            'documento.required' => 'El :attribute es obligatorio.',
            'documento.min' => 'El :attribute debe contener mas de una letra.',
            'documento.max' => 'El :attribute debe contener maximo 255 letras.',

            'estado.required' => 'El :attribute es obligatorio',
            'estado.in' => 'El :attribute debe contener estos valores: Activo o Desactivado.'
        ];
    }

    public function attributes()
    {
        return [
            'documento' => 'nombre del Documento',
            'estado'=> 'Estado del Documento'
        ];
    }
}
