<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rutina;
use App\Models\User;
use App\Models\Alumno_Clase;
use Illuminate\Support\Facades\DB;

class RutinaController extends Controller
{

  public function index()
  {
    $rutinas = Rutina::all();
    // dd($rutinas);
    return view('rutina.index', compact('rutinas'));
  }

  public function create()
  {
    $alumnos =
      DB::select('select users.id as user_id, users.name as name, users.lastName as lastname, alumnos.id as alumno_id from users join alumnos on users.id = alumnos.user_id');

    $profesor = DB::select('select profesors.id as id from profesors where profesors.user_id = ?', [auth()->id()]);

    return view('rutina.create', compact('alumnos', 'profesor'));
  }

  public function store(Request $request)
  {
    $query = DB::select('select alumno_clase.id as id from alumno_clase where alumno_clase.id in (select alumno_clase.id from alumno_clase join alumnos on alumno_clase.alumno_id = alumnos.id where alumno_clase.clase_id = ? and alumno_clase.alumno_id in (SELECT alumno_clase.alumno_id from alumno_clase JOIN alumnos on alumno_clase.alumno_id = alumnos.id JOIN users on alumnos.user_id = users.id where users.id = ?))', [$request->clase, $request->alumno]);

    $alumno_clase = Alumno_Clase::findOrFail($query[0]->id);

    $rutina = Rutina::create([
      'alumno_clase_id' => $alumno_clase->id,
      'fecha_emision' => now()->format('Y/m/d'),
      'profesor_id' => auth()->id(),
    ]);

    return redirect('rutina')->with('message', 'Rutina creada con éxito');
  }

  public function show($id)
  {
  }

  public function edit($id)
  {
    //
  }

  public function update(Request $request, $id)
  {
    //
  }

  public function destroy($id)
  {
    // $rutina = Rutina::findOrFail($id);
    Rutina::destroy($id);

    return redirect('rutina')->with('message', 'Rutina eliminada con éxito');
  }

  public function findClase()
  {
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

    return response()->json($data);
  }


  public function indexEjercicios($id)
  {

    $rutina = Rutina::findOrFail($id);
    $ejercicios = DB::select('select ejercicios.id as id, ejercicios.nombre_ejercicio from ejercicios join clase_ejercicio on ejercicios.id = clase_ejercicio.ejercicio_id join clases on clase_ejercicio.clase_id = clases.id where clases.tipo_clase = ?', [$rutina->alumno_clase->clase->tipo_clase]);
    dd($ejercicios);

    return view('clase.profesores', compact('rutina', 'ejercicios'));
  }
  public function addEjercicios(Request $request, $id)
  {
    dd($request->all());
    $rutina = Rutina::findOrFail($id);
    $rutina->ejercicios()->sync()->excepts('_token');
  }
}
