<?php

use Illuminate\Database\Seeder;
use App\configuracion\Estadocivil;

class CreateEstadoCivilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $civil = Estadocivil::create([
            'estado_civil' => 'Soltero(a)',
            'estado' => true
        ]);

        $civil = Estadocivil::create([
            'estado_civil' => 'Casado(a)',
            'estado' => true
        ]);

        $civil = Estadocivil::create([
            'estado_civil' => 'Divorciado(a)',
            'estado' => true
        ]);

        $civil = Estadocivil::create([
            'estado_civil' => 'Viudo(a)',
            'estado' => true
        ]);

    }
}
