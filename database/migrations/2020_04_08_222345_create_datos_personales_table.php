<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatosPersonalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_personales', function (Blueprint $table) {
            $table->bigIncrements('id_per');
            $table->string('nombre');
            $table->string('paterno');
            $table->string('materno');
            $table->date("fecha_nac");
            $table->string('ci');
            // LLAVE FORANEA A LA TABLA DEPARTAMENTO
            $table->unsignedBigInteger('id_dep');
            $table->foreign('id_dep')->references('id_dep')->on('departamentos');
            // FIN
            $table->string('matricula');
            // LLAVE FORANEA A LA TABLA ESTADO_CIVIL
            $table->unsignedBigInteger('id_est');
            $table->foreign('id_est')->references('id_est')->on('estado_civil');
            // FIN
            $table->string('domicilio');
            // LLAVE FORANEA A LA TABLA AFP
            $table->unsignedBigInteger('id_afp');
            $table->foreign('id_afp')->references('id_afp')->on('afp');
            // FIN
            $table->string('telefono');
            $table->string('celular');
            $table->string('email');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datos_personales');
    }
}
