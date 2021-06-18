<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRutinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rutinas', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->date("fecha_emision");
            $table->integer('series');
            $table->integer('repeticiones');
            $table->integer('descanso');
            $table->unsignedBigInteger('alumnos_clases_id');
            $table->foreign('alumnos_clases_id')->references('id')->on('alumnos_clases');
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
        Schema::dropIfExists('rutinas');
    }
}
