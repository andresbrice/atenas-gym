<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Horario;

class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $horarios = Horario::orderBy('hora','ASC')->paginate(5);
        return view('horario.index',compact('horarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('horario.create');
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
          'hora' => 'required|unique:horarios|after:07:59|before:22:00'
        ]);

        $hora = new \DateTime($request->hora);
        $formathora = $hora->format('H:i');
        $horario = new Horario();
        $horario->hora = $formathora;
        $horario->save();
        
        return redirect('horario')->with('status', 'Horario creado con exito');
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
      $horario = Horario::findOrFail($id);
      return view('horario.edit', compact('horario'));
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
        'hora' => 'required|unique:horarios|after:07:59|before:22:00'
      ]);
      
      $horario = request()->except('_token', '_method');

      Horario::where('id', '=', $id)->update($horario);

      return redirect('horario')->with('status', 'Horario modificado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Horario::destroy($id);

      return redirect('horario')->with('status', 'Horario eliminado con exito');
    }
}
