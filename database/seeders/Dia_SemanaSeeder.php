<?php

namespace Database\Seeders;

use App\Models\Dias_Semana;
use Illuminate\Database\Seeder;


class Dia_SemanaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    $lunes = new Dias_Semana();
    $lunes->dia = "Lunes";
    $lunes->save();

    $martes = new Dias_Semana();
    $martes->dia = "Martes";
    $martes->save();

    $miercoles = new Dias_Semana();
    $miercoles->dia = "Miercoles";
    $miercoles->save();

    $jueves = new Dias_Semana();
    $jueves->dia = "Jueves";
    $jueves->save();

    $viernes = new Dias_Semana();
    $viernes->dia = "Viernes";
    $viernes->save();
    }
}
