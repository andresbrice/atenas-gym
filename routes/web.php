<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
      return view('dashboard');
    });

    Route::group(['middleware' => 'admin'], function () {
        Route::resource('usuario', UserController::class);
    });

    // Route::group(['middleware' => 'profesor'], function () {
    //     Route::resource('usuario', UserController::class);
    // });

    // Route::group(['middleware' => 'alumno'], function () {
    //     Route::resource('usuario', UserController::class);
    // });
});



require __DIR__.'/auth.php';
