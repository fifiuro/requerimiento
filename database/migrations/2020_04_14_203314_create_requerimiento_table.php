<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequerimientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requerimientos', function (Blueprint $table) {
            $table->bigIncrements('id_req');
            // LLAVE FORANEA A LA TABLA DATOS PERSONALES
            $table->unsignedBigInteger('id_per');
            $table->foreign('id_per')->references('id_per')->on('datos_personales');
            // LLAVE FORANEA A LA TABLA CENTRO DE SALUD
            $table->unsignedBigInteger('id_cen');
            $table->foreign('id_cen')->references('id_cen')->on('centro_salud');
            // LLAVE FORANEA A LA TABLA CONTRATOS
            $table->unsignedBigInteger('id_con');
            $table->foreign('id_con')->references('id_con')->on('contratos');
            // LLAVE FORANEA A LA TABLA CARGOS
            $table->unsignedBigInteger('id_car');
            $table->foreign('id_car')->references('id_car')->on('cargos');
            // LLAVE FORANEA A LA TABLA NIVELES
            $table->unsignedBigInteger('id_niv');
            $table->foreign('id_niv')->references('id_niv')->on('niveles');

            $table->string('motivo');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->string('nota_requerimiento');
            $table->date('fecha_nota_requerimiento');
            $table->string('observaciones');
            $table->integer('estado')->default('1');

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
        Schema::dropIfExists('requerimientos');
    }
}
