<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarPasoRequest extends FormRequest
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
            'id_req' => 'required|exists:requerimientos,id_req',
            'estado' => 'required',
            'observaciones' => 'required|min:1|max:255'
        ];
    }

    public function messages()
    {
        return [
            'id_req.required' => 'El :attribute es obligatorio.',
            'id_req.exists' => 'El :attribute debe registrados en nuestra base de datos.',

            'estado.required' => 'El :attribute es obligatorio.',

            'observaciones.required' => 'El :attribute es obligatorio',
            'observaciones.min' => 'Las :attribute debe contener minimo un caracter.',
            'observaciones.max' => 'Las :attribute debe contener maximo 255 caracteres.'
        ];
    }

    public function attributes()
    {
        return [
            'id_req' => 'Requerimiento',
            'estado' => 'Estado',
            'observaciones'=> 'Observaciones'
        ];
    }
}
