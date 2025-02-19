<?php

use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\JuriController;
use Illuminate\Support\Facades\Route;


Route::redirect('/', '/login');

Route::get('/login', function () {return view('login');})->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login_proses']);


Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [LoginController::class, 'home']);
    Route::get('/out', [LoginController::class, 'logout']);

    Route::get('/registrasi', [RegistrasiController::class, 'index'])->name('registrasi.index');
    Route::post('/registrasi', [RegistrasiController::class, 'store'])->name('registrasi.store');

    // Juri
    Route::get('/juri', [JuriController::class, 'index']);
    Route::post('/a/juri', [JuriController::class, 'add']);
    Route::put('/u/juri/{id}', [JuriController::class, 'update']);
    Route::delete('/d/juri/{id}', [JuriController::class, 'delete'])->name('juri.delete');
});




