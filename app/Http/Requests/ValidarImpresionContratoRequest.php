<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarImpresionContratoRequest extends FormRequest
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
            'id_req' => 'required|numeric',
            'firma1' => 'required',
            'cargo1' => 'required',
            'firma2' => 'required',
            'cargo2' => 'required',
            'firma3' => 'required',
            'cargo3' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'id_req.required' => 'El :attribute es obligatorio.',
            'id_req.numeric' => 'El :attribute debe contener solo numeros.',

            'firma1.required' => 'La :attribute es obligatorio',
            'cargo1.required' => 'El :attribute es obligatorio',

            'firma2.required' => 'La :attribute es obligatorio',
            'cargo2.required' => 'El :attribute es obligatorio',

            'firma3.required' => 'La :attribute es obligatorio',
            'cargo3.required' => 'El :attribute es obligatorio'
        ];
    }

    public function attributes()
    {
        return [
            'id_req' => 'Requerimiento',
            'firma1' => 'Firma 1',
            'cargo1' => 'Cargo 1',
            'firma2' => 'Firma 2',
            'cargo2' => 'Cargo 2',
            'firma3' => 'Firma 3',
            'cargo3' => 'Cargo 3'
        ];
    }
}
