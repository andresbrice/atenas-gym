<?php

namespace App\Http\Controllers;

use App\Models\Clase;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{

    public function consultaClase()
    {
        
        return view('alumnos.clase');

    }
    public function consultaRutina()
    {
        return view('alumnos.rutina');

    }
    public function consultaAsistencia()
    {
        return view('alumnos.asistencia');

    }
    public function consultaCuota()
    {
        return view('alumnos.Cuota');

    }
    public function imprimirRutina()
    {
        return view('alumnos.imprimirRutina');

    }

}
