<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

require __DIR__.'/auth.php';

Route::get('/', function () {
  return view('dashboard');
})->middleware('auth')->name('dashboard');


Route::get('/add-alumno', function () {
  return view('clase.addAlumno');
})->middleware('auth')->name('AddAlumno');


Route::resource('usuario', UserController::class); 

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




