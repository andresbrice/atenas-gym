<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rutina;
use App\Models\Alumno;
use App\Models\User;


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
        $alumnos = User::select('name', 'lastName')
            ->where('role_id', '=', 1)
            ->orderBy('name', 'asc')
            ->get();

        $profesores = User::select('name', 'lastName')
            ->where('role_id', '=', 2)
            ->orderBy('name', 'asc')
            ->get();

        return view('rutina.create', compact('alumnos', 'profesores'));

        // $name = $request->get('name');
        // // $userName = $request->get('userName');
        // // $lastName = $request->get('lastName');

        // $usuarios = User::orderBy('id', 'DESC')
        //     ->name($name)
        //     // ->userName($userName)
        //     // ->lastName($lastName)
        //     ->simplePaginate(4);

        // return view('rutina.create', compact('usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
