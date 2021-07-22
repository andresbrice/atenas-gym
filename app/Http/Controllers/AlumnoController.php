<?php

namespace App\Http\Controllers;

use App\Models\Clase;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AlumnoController extends Controller
{

    public function consultaClase()
    {
        $clases = DB::query()
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
          ->where('alumnos.user_id', '=', auth()->id());
      })
      ->groupby('clases.id')
      ->get();

        return view('alumnos.clase', compact('clases'));
    }

    public function buscarClase($id)
    {
        $clase = Clase::findOrFail($id);
        $clases = DB::query()
        ->select('clases.id', 'clases.tipo_clase')
        ->from('clases')
        ->whereIn('clases.id', function ($query) {
            $query->select('clases.id')
            ->from('clases')
            ->join('alumno_clase', 'clases.id', '=', 'alumno_clase.clase_id')
            ->join('alumnos', 'alumno_clase.alumno_id', '=', 'alumnos.id')
            ->where('alumnos.user_id', '=', auth()->id());
        })
        ->groupby('clases.id')
        ->get();

        return view('alumnos.buscarClase', compact('clase', 'clases'));
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
