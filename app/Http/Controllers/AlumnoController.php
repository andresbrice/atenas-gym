<?php

namespace App\Http\Controllers;

use App\Models\Clase;
use App\Models\Horario;
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

  public function buscarClase()
  {
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

    return view('alumnos.buscarClase', compact('clases'));
  }

  public function seleccionarclase(Request $request)
  {
    $clase = Clase::findOrFail($request->tipo_clase);
    $clase_id = $clase->id;

    $ejercicios = DB::query()
      ->select('rutinas.id', 'rutinas.fecha_emision', 'clases.tipo_clase', 'ejercicios.nombre_ejercicio', 'ejercicio_rutina.series', 'ejercicio_rutina.repeticiones', 'ejercicio_rutina.descanso')
      ->from('rutinas')
      ->join('ejercicio_rutina', 'rutinas.id', '=', 'ejercicio_rutina.rutina_id')
      ->join('ejercicios', 'ejercicio_rutina.ejercicio_id', '=', 'ejercicios.id')
      ->join('alumno_clase', 'rutinas.alumno_clase_id', '=', 'alumno_clase.id')
      ->join('clases', 'alumno_clase.clase_id', '=', 'clases.id')
      ->join('alumnos', 'alumno_clase.alumno_id', '=', 'alumnos.id')
      ->join('users', 'alumnos.user_id', '=', 'users.id')
      ->where('users.id', '=', auth()->id())
      ->where('clases.id', '=', $clase_id)
      ->groupBy('ejercicio_rutina.id')
      ->get();
    // dd($ejercicios);

    return view('alumnos.rutina', compact('clase', 'clase_id', 'ejercicios'));
  }

  public function consultaAsistencia()
  {
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
