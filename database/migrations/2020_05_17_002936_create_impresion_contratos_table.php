<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImpresionContratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('impresion_contratos', function (Blueprint $table) {
            $table->bigIncrements('id_imp');
            // LLAVE FORANEA A LA TABLA REQUERIMIENTOS
            $table->unsignedBigInteger('id_req');
            $table->foreign('id_req')->references('id_req')->on('requerimientos');

            $table->string('correlativo');
            $table->longText('contrato');
            $table->string('firma1');
            $table->string('cargo1');
            $table->string('firma2');
            $table->string('cargo2');
            $table->string('firma3');
            $table->string('cargo3');
            $table->boolean('modifica');
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
        Schema::dropIfExists('impresion_contratos');
    }
}
