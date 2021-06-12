<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

require __DIR__.'/auth.php';

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/', function () {
      return view('dashboard');
    })->name('dashboard');

    Route::resource('usuario', UserController::class);

    
    Route::group(['middleware' => 'admin'], function () {
        
    });

    // Route::group(['middleware' => 'profesor'], function () {
    //     Route::resource('usuario', UserController::class);
    // });

    // Route::group(['middleware' => 'alumno'], function () {
    //     Route::resource('usuario', UserController::class);
    // });
});




