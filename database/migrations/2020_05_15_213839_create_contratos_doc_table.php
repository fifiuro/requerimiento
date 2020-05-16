<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratosDocTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratos_doc', function (Blueprint $table) {
            $table->bigIncrements('id_con');
            // LLAVE FORANEA A LA TABLA REQUERIMIENTOS
            $table->unsignedBigInteger('id_req');
            $table->foreign('id_req')->references('id_req')->on('requerimientos');

            $table->string('correlativo');
            $table->longText('contrato');
            $table->string('firma-1');
            $table->string('cargo-1');
            $table->string('firma-2');
            $table->string('cargo-2');
            $table->string('firma-3');
            $table->string('cargo-3');
            $table->string('observaciones');
            $table->boolean('estado');
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
        Schema::dropIfExists('contratos_doc');
    }
}
