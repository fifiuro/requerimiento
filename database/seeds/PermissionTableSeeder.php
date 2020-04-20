<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'departamento-list',
            'departamento-create',
            'departamento-edit',
            'departamento-delete',
            'estadocivil-list',
            'estadocivil-create',
            'estadocivil-edit',
            'estadocivil-delete',
            'afp-list',
            'afp-create',
            'afp-edit',
            'afp-delete',
            'centrosalud-list',
            'centrosalud-create',
            'centrosalud-edit',
            'centrosalud-delete',
            'contratos-list',
            'contratos-create',
            'contratos-edit',
            'contratos-delete',
            'documentos-list',
            'documentos-create',
            'documentos-edit',
            'documentos-delete',
            'areacargo-list',
            'areacargo-create',
            'areacargo-edit',
            'areacargo-delete',
            'niveles-list',
            'niveles-create',
            'niveles-edit',
            'niveles-delete',
            'datospersonal-list',
            'datospersonal-create',
            'datospersonal-edit',
            'datospersonal-delete',
            'requerimiento-list',
            'requerimiento-create',
            'requerimiento-edit',
            'requerimiento-delete',
            'cargo-list',
            'cargo-create',
            'cargo-edit',
            'cargo-delete',
            

        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
