<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEjerciciosRutinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ejercicios_rutinas', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->unsignedBigInteger('rutina_id');
            $table->unsignedBigInteger('ejercicio_id');
            
            $table->foreign('rutina_id')->references('id')->on('rutinas')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            
            $table->foreign('ejercicio_id')->references('id')->on('ejercicios')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            
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
        Schema::dropIfExists('ejercicios_rutinas');
    }
}
