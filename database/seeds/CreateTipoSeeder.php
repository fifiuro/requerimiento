<?php

use Illuminate\Database\Seeder;
use App\configuracion\Area;

class CreateTipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $centro = Area::create([
            'tipo' => 'Administrativo',
            'estado' => true
        ]);

        $centro = Area::create([
            'tipo' => 'Medico',
            'estado' => true
        ]);
    }
}
