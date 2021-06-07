<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClasesDiaSemanasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clases_dia_semanas', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->unsignedBigInteger('dia_semana_id');
            $table->unsignedBigInteger('clase_id');

            $table->foreign('dia_semana_id')->references('id')->on('dia_semanas')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('clase_id')->references('id')->on('clases')
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
        Schema::dropIfExists('clases_dia_semanas');
    }
}
