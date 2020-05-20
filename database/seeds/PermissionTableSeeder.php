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
            'role-confirma',
            'departamento-list',
            'departamento-create',
            'departamento-edit',
            'departamento-delete',
            'departamento-confirma',
            'estadocivil-list',
            'estadocivil-create',
            'estadocivil-edit',
            'estadocivil-delete',
            'estadocivil-confirma',
            'afp-list',
            'afp-create',
            'afp-edit',
            'afp-delete',
            'afp-confirma',
            'centrosalud-list',
            'centrosalud-create',
            'centrosalud-edit',
            'centrosalud-delete',
            'centrosalud-confirma',
            'contratos-list',
            'contratos-create',
            'contratos-edit',
            'contratos-delete',
            'contrato-confirma',
            'documentos-list',
            'documentos-create',
            'documentos-edit',
            'documentos-delete',
            'documentos-confirma',
            'areacargo-list',
            'areacargo-create',
            'areacargo-edit',
            'areacargo-delete',
            'areacargo-confirma',
            'niveles-list',
            'niveles-create',
            'niveles-edit',
            'niveles-delete',
            'niveles-confirma',
            'datospersonal-list',
            'datospersonal-create',
            'datospersonal-edit',
            'datospersonal-delete',
            'datospersonal-confirma',
            'requerimiento-list',
            'requerimiento-create',
            'requerimiento-edit',
            'requerimiento-delete',
            'requerimiento-confirma',
            'cargo-list',
            'cargo-create',
            'cargo-edit',
            'cargo-delete',
            'cargo-confirma',
            'users-list',
            'users-create',
            'users-edit',
            'users-delete',
            'users-confirma',
            'roles-list',
            'roles-create',
            'roles-edit',
            'roles-delete',
            'roles-confirma',
            'estadorequerimiento-list',
            'estadorequerimiento-create',
            'estadorequerimiento-edit',
            'estadorequerimiento-delete',
            'estadorequerimiento-confirma',
            'impcontrato-list',
            'impcontrato-create',
            'impcontrato-edit',
            'impcontrato-delete',
            'paso-list',
            'paso-create',
            'paso-edit',
            'paso-delete'

        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
