<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\JuriController;
use Illuminate\Support\Facades\Route;


Route::redirect('/', '/login');

Route::get('/login', function () {
    return view('login');
})->name('login')->middleware('guest');
Route::get('/registrasi', [RegistrasiController::class, 'index'])->name('registrasi.index');
Route::post('/registrasi', [RegistrasiController::class, 'store'])->name('registrasi.store');

Route::get('/login', function () {return view('login');})->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login_proses']);


Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [LoginController::class, 'home'])->name('home');
    Route::get('/out', [LoginController::class, 'logout']);

    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
    Route::post('/kategori/store', [KategoriController::class, 'store'])->name('kategori.store');
    Route::put('/kategori/update/{id}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::delete('/kategori/delete/{id}', [KategoriController::class, 'delete'])->name('kategori.delete');

    Route::get('/juri', [JuriController::class, 'index'])->name('juri.index');
    Route::post('/a/juri', [JuriController::class, 'add'])->name('juri.add');
    Route::put('/u/juri/{id}', [JuriController::class, 'update'])->name('juri.update');
    Route::delete('/d/juri/{id}', [JuriController::class, 'delete'])->name('juri.delete');

    Route::get('/peserta', [RegistrasiController::class, 'showPeserta'])->name('peserta.index');
    Route::get('/list/peserta/{id}', [RegistrasiController::class, 'showDetailPeserta']);
    Route::post('/update/peserta/{id}', [RegistrasiController::class, 'a']);
    Route::get('cetak/peserta/{grup_id}', [RegistrasiController::class, 'cetakbos']);
    Route::delete('delete/peserta/{id}', [RegistrasiController::class, 'delete']);
});






