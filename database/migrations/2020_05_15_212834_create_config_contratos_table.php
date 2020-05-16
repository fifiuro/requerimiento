<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigContratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('config_contratos', function (Blueprint $table) {
            $table->bigIncrements('id_conf');
            $table->string('inicial');
            $table->integer('correlativo');
            $table->integer('gestion');
            $table->longText('plantilla_contrato');
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
        Schema::dropIfExists('config_contratos');
    }
}
