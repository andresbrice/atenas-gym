<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHorarioIdToClasesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('clases', function (Blueprint $table) {
      $table->unsignedBigInteger('horario_id')->after('cupos_disponibles');
      $table->foreign('horario_id')->references('id')->on('horarios');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('clases', function (Blueprint $table) {
      $table->dropColumn('horario_id');
    });
  }
}
