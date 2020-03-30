<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horas', function (Blueprint $table) {
            $table->bigIncrements('id_hrs');
            // LLAVE FORANEA A LA TABLA AREAS
            $table->unsignedBigInteger('id_are');
            $table->foreign('id_are')->references('id_are')->on('areas');

            $table->string('nivel');
            $table->integer('horas');
            $table->string('tiempo');
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
        Schema::dropIfExists('horas');
    }
}
