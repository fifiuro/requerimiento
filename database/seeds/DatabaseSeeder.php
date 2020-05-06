<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(CreateAdminUserSeeder::class);
        $this->call(CreateCentroSaludSeeder::class);
        $this->call(CreateTipoContratoSeeder::class);
        $this->call(CreateTipoSeeder::class);
        $this->call(CreateCargoSeeder::class);
        $this->call(CreateNivelSeeder::class);
        $this->call(CreateDocumentosSeeder::class);
        $this->call(CreateEstadoCivilSeeder::class);
        $this->call(CreateDepartamentoSeeder::class);
        $this->call(CreateAfpSeeder::class);
        $this->call(CreateDatosPersonalSeeder::class);
    }
}
