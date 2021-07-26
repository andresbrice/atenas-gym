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
    $clases = Clase::whereHas('alumno_clase', function ($query) {
      $query->whereHas('alumno', function ($query) {
        $query->whereHas('user', function ($query) {
          $query->where('id', '=', auth()->id());
        });
      });
    })->get();

    return view('alumnos.clase', compact('clases'));
  }

  public function buscarClase()
  {
    $clases = Clase::whereHas('alumno_clase', function ($query) {
      $query->whereHas('alumno', function ($query) {
        $query->whereHas('user', function ($query) {
          $query->where('id', '=', auth()->id());
        });
      });
    })->get();

    return view('alumnos.buscarClase', compact('clases'));
  }

  public function seleccionarclase(Request $request)
  {
    $clase = Clase::findOrFail($request->tipo_clase);
    $queryAlumnoClase = DB::select('select alumno_clase.id as id from alumno_clase where alumno_clase.id in (select alumno_clase.id from alumno_clase join alumnos on alumno_clase.alumno_id = alumnos.id where alumno_clase.clase_id = ? and alumno_clase.alumno_id in (SELECT alumno_clase.alumno_id from alumno_clase JOIN alumnos on alumno_clase.alumno_id = alumnos.id JOIN users on alumnos.user_id = users.id where users.id = ?))', [$clase->id, auth()->id()]);

    $alumno_clase = Alumno_Clase::findOrFail($queryAlumnoClase[0]->id);

    $rutina = Rutina::where('alumno_clase_id', $alumno_clase->id)->get();

    dd($rutina);

    // $ejercicios_rutina = DB::select('select ejercicios.id as id, ejercicio_rutina.id as ejercicio_rutina_id, ejercicios.nombre_ejercicio as nombre_ejercicio, rutinas.id as rutina_id, ejercicio_rutina.series as series, ejercicio_rutina.repeticiones as repeticiones, ejercicio_rutina.descanso as descanso from ejercicio_rutina join ejercicios on ejercicio_rutina.ejercicio_id = ejercicios.id join rutinas on ejercicio_rutina.rutina_id = rutinas.id where rutina_id = ?', [$rutina->id]);


    return view('alumnos.rutina', compact('rutina', 'ejercicios_rutina'));
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
