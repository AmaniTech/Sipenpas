<?php

use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;


Route::redirect('/', '/login');

Route::get('/login', function () {
    return view('login');
})->name('login')->middleware('guest');


Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [LoginController::class, 'home']);
    Route::get('/out', [LoginController::class, 'logout']);

    Route::get('/registrasi', [RegistrasiController::class, 'index'])->name('registrasi.index');
    Route::post('/registrasi', [RegistrasiController::class, 'store'])->name('registrasi.store');
});

// Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login_proses']);


