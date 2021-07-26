<?php

namespace App\Http\Controllers;

use App\Models\Alumno_Clase;
use App\Models\Alumno;
use App\Models\Clase;
use App\Models\Rutina;
use App\Models\Ejercicio;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AlumnoController extends Controller
{

  public function consultaClase()
  {
    $clases = Clase::whereHas('alumno_clase', function($query) {
      $query->whereHas('alumno', function($query) {
        $query->whereHas('user', function($query) {
          $query->where('id', '=', auth()->id());
        });  
      });
    })->get();

    return view('alumnos.clase', compact('clases'));
  }

  public function buscarClase()
  {
    $clases = Clase::whereHas('alumno_clase', function($query) {
      $query->whereHas('alumno', function($query) {
        $query->whereHas('user', function($query) {
          $query->where('id', '=', auth()->id());
        });  
      });
    })->get();

    return view('alumnos.buscarClase', compact('clases'));
  }

  public function seleccionarclase(Request $request)
  {
    $clase = Clase::findOrFail($request->tipo_clase);
    $clase_id = $clase->id;
    
    // $alumno = Alumno::whereHas('user', function($query) {
    //   $query->where('user_id', auth()->id());
    // })->get();

    // $alumno_id = $alumno->users->id;
    // dd($alumno_id);

    // $alumno_clase = Alumno_Clase::where('clase_id', $clase_id)
    //   ->where('alumno_id', $alumno_id);
    // dd($alumno_clase);

    // $rutina = Rutina::where('alumno_clase_id', $alumno_clase)->first();
    // dd($rutina);

    // $ejercicios_rutina = DB::select('select ejercicios.id as id, ejercicio_rutina.id as ejercicio_rutina_id, ejercicios.nombre_ejercicio as nombre_ejercicio, rutinas.id as rutina_id, ejercicio_rutina.series as series, ejercicio_rutina.repeticiones as repeticiones, ejercicio_rutina.descanso as descanso from ejercicio_rutina join ejercicios on ejercicio_rutina.ejercicio_id = ejercicios.id join rutinas on ejercicio_rutina.rutina_id = rutinas.id where rutina_id = ?', [$rutina->id]);

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
      ->first()
      ->get();
      // dd($ejercicios);

    return view('alumnos.rutina', compact('clase', 'clase_id', 'alumno_id', 'alumno_clase', 'rutina', 'ejercicios_rutina'));
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
