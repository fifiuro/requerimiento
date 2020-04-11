<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarDatoPersonalRequest extends FormRequest
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
            'nombre' => 'required|min:1|max:100',
            'paterno' => 'required|min:1|max:100',
            'materno' => 'required|min:1|max:100',
            'ci' => 'required|min:1|max:20',
            'id_dep' => 'required|exists:departamentos,id_dep',
            'matricula' => 'required|min:1|max:50',
            'id_est' => 'required|exists:estado_civil,id_est',
            'domicilio' => 'required|min:1|max:255',
            'id_afp' => 'required|exists:afp,id_afp',
            'telefono' => 'required|min:1|max:50',
            'celular' => 'required|min:1|max:50',
            'email' => 'required|min:1|max:100'
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El :attribute es obligatorio.',
            'nombre.min' => 'El :attribute debe contener más de una letra.',
            'nombre.max' => 'El :attribute debe contener máximo 100 letras.',

            'paterno.required' => 'El :attribute es obligatorio.',
            'paterno.min' => 'El :attribute debe contener más de una letra.',
            'paterno.max' => 'El :attribute debe contener máximo 100 letras.',

            'materno.required' => 'El :attribute es obligatorio.',
            'materno.min' => 'El :attribute debe contener más de una letra.',
            'materno.max' => 'El :attribute debe contener máximo 100 letras.',

            'ci.required' => 'El :attribute es obligatorio.',
            'ci.min' => 'El :attribute debe contener más de un número.',
            'ci.max' => 'El :attribute debe contener máximo 20 numeros.',

            'id_dep' => 'El :attribute es obligatorio.',
            'id_dep' => 'El :attribute debe estar registrado.',

            'matricula.required' => 'El :attribute es obligatorio.',
            'matricula.min' => 'El :attribute debe contener más de un caracter.',
            'matricula.max' => 'El :attribute debe contener máximo 50 caracteres.',

            'id_est' => 'El :attribute es obligatorio.',
            'id_est' => 'El :attribute debe estar registrado.',

            'domicilio.required' => 'El :attribute es obligatorio.',
            'domicilio.min' => 'El :attribute debe contener más de una letra.',
            'domicilio.max' => 'El :attribute debe contener máximo 255 letras.',

            'id_afp' => 'El :attribute es obligatorio.',
            'id_afp' => 'El :attribute debe estar registrado.',

            'telefono.required' => 'El :attribute es obligatorio.',
            'telefono.min' => 'El :attribute debe contener más de un número.',
            'telefono.max' => 'El :attribute debe contener máximo 50 numeros.',

            'celular.required' => 'El :attribute es obligatorio.',
            'celular.min' => 'El :attribute debe contener más de un número.',
            'celular.max' => 'El :attribute debe contener máximo 50 numeros.',

            'email.required' => 'El :attribute es obligatorio.',
            'email.min' => 'El :attribute debe contener más de un letra.',
            'email.max' => 'El :attribute debe contener máximo 100 letras.',

        ];
    }

    public function attributes()
    {
        return [
            'nombre' => 'Nombre(s)',
            'paterno' => 'Apellido Paterno',
            'materno' => 'Apellidos Materno',
            'ci' => 'CI',
            'id_dep' => 'Departamento',
            'matricula' => 'Matricula',
            'id_est' => 'Estado Civil',
            'domicilio' => 'Doimicilio',
            'id_afp' => 'AFP',
            'telefono' => 'Teléfono',
            'celular' => 'Celular',
            'email' => 'Correo Electrónico'
        ];
    }
}
