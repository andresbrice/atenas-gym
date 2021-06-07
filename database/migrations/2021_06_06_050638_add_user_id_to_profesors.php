<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToProfesors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profesors', function (Blueprint $table) {
            $table->unsignedBigInteger('usuario_id')->after('id');
            $table->foreign('usuario_id')->references('id')->on('users')
                ->onDelete('cascade') // clave foranea
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profesors', function (Blueprint $table) {
            $table->dropColumn('usuario_id');
        });
    }
}
