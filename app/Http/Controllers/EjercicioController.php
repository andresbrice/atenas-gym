<?php

namespace App\Http\Controllers;

use App\Models\Clase;
use Illuminate\Http\Request;
use App\Models\Ejercicio;
use Illuminate\Support\Facades\DB;

class EjercicioController extends Controller
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

    // $ejercicios = Ejercicio::with('clases')
    //   ->search($filtro, $search)
    //   ->orderByDesc('id')
    //   ->simplePaginate(4);

    $ejercicios = Ejercicio::orderBy('id', 'DESC')
      ->search($filtro, $search)
      ->simplePaginate(5);

    // 

    return view('ejercicio.index', compact('ejercicios'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {

    $clases = Clase::all();
    // dd($clases);
    return view('ejercicio.create', compact('clases'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    // // dd($request->all());
    // $validacion = DB::query()
    //   ->select('clases.tipo_clase', 'ejercicios.nombre_ejercicio', 'ejercicios.descripcion')
    //   ->from('ejercicios')
    //   ->join('clase_ejercicio', 'ejercicio.id', '=', 'clase_ejercicio.ejercicio_id')
    //   ->whereIn('clase_ejercicio.clase_id', function ($query) use ($request) {
    //     $query->select('clase_ejercicio.clase_id')
    //       ->from('clase_ejercicio')
    //       ->join('clases', 'clase_ejercicio.clase_id', '=', 'clases.id')
    //       ->where('clases.tipo_clase', '=', $request->tipo_clase);
    //   });

    // if ($validacion) {
    //   dd($validacion);
    //   return view('ejercicio.create')->with('error', 'Ya existe dicho ejercicio para ese tipo de clase.');
    // }


    $request->validate([
      'tipo_clase' => 'required',
      'nombre_ejercicio' => 'required|regex:/^[\pL\s\-]+$/u|string|max:255|unique:ejercicios,nombre_ejercicio',
      'descripcion' => 'required|regex:/^[\pL\s\-]+$/u|string|max:255|unique:ejercicios,descripcion',
    ]);

    //$ejercicio = Ejercicio::create([$request->all()]);

    $ejercicio = new Ejercicio();
    $ejercicio->nombre_ejercicio = ucfirst($request->nombre_ejercicio);
    $ejercicio->descripcion = ucfirst($request->descripcion);
    $ejercicio->save();

    return redirect('ejercicio')->with('message', 'Ejercicio creado con exito');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {

    $ejercicio = Ejercicio::findOrFail($id);
    return view('ejercicio.edit', compact('ejercicio'));
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
    $request->validate([
      'nombre_ejercicio' => 'required|regex:/^[\pL\s\-]+$/u|string|max:255',
      'descripcion' => 'required|regex:/^[\pL\s\-]+$/u|string|max:255',
    ]);

    $ejercicio = request()->except('_token', '_method');

    Ejercicio::where('id', '=', $id)->update($ejercicio);

    return redirect('ejercicio')->with('message', 'Ejercicio modificado con exito');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    Ejercicio::destroy($id);

    return redirect('ejercicio')->with('message', 'Ejercicio eliminado con exito');
  }
}
