<?php

use App\Http\Controllers\AsistenciaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClaseController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\EjercicioController;
use App\Http\Controllers\TarifaController;


require __DIR__.'/auth.php';

Route::get('/', function () {
  return view('dashboard');
})->middleware('auth')->name('dashboard');


Route::get('/add-alumno', function () {
  return view('clase.addAlumno');
})->middleware('auth')->name('AddAlumno');


Route::resource('usuario', UserController::class); 
Route::resource('clase', ClaseController::class); 
Route::resource('horario', HorarioController::class); 
Route::resource('asistencia', AsistenciaController::class); 
Route::resource('ejercicio', EjercicioController::class);
Route::resource('tarifa', TarifaController::class);

Route::get('asistencia/filtroclase', [AsistenciaController::class, 'filtroclase'])->name('asistencia.filtroclase');

// Route::middleware(['auth', 'verified'])->group(function () {
//     Route::get('/', function () {
//       return view('dashboard');
//     })->name('dashboard');

//     Route::group(['middleware' => 'admin'], function () {
//       Route::resource('usuario', UserController::class); 
//     });

//     // Route::group(['middleware' => 'profesor'], function () {
//     //     Route::resource('usuario', UserController::class);
//     // });

//     // Route::group(['middleware' => 'alumno'], function () {
//     //     Route::resource('usuario', UserController::class);
//     // });
// });




