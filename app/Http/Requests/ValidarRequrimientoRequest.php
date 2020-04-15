<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ValidarRequrimientoRequest extends FormRequest
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
            'id_per' => 'required|exists:datos_personales,id_per',
            'id_cen' => 'required|exists:centro_salud,id_cen',
            'id_con' => 'required|exists:contratos,id_con',
            'id_car' => 'required|exists:cargos,id_car',
            'id_niv' => 'required|exists:niveles,id_niv',
            'motivo' => 'required|min:1|max:255',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
            'nota_requerimiento' => 'required|min:1|max:50',
            'fecha_nota_requerimiento' => 'required|date',
            'observaciones' => 'required|min:1|max:255',
            'estado' => [
                        'required',
                        Rule::in(['1', '0']),
            ]
        ];
    }

    public function messages()
    {
        return [
            'id_per' => 'Los :attribute es obligatorio.',
            'id_per' => 'los :attribute debe estar registradas.',

            'id_cen' => 'Los :attribute es obligatorio.',
            'id_cen' => 'los :attribute debe estar registradas.',

            'id_con' => 'Los :attribute es obligatorio.',
            'id_con' => 'los :attribute debe estar registradas.',

            'id_car' => 'El :attribute es obligatorio.',
            'id_car' => 'El :attribute debe estar registradas.',

            'id_niv' => 'El :attribute es obligatorio.',
            'id_niv' => 'El :attribute debe estar registradas.',

            'motivo.required' => 'El :attribute es obligatorio.',
            'motivo.min' => 'El :attribute debe contener mas de una letra.',
            'motivo.max' => 'El :attribute debe contener maximo 255 letras.',

            'fecha_inicio.required' => 'La :attribute es obligatorio',
            'fecha_inicio.date' => 'La :attribute tiene que tener el formato fecha: YYYY-MM-DD',

            'fecha_fin.required' => 'La :attribute es obligatorio',
            'fecha_fin.date' => 'La :attribute tiene que tener el formato fecha: YYYY-MM-DD',

            'nota_requerimiento.required' => 'La :attribute es obligatorio.',
            'nota_requerimiento.min' => 'La :attribute debe contener mas de una letra.',
            'nota_requerimiento.max' => 'La :attribute debe contener maximo 50 letras.',

            'fecha_nota_requerimiento.required' => 'La :attribute es obligatorio',
            'fecha_nota_requerimiento.date' => 'La :attribute tiene que tener el formato fecha: YYYY-MM-DD',

            'observaciones.required' => 'La :attribute es obligatorio.',
            'observaciones.min' => 'La :attribute debe contener mas de una letra.',
            'observaciones.max' => 'La :attribute debe contener maximo 255 letras.',

            'estado.required' => 'El :attribute es obligatorio',
            'estado.in' => 'El :attribute debe contener estos valores: Activo o Desactivado.'
        ];
    }

    public function attributes()
    {
        return [
            'id_per' => 'Datos Personales',
            'id_cen' => 'Centro de Salud',
            'id_con' => 'Tipo de Contrato',
            'id_car' => 'Cargo',
            'id_niv' => 'Nivel',
            'motivo' => 'Motivo de Contrato',
            'fecha_inicio' => 'Fecha de Inicio de Contrato',
            'fecha_fin' => 'Fecha de Fin de Contrato',
            'nota_requerimiento' => 'Nota de Requerimiento',
            'fecha_nota_requerimiento' => 'Fecha de la Nota de Requerimiento',
            'observaciones' => 'Observación',
            'estado'=> 'Estado del Requerimiento'
        ];
    }
}
