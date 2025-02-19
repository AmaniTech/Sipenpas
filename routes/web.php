<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\JuriController;
use App\Http\Controllers\SubKategoriController;
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

    Route::get('/subkategori', [SubKategoriController::class, 'index'])->name('subkategori.index');
    Route::get('/subkategori/data', [SubKategoriController::class, 'ajaxdata'])->name('subkategori.data');
    Route::post('/subkategori/store', [SubKategoriController::class, 'store'])->name('subkategori.store');
    Route::put('/subkategori/update/{id}', [SubKategoriController::class, 'update'])->name('subkategori.update');
    Route::delete('/subkategori/delete/{id}', [SubKategoriController::class, 'delete'])->name('subkategori.delete');

    Route::get('/juri', [JuriController::class, 'index'])->name('juri.index');
    Route::post('/a/juri', [JuriController::class, 'add'])->name('juri.add');
    Route::put('/u/juri/{id}', [JuriController::class, 'update'])->name('juri.update');
    Route::delete('/d/juri/{id}', [JuriController::class, 'delete'])->name('juri.delete');
});




