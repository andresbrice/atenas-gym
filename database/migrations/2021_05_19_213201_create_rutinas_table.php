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
      $table->foreignId('alumno_clase_id')->constrained('alumno_clase');
      $table->foreignId('profesor_id')->constrained();
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
