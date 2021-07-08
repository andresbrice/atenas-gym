<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ejercicio;


class EjercicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $ejercicios = Ejercicio::orderBy('id','DESC')->paginate(5);
            return view('ejercicio.index',compact('ejercicios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ejercicio.create');
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
            'nombre_ejercicio' => 'required|regex:/^[\pL\s\-]+$/u|string|max:255|unique:ejercicios',
            'descripcion' => 'required|regex:/^[\pL\s\-]+$/u|string|max:255',]);
          
       //$ejercicio = Ejercicio::create([$request->all()]);

        $ejercicio = New Ejercicio();
        $ejercicio->nombre_ejercicio = ucfirst($request->nombre_ejercicio);
        $ejercicio->descripcion = ucfirst($request->descripcion);
        $ejercicio->save();

       return redirect('ejercicio')->with('status', 'Ejercicio creado con exito');


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
        
        $ejercicio=Ejercicio::findOrFail($id);
        return view('ejercicio.edit',compact('ejercicio'));

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
            'descripcion' => 'required|regex:/^[\pL\s\-]+$/u|string|max:255',]);
          
          $ejercicio = request()->except('_token', '_method');
    
          Ejercicio::where('id', '=', $id)->update($ejercicio);
    
          return redirect('ejercicio')->with('status', 'Ejercicio modificado con exito');
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

        return redirect('ejercicio')->with('status', 'Ejercicio eliminado con exito');
    }
}
