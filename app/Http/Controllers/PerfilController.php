<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PerfilController extends Controller
{

 /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */

 public function edit($id)
 {
  $usuario = User::findOrFail($id);

  return view('perfil.edit', compact('usuario'));
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
   'email' => 'required|string|email|max:255|unique:users',
   'phone' => 'required|int',
   'emergency_number' => 'required|int',
   'password' => 'min:6|confirmed',
  ]);

  $usuario = request()->except('_token', '_method');

  User::where('id', '=', $id)->update($usuario);

  return redirect('perfil.edit')->with('status', 'Usuario modificado con exito');
 }
}
