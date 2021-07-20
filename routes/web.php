<?php

use App\Http\Controllers\AsistenciaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClaseController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\EjercicioController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\RutinaController;
use App\Http\Controllers\TarifaController;
use App\Http\Controllers\CuotaController;
use App\Http\Controllers\AlumnoController;

require __DIR__ . '/auth.php';

Route::get('/', function () {
  return view('dashboard');
})->middleware('auth')->name('dashboard');


Route::middleware(['auth', 'verified'])->group(function () {
  Route::get('/', function () {
    return view('dashboard');
  })->name('dashboard');

  Route::view('perfil', 'perfil.edit')->name('perfil');
  Route::put('perfil', [PerfilController::class, 'update'])->name('perfil.update');



  Route::group(['middleware' => 'admin'], function () {
    Route::resource('usuario', UserController::class);
    Route::resource('clase', ClaseController::class);
    Route::resource('horario', HorarioController::class);
    Route::resource('asistencia', AsistenciaController::class);
    Route::resource('tarifa', TarifaController::class);
    Route::resource('ejercicio', EjercicioController::class);
    Route::get('clase/{clase}/alumnos', [ClaseController::class, 'indexAlumnos'])->name('clase.alumnos');
    Route::post('clase/addAlumnos', [ClaseController::class, 'addAlumnos'])->name('clase.addAlumnos');
    Route::get('buscarclase', [AsistenciaController::class, 'buscarClase'])->name('asistencia.buscarclase');
    Route::resource('rutina', RutinaController::class);
    Route::resource('cuota', CuotaController::class);
    Route::get('seleccionaralumno', [CuotaController::class, 'seleccionarAlumno'])->name('cuota.seleccionaralumno');
    Route::get('findClase', [RutinaController::class, 'findClase'])->name('findClase');
  });

  // Route::group(['middleware' => 'profesor'], function () {
  //     Route::resource('usuario', UserController::class);
  // });

  Route::group(['middleware' => 'alumno'], function () {
    Route::get('claseAlumno', [AlumnoController::class, 'consultaClase'])->name('alumnos.clase');
    Route::get('asistenciaAlumno', [AlumnoController::class, 'consultaAsistencia'])->name('alumnos.asistencia');
    Route::get('rutinaAlumno', [AlumnoController::class, 'consultaRutina'])->name('alumnos.rutina');
    Route::get('cuotaAlumno', [AlumnoController::class, 'consultaCuota'])->name('alumnos.cuota');
    Route::get('imprimirRutina', [AlumnoController::class, 'imprimirRutina'])->name('alumnos.imprimirRutina');
  });
});
