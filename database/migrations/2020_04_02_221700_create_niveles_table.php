<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNivelesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('niveles', function (Blueprint $table) {
            $table->bigIncrements('id_niv');
            // LLAVE FORANEA A LA TABLA AREAS
            $table->unsignedBigInteger('id_are');
            $table->foreign('id_are')->references('id_are')->on('areas');

            $table->string('nivel');
            $table->integer('horas');
            $table->string('tiempo');
            $table->integer('salario');
            $table->string('literal');
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
        Schema::dropIfExists('niveles');
    }
}
