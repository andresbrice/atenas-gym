<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarifa;

class TarifaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $tarifas = Tarifa::orderBy('cantidad_dias','ASC')->paginate(5);
            return view('tarifa.index',compact('tarifas'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tarifa.create');
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
            'cantidad_dias' => 'required|int|unique:tarifas|max:5',
            'precio' => 'required|int|unique:tarifas',
        ]);
        

        $tarifa = Tarifa::create([
            'cantidad_dias'=> $request->cantidad_dias,
            'precio'=> $request->precio,

        ]);

       return redirect('tarifa')->with('status', 'Tarifa creado con exito');

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
        $tarifa = Tarifa::findOrFail($id);
        return view('tarifa.edit', compact("tarifa"));
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
            'cantidad_dias' => 'required|int|unique:tarifas|max:5',
            'precio' => 'required|int|unique:tarifas',
        ]);
          
          $tarifa = request()->except('_token', '_method');
    
          Tarifa::where('id', '=', $id)->update($tarifa);
    
          return redirect('Tarifa')->with('status', 'Tarifa modificada con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tarifa::destroy($id);

        return redirect('tarifa')->with('status', 'Tarifa eliminada con exito');
    }
}
