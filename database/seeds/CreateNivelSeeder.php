<?php

use Illuminate\Database\Seeder;
use App\configuracion\Nivel;

class CreateNivelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $centro = Nivel::create([
            'id_are' => '1',
            'nivel' => '11',
            'horas' => '40',
            'tiempo' => 'Semanales',
            'salario' => '1000',
            'literal' => 'Mil',
            'estado' => true
        ]);

        $centro = Nivel::create([
            'id_are' => '1',
            'nivel' => '23',
            'horas' => '48',
            'tiempo' => 'Semanales',
            'salario' => '1000',
            'literal' => 'Mil',
            'estado' => true
        ]);

        $centro = Nivel::create([
            'id_are' => '1',
            'nivel' => '22',
            'horas' => '40',
            'tiempo' => 'Semanales',
            'salario' => '1000',
            'literal' => 'Mil',
            'estado' => true
        ]);

        $centro = Nivel::create([
            'id_are' => '1',
            'nivel' => '19',
            'horas' => '40',
            'tiempo' => 'Semanales',
            'salario' => '1000',
            'literal' => 'Mil',
            'estado' => true
        ]);

        $centro = Nivel::create([
            'id_are' => '1',
            'nivel' => '11',
            'horas' => '40',
            'tiempo' => 'Semanales',
            'salario' => '1000',
            'literal' => 'Mil',
            'estado' => true
        ]);

        $centro = Nivel::create([
            'id_are' => '2',
            'nivel' => '9A',
            'horas' => '6',
            'tiempo' => 'Diarias',
            'salario' => '1000',
            'literal' => 'Mil',
            'estado' => true
        ]);

        $centro = Nivel::create([
            'id_are' => '2',
            'nivel' => '9A',
            'horas' => '0',
            'tiempo' => 'para cubrir guardias correspondientes',
            'salario' => '1000',
            'literal' => 'Mil',
            'estado' => true
        ]);

        $centro = Nivel::create([
            'id_are' => '2',
            'nivel' => '9B',
            'horas' => '3',
            'tiempo' => 'Diarias y Sabados Alternos',
            'salario' => '1000',
            'literal' => 'Mil',
            'estado' => true
        ]);

        $centro = Nivel::create([
            'id_are' => '2',
            'nivel' => '9A',
            'horas' => '6',
            'tiempo' => 'Diarias y Sabados Alternos',
            'salario' => '1000',
            'literal' => 'Mil',
            'estado' => true
        ]);

        $centro = Nivel::create([
            'id_are' => '2',
            'nivel' => '16P',
            'horas' => '37',
            'tiempo' => 'Semanales',
            'salario' => '1000',
            'literal' => 'Mil',
            'estado' => true
        ]);

        $centro = Nivel::create([
            'id_are' => '2',
            'nivel' => '14',
            'horas' => '36',
            'tiempo' => 'Semanales',
            'salario' => '1000',
            'literal' => 'Mil',
            'estado' => true
        ]);

        $centro = Nivel::create([
            'id_are' => '2',
            'nivel' => '13A',
            'horas' => '36',
            'tiempo' => 'Semanales',
            'salario' => '1000',
            'literal' => 'Mil',
            'estado' => true
        ]);

        $centro = Nivel::create([
            'id_are' => '2',
            'nivel' => '10B',
            'horas' => '3',
            'tiempo' => 'Diarias y Sabados Alternos',
            'salario' => '1000',
            'literal' => 'Mil',
            'estado' => true
        ]);

        $centro = Nivel::create([
            'id_are' => '2',
            'nivel' => '10A',
            'horas' => '6',
            'tiempo' => 'Diarias y Sanbados Alternos',
            'salario' => '1000',
            'literal' => 'Mil',
            'estado' => true
        ]);

    }
}
