<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Alumno;
use App\Models\Profesor;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
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

    $usuarios = User::orderBy('id', 'DESC')
      ->search($filtro, $search)
      ->simplePaginate(4);

    Session::put('usuario_url', request()->fullUrl());
    // echo Session::get('usuario_url');

    return view('usuario.index', compact('usuarios'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $roles = Role::all();
    return view('usuario.create', compact('roles'));
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
      'name' => 'required|regex:/^[\pL\s\-]+$/u|string|max:255',
      'email' => 'required|string|email|max:255|unique:users',
      'userName' => 'required|string|max:255',
      'dni' => 'required|int|digits:8|unique:users',
      'lastName' => 'required|regex:/^[\pL\s\-]+$/u|string|max:255',
      'gender' => 'required',
      'phone' => 'required|int|digits_between:7,13',
      'emergency_number' => 'required|int|digits_between:7,13',
      'age' => 'required|int|between:10,99',
    ]);

    $user = User::create([
      'name' => $request->name,
      'email' => $request->email,
      'userName' => $request->userName,
      'dni' => $request->dni,
      'age' => $request->age,
      'lastName' => $request->lastName,
      'gender' => $request->gender,
      'phone' => $request->phone,
      'emergency_number' => $request->emergency_number,
      'eRespiratorias' => $request->has('eRespiratorias'),
      'eCardiacas' => $request->has('eCardiacas'),
      'eRenal' => $request->has('eRenal'),
      'convulsiones' => $request->has('convulsiones'),
      'epilepsia' => $request->has('epilepsia'),
      'diabetes' => $request->has('diabetes'),
      'asma' => $request->has('asma'),
      'alergia' => $request->has('alergia'),
      'medicacion' => $request->has('medicacion'),
      'role_id' => $request->role_id,
    ]);


    Password::sendResetLink($request->only(['email']));

    event(new PasswordReset($user));

    switch ($user->role_id) {
      case '1':
        $alumno = new Alumno();
        $alumno->user_id = $user->id;
        $alumno->save();
        break;
      case '2':
        $profesor = new Profesor();
        $profesor->user_id = $user->id;
        $profesor->save();
        break;
      case '3':
        $profesor = new Profesor();
        $profesor->user_id = $user->id;
        $profesor->save();
        break;
    }

    return redirect('usuario')->with('message', 'Usuario creado con exito');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $usuario = User::findOrFail($id);

    return view('usuario.show', compact('usuario'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $usuario = User::findOrFail($id);
    $roles = Role::all();
    return view('usuario.edit', compact('usuario', 'roles'));
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
    $user = User::findOrFail($id);
    $request->validate([
      'name' => 'required|regex:/^[\pL\s\-]+$/u|string|max:255',
      'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
      'userName' => 'required|string|max:255',
      'dni' => 'required|int|digits:8|unique:users,dni,' . $user->id,
      'lastName' => 'required|regex:/^[\pL\s\-]+$/u|string|max:255',
      'gender' => 'required',
      'phone' => 'required|int|digits_between:7,13',
      'emergency_number' => 'required|int|digits_between:7,13',
      'age' => 'required|int|between:10,99',
    ]);

    $usuario = request()->except('_token', '_method');

    User::where('id', '=', $id)->update($usuario);

    if (session('usuario_url')) {
      return redirect(session('usuario_url'))->with('message', 'Usuario modificado con exito');
    }

    return redirect('usuario')->with('message', 'Usuario modificado con exito');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {

    $usuario = User::findOrFail($id);

    if ($usuario->role_id == 1) {

      $alumno_id = DB::select('select alumnos.id as id from alumnos JOIN users on alumnos.user_id = users.id WHERE users.id = ?', [$usuario->id]);
      dd($alumno_id);
      $query = DB::select('select count(*) as c from users JOIN alumnos ON users.id = alumnos.user_id WHERE alumnos.id
        IN (SELECT alumno_clase.alumno_id FROM alumno_clase WHERE alumno_clase.alumno_id = ?)', [$alumno_id[0]->alumno]);
    } else {
      $profesor_id = DB::select('select profesors.id as id from profesors JOIN users on profesors.user_id = users.id WHERE users.id = ?', [$usuario->id]);
      $query = DB::select('select count(*) as c from users JOIN profesors ON users.id = profesors.user_id WHERE profesors.id IN (SELECT clase_profesor.profesor_id FROM clase_profesor WHERE clase_profesor.profesor_id = ?)', [$profesor_id[0]->profesor]);
    }

    if ($query[0]->c > 0) {
      return redirect('usuario')->with('error', 'No es posible eliminar este usuario ya que esta relacionado con una clase');
    } else {

      User::destroy($id);

      return redirect('usuario')->with('message', 'Usuario eliminado con exito');
    }
  }
}
