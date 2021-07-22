<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Clase;
use App\Models\Alumno;
use App\Models\Alumno_Clase;
use App\Models\Dia;
use App\Models\Horario;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ClaseController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $search = $request->get('search');
    $filtro = $request->get('filtro');

    $clases = Clase::with('dias')
      ->search($filtro, $search)
      ->orderByDesc('id')
      ->simplePaginate(4);
    // dd($clases);
    Session::put('clase_url', request()->fullUrl());

    return view('clase.index', compact('clases'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $dias = Dia::all();
    $horarios = Horario::all();

    return view('clase.create', compact('horarios', 'dias'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $request->validate([
      'tipo_clase' => 'required|regex:/^[\pL\s\-]+$/u|string|max:255|unique:clases',
      'horario_id' => 'required',
      'dias' => 'required|array|min: 1'
    ], ['dias.required' => 'Debe seleccionar al menos 1 día de la semana']);

    foreach ($request->dias as $dia) {
      $query = DB::select('SELECT COUNT(*) as contador FROM clases JOIN clase_dia ON clases.id = clase_dia.clase_id WHERE clases.tipo_clase = ? AND EXISTS (SELECT * FROM horarios WHERE horarios.id = ?) AND clase_dia.dia_id = ?', [$request->tipo_clase, $request->horario_id, $dia]);

      if ($query[0]->contador > 0) {
        session()->flash('error', 'La cantidad de dias solicitados
                 supera el limite de dias por solicitud');
        return redirect('clase/create')->withInput();
      }
    }

    //hacer query para validar las 3 cosas

    $clase = new Clase();
    $clase->tipo_clase = $request->tipo_clase;
    $clase->horario_id = $request->horario_id;

    for ($i = 0; $i < count($request->dias); $i++) {
      $clase->tarifa_id += 1;
    }

    $clase->save();

    $clase->dias()->sync($request->input('dias', []));

    return redirect('clase')->with('message', 'Clase creada con exito');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */

  public function show($id)
  {
    $clase = Clase::findOrFail($id)
      ->with('alumno_clase');

    return view('clase.show', compact('clase'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $clase = Clase::findOrFail($id);
    $dias = Dia::all();
    $clase_dias = $clase->dias->pluck('id')->toArray();
    $horarios = Horario::all();

    return view('clase.edit', compact('clase', 'horarios', 'dias', 'clase_dias'));
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
    $clase = Clase::find($id);

    $clase->tipo_clase = $request->get('tipo_clase');
    $clase->horario_id = $request->get('horario_id');
    $clase->dias()->sync($request->get('dias', []));
    $clase->tarifa_id = count($request->dias);

    $clase->save();

    if (session('clase_url')) {
      return redirect(session('clase_url'))->with('message', 'Clase modificada con exito');
    }
    return redirect('clase')->with('message', 'Clase modificada con exito');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {

    $clase = Clase::findOrFail($id);


    $query = DB::table('alumno_clase')->where('alumno_clase.clase_id', '=', $clase->id)->count();

    if ($clase->profesors()->count() || $query > 0) {
      return redirect('clase')->with('error', 'No es posible eliminar esta clase ya que esta relacionada con alumnos o profesores');
    } else {
      Clase::destroy($id);

      return redirect('clase')->with('message', 'Clase eliminada con exito');
    }
  }


  public function indexAlumnos($id)
  {
    $alumnos = User::where('role_id', 1)->simplePaginate(6);
    $clase = Clase::findOrFail($id);

    return view('clase.alumnos', compact('alumnos', 'clase'));
  }

  public function addAlumnos(Request $request)
  {
    // $clase = $request->all();
    // $clase->dias()->sync(); 
    dd($request->id);
  }
  public function deleteAlumnos()
  {
  }
  public function indexProfesores()
  {
  }
  public function addProfesores()
  {
  }
  public function deleteProfesores()
  {
  }
}
