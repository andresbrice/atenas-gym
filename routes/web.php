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
    //gestion usuario
    Route::resource('usuario', UserController::class);
    //gestion clase
    Route::resource('clase', ClaseController::class);
    Route::get('clase/{clase}/alumnos', [ClaseController::class, 'indexAlumnos'])->name('clase.alumnos');
    Route::post('addAlumnos/{clase}', [ClaseController::class, 'addAlumnos'])->name('clase.addAlumnos');
    Route::delete('deleteAlumnos/{alumno}/{clase}', [ClaseController::class, 'deleteAlumnos'])->name('clase.deleteAlumnos');
    Route::get('clase/{clase}/profesores', [ClaseController::class, 'indexProfesores'])->name('clase.profesores');
    Route::post('addprofesores/{clase}', [ClaseController::class, 'addProfesores'])->name('clase.addProfesores');
    Route::delete('deleteprofesores/{profesor}/{clase}', [ClaseController::class, 'deleteProfesores'])->name('clase.deleteProfesores');
    //gestion horario
    Route::resource('horario', HorarioController::class);
    //gestion asistencia
    Route::resource('asistencia', AsistenciaController::class);
    Route::get('buscarclase', [AsistenciaController::class, 'buscarClase'])->name('asistencia.buscarclase');
    //gestion tarifa
    Route::resource('tarifa', TarifaController::class);
    //gestion ejercicio
    Route::resource('ejercicio', EjercicioController::class);
    //gestion rutina
    Route::resource('rutina', RutinaController::class);
    Route::get('findClase', [RutinaController::class, 'findClase'])->name('findClase'); //json 
    Route::get('rutina/{rutina}/ejercicios', [RutinaController::class, 'indexEjercicios'])->name('rutina.ejercicios');
    Route::post('addEjercicios/{rutina}', [RutinaController::class, 'addEjercicios'])->name('rutina.addEjercicios');
    Route::delete('deleteEjercicios/{alumno}/{rutina}', [RutinaController::class, 'deleteEjercicios'])->name('rutina.deleteEjercicios');
    //gestion cuota
    Route::resource('cuota', CuotaController::class);
    Route::get('seleccionaralumno', [CuotaController::class, 'seleccionarAlumno'])->name('cuota.seleccionaralumno');
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
