<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequisitosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requisitos', function (Blueprint $table) {
            $table->bigIncrements('id_pre');
            // LLAVE FORANEA A LA TABLA REQUERIMIENTOS
            $table->unsignedBigInteger('id_req');
            $table->foreign('id_req')->references('id_req')->on('requerimientos');
            // LLAVE FORANEA A LA TABLA DOCUMENTOS
            $table->string('documento');

            $table->boolean('estado')->default(true);
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
        Schema::dropIfExists('requisitos');
    }
}
