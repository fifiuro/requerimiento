<?php

use Illuminate\Database\Seeder;
use App\configuracion\Contrato;

class CreateTipoContratoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $centro = Contrato::create([
            'contrato' => 'Necesidad de Servicio',
            'estado' => true
        ]);

        $centro = Contrato::create([
            'contrato' => 'Vacacion',
            'estado' => true
        ]);

        $centro = Contrato::create([
            'contrato' => 'Baja Prenatal',
            'estado' => true
        ]);

        $centro = Contrato::create([
            'contrato' => 'Baja Postnatal',
            'estado' => true
        ]);

        $centro = Contrato::create([
            'contrato' => 'Paternidad',
            'estado' => true
        ]);

        $centro = Contrato::create([
            'contrato' => 'Maternidad',
            'estado' => true
        ]);

        $centro = Contrato::create([
            'contrato' => 'Por Comision',
            'estado' => true
        ]);

        $centro = Contrato::create([
            'contrato' => 'Baja Medica',
            'estado' => true
        ]);

        $centro = Contrato::create([
            'contrato' => 'Adenda Modificada',
            'estado' => true
        ]);
    }
}
