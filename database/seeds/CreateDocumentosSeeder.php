<?php

use Illuminate\Database\Seeder;
use App\configuracion\Documento;

class CreateDocumentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $centro = Documento::create([
            'documento' => 'Hoja de Vida',
            'estado' => true
        ]);

        $centro = Documento::create([
            'documento' => 'Declaracion jurada',
            'estado' => true
        ]);

        $centro = Documento::create([
            'documento' => 'Certificado de Nacimiento',
            'estado' => true
        ]);

        $centro = Documento::create([
            'documento' => 'Cedula de Identidad',
            'estado' => true
        ]);

        $centro = Documento::create([
            'documento' => 'Informe Técnico',
            'estado' => true
        ]);

        $centro = Documento::create([
            'documento' => 'Solicitud de Requerimiento',
            'estado' => true
        ]);

        $centro = Documento::create([
            'documento' => 'Formulario de Reclutamiento y Seleccion de Personal',
            'estado' => true
        ]);

        $centro = Documento::create([
            'documento' => 'Formulario de Evaluacion',
            'estado' => true
        ]);

        $centro = Documento::create([
            'documento' => 'Certificado de Sumariente',
            'estado' => true
        ]);

        $centro = Documento::create([
            'documento' => 'Certificado de Matrimonio',
            'estado' => true
        ]);

        $centro = Documento::create([
            'documento' => 'Fotocopia Legalizada de Titulo',
            'estado' => true
        ]);

        $centro = Documento::create([
            'documento' => 'Certificado de Estado Civil',
            'estado' => true
        ]);

        $centro = Documento::create([
            'documento' => 'REJAP',
            'estado' => true
        ]);
        
    }
}
