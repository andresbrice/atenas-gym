<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Auth\Events\Registered;

class UserController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $name = $request->get('name');
    $userName = $request->get('userName');
    $lastName = $request->get('lastName');

    $usuarios = User::orderBy('id', 'DESC')
      ->name($name)
      ->userName($userName)
      ->lastName($lastName)
      ->paginate(5);

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
      'name' => 'required|string|max:255',
      'email' => 'required|string|email|max:255|unique:users',
      'userName' => 'required|string|max:255',
      'dni' => 'required|int',
      'lastName' => 'required|string|max:255',
      'sex' => 'required',
      'phone' => 'required|int',
      'emergency_number' => 'required|int',
      'age' => 'required|int',
      // 'password' => ['required', 'confirmed', Rules\Password::defaults()],
    ]);

    $user = User::create([
      'name' => $request->name,
      'email' => $request->email,
      'userName' => $request->userName,
      'dni' => $request->dni,
      'age' => $request->age,
      'lastName' => $request->lastName,
      'sex' => $request->sex,
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

    event(new Registered($user));

    return redirect('usuario');
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
    $usuario = request()->except('_token', '_method');

    User::where('id', '=', $id)->update($usuario);

    return redirect('usuario');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    User::destroy($id);

    return redirect('usuario');
  }
}
