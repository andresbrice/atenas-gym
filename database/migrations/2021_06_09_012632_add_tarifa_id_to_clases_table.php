<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTarifaIdToClasesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('clases', function (Blueprint $table) {
      $table->unsignedBigInteger('tarifa_id')->after('horario_id');
      $table->foreign('tarifa_id')->references('id')->on('tarifas');
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
      $table->dropColumn('tarifa_id');
    });
  }
}
