<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rutina;
use App\Models\Ejercicio;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class RutinaController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $rutinas = Rutina::orderBy('id', 'DESC')
      ->simplePaginate(4);

    return view('rutina.index', compact('rutinas'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create(Request $request)
  {
    $alumnos = DB::query()
      ->select('');

    $ejercicios = Ejercicio::select('id', 'nombre_ejercicio')
      ->orderBy('nombre_ejercicio', 'asc')
      ->get();

    return view('rutina.create', compact('alumnos', 'ejercicios'));
  }

  public function findClase()
  {
    // $data = DB::RAW("SELECT GROUP_CONCAT(dias.dia) AS 'Dias',clases.id,clases.tipo_clase,horarios.hora  FROM `clases` JOIN `horarios` ON clases.horario_id = horarios.id JOIN `clase_dia` ON clases.id = clase_dia.clase_id JOIN `dias` ON clase_dia.dia_id = dias.id WHERE clases.id IN (SELECT clases.id FROM `clases` JOIN `alumno_clase` ON clases.id = alumno_clase.clase_id JOIN `alumnos` ON alumno_clase.alumno_id = alumnos.id WHERE alumnos.user_id = ?) GROUP BY clases.id", [request()->input('alumno_id')]);

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

  // public function findProfesor()
  // {
  //   $data = DB::select('SELECT users.id,users.name,users.lastName FROM `users` INNER JOIN `profesors` ON users.id = profesors.user_id WHERE profesors.id IN (SELECT profesors.id FROM `profesors` JOIN `clase_profesor` ON profesors.id = clase_profesor.profesor_id WHERE clase_profesor.clase_id = ?)', [request()->input('clase_id')]);

  //   return response()->json($data);
  // }

  public function store(Request $request)
  {
    //guardar los datos de rutina 
    return redirect('rutina.index')->with('status', 'Rutina creada con exito');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
  }
}
