<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Clase;
use App\Models\Dia;
use App\Models\Profesor;
use App\Models\Horario;
use App\Models\Alumno_Clase;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ClaseController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    
    $clases = Clase::with('dias')
    ->orderByDesc('id')
    ->paginate(5);

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
  
    return view('clase.create',compact('horarios','dias'));
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
    'tipo_clase' => 'required|regex:/^[\pL\s\-]+$/u|string|max:255',
    'horario_id' => 'required',
    'dias[]'=>'min: 1',
    ]);
 
    $clase = new Clase();
    $clase->tipo_clase = $request->tipo_clase;
    $clase->horario_id = $request->horario_id;

    
    for ($i=0; $i < sizeof($request->dias) ; $i++) { 
      $clase->tarifa_id = $i + 1;
    }

    $clase->save();

    
    $clase->dias()->attach($request->dias);

    return redirect('clase')->with('status', 'Clase creada con exito');
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
    
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    Clase::destroy($id);

    return redirect('clase')->with('status', 'Clase eliminada con exito');
  }
}
