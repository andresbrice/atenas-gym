<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AlumnoController extends Controller
{

    public function consultaClase()
    {
        $clases = DB::select('SELECT clases.id, clases.tipo_clase, horarios.hora, GROUP_CONCAT(dias.dia SEPARATOR ', ') as dias FROM clases INNER JOIN horarios ON clases.horario_id = horarios.id INNER JOIN clase_dia on clases.id = clase_dia.clase_id INNER JOIN dias ON clase_dia.dia_id = dias.id INNER JOIN alumno_clase ON clases.id = alumno_clase.clase_id INNER JOIN alumnos ON alumno_clase.alumno_id = alumnos.id INNER JOIN users ON alumnos.user_id = users.id WHERE users.id IN (SELECT users.id FROM clases WHERE users.id = ?) GROUP BY clases.id', [auth()->id()]);

        $data = DB::query()
      ->select('clases.id', 'clases.tipo_clase', 'horarios.hora', DB::raw("GROUP_CONCAT(dias.dia SEPARATOR ', ') as dias"))
      ->from('clases')
      ->join('horarios', 'clases.horario_id', '=', 'horarios.id')
      ->join('clase_dia', 'clases.id', '=', 'clase_dia.clase_id')
      ->join('dias', 'clase_dia.dia_id', '=', 'dias.id')
      ->whereIn('clases.id', function ($query) {
        $query->select('clases.id')
          ->from('clases')
          ->join('alumno_clase', 'clases.id', '=', 'alumno_clase.clase_id')
          ->join('alumnos', 'alumno_clase.alumno_id', '=', 'alumnos.id')
          ->where('alumnos.user_id', '=', request()->input('alumno_id'));
      })
      ->groupby('clases.id')
      ->get();

        // $id = Auth::id();
        // $clases = Clase::query()->whereHas('alumno_clase', function($query){
        //     $query->whereHas('alumno', function($query){
        //       $query->whereHas('user', function($query){
        //         return $query->where('user_id', auth()->id());
        //       });
        //     });
        //   });


        return view('alumnos.clase', compact('clases'));
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
