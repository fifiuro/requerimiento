<?php

use Illuminate\Database\Seeder;
use App\configuracion\Afp;

class CreateAfpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $afp = Afp::create([
            'nombre' => 'Futuro Bolivia',
            'estado' => true
        ]);

        $afp = Afp::create([
            'nombre' => 'AFP Futuro',
            'estado' => true
        ]);

    }
}
