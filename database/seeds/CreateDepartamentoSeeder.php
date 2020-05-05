<?php

use Illuminate\Database\Seeder;
use App\configuracion\Departamento;

class CreateDepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $centro = Departamento::create([
            'departamento' => 'La Paz',
            'sigla' => 'LPZ',
            'estado' => true
        ]);

        $centro = Departamento::create([
            'departamento' => 'Santa Cruz',
            'sigla' => 'SCZ',
            'estado' => true
        ]);

        $centro = Departamento::create([
            'departamento' => 'Cochabamba',
            'sigla' => 'CBBA',
            'estado' => true
        ]);

        $centro = Departamento::create([
            'departamento' => 'Oruro',
            'sigla' => 'OR',
            'estado' => true
        ]);

        $centro = Departamento::create([
            'departamento' => 'Potosi',
            'sigla' => 'PTS',
            'estado' => true
        ]);

        $centro = Departamento::create([
            'departamento' => 'Tarija',
            'sigla' => 'TRJ',
            'estado' => true
        ]);

        $centro = Departamento::create([
            'departamento' => 'Chuquisaca',
            'sigla' => 'CHQ',
            'estado' => true
        ]);

        $centro = Departamento::create([
            'departamento' => 'Pando',
            'sigla' => 'PND',
            'estado' => true
        ]);

        $centro = Departamento::create([
            'departamento' => 'Beni',
            'sigla' => 'BND',
            'estado' => true
        ]);

    }
}
