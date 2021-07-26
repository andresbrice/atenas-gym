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

    $usuarios = User::where('active', 1)
      ->orderByDesc('id')
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
      'userName' => 'required|string|max:255',      'dni' => 'required|int|digits:8|unique:users',
      'lastName' => 'required|regex:/^[\pL\s\-]+$/u|string|max:255',
      'gender' => 'required',
      'phone' => 'required|int|digits_between:7,13',
      'emergency_number' => 'required|int|digits_between:7,13',
      'age' => 'required|int|between:10,99',
    ]);

    if ($request->role_id == 2 || $request->role_id == 3) {
      if ($request->age < 21 || $request->age > 60) {
        return  back()->with('error', 'Un profesor no puede ser menor a 21 años o mayor a 60.')->withInput();
      }
    }

    $query = DB::select('select count(*) as c, users.id as id, users.active as activo from users where users.userName = ?', [$request->userName]);

    if ($query[0]->c > 0) {
      $usuario = User::findOrFail($query[0]->id);
      $usuario->active = 1;
      $usuario->save();
      return redirect('usuario')->with('message', 'Usuario creado con éxito');
    } else {

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

      return redirect('usuario')->with('message', 'Usuario creado con éxito.');
    }
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
      return redirect(session('usuario_url'))->with('message', 'Usuario modificado con éxito.');
    }

    return redirect('usuario')->with('message', 'Usuario modificado con éxito.');
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

    $usuario->active = 0;
    $usuario->save();

    return redirect('usuario')->with('message', 'Usuario borrado con éxito.');
  }
}
