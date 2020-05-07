<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasos', function (Blueprint $table) {
            $table->bigIncrements('id_pas');
            // LLAVE FORANEA A LA TABLA AREQUERIMIENTOS
            $table->unsignedBigInteger('id_req');
            $table->foreign('id_req')->references('id_req')->on('requerimientos');

            $table->integer('estado');
            
            // LLAVE FORANEA A LA TABLA USERS
            $table->unsignedBigInteger('id_usr');
            $table->foreign('id_usr')->references('id')->on('users');

            $table->date('fecha');
            $table->time('hora');
            $table->string('observaciones');

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
        Schema::dropIfExists('pasos');
    }
}
