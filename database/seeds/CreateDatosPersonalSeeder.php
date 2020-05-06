<?php

use Illuminate\Database\Seeder;
use App\requerimiento\DatoPersonal;

class CreateDatosPersonalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $persopnal = DatoPersonal::create([
            'nombre' => 'NN',
            'paterno' => 'NN',
            'materno' => 'NN',
            'ci' => '0',
            'id_dep' => '1',
            'matricula' => '0',
            'id_est' => '1',
            'matricula' => '0',
            'id_est' => '1',
            'domicilio' => '0',
            'id_afp' => '1',
            'telefono' => '0',
            'celular' => '0',
            'email' => '0'
        ]);
    }
}
