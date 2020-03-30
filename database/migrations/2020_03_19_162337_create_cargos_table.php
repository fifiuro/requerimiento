<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCargosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cargos', function (Blueprint $table) {
            $table->bigIncrements('id_car');
            // LLAVE FORANEA A LA TABLA AREAS
            $table->unsignedBigInteger('id_are');
            $table->foreign('id_are')->references('id_are')->on('areas');

            $table->string('cargo');
            $table->integer('nivel');
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
        Schema::dropIfExists('cargos');
    }
}
