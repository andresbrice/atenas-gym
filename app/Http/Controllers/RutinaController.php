<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rutina;
use App\Models\Ejercicio;
use App\Models\User;
use App\Models\Clase;
use App\Models\Alumno;
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
        $alumnos = User::select('id', 'name', 'lastName')
            ->where('role_id', '=', 1)
            ->orderBy('name', 'asc')
            ->get();

        $profesores = User::select('id', 'name', 'lastName')
            ->where('role_id', '=', 2)
            ->orderBy('name', 'asc')
            ->get();

        $ejercicios = Ejercicio::select('id', 'nombre_ejercicio')
            ->orderBy('nombre_ejercicio', 'asc')
            ->get();

        $clases = Clase::all();
            
        return view('rutina.create', compact('alumnos', 'profesores', 'ejercicios', 'clases'));
    }

    // public function findClase()
    // {
    //     $data= DB::SELECT ('clases.id, clases.tipo_clase FROM clases LEFT JOIN alumno_clase ON alumno_clase.clase_id = clases.id WHERE alumno_clase.alumno_id = ?',[$alumno_id]);
    //     return response()->json($data);
    //  }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
          'alumno' => 'required',
          'profesor' => 'required',
          'ejercicio' => 'required',
          'clase' => 'required',
          'series' => 'required|int',
          'repeticiones' => 'required|int',
          'descanso' => 'required|int',
        ]);
    
        $rutina = Rutina::create([
          'alumno' => $request->alumno,
          'profesor' => $request->profesor,
          'ejercicio' => $request->ejercicio,
          'series' => $request->series,
          'repeticiones' => $request->repeticiones,
          'descanso' => $request->descanso,
        ]);
    
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
