<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsistenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asistencias', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->date('fecha_asistencia');
            $table->time('horario_asistencia');
            $table->boolean('asistio');
            $table->unsignedBigInteger('alumno_clase_id');
            $table->foreign('alumno_clase_id')->references('id')->on('alumnos_clases');
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
        Schema::dropIfExists('asistencias');
    }
}
