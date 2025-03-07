<?php

use App\Http\Controllers\AdministrasiController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\JuriController;
use App\Http\Controllers\ListPoinController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SubKategoriController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::redirect('/', '/login');

Route::get('/login', function () {
    return view('login');
})->name('login')->middleware('guest');
Route::get('/registrasi', [RegistrasiController::class, 'index'])->name('registrasi.index');
Route::post('/registrasi', [RegistrasiController::class, 'store'])->name('registrasi.store');

Route::get('/login', function () {
    return view('login');
})->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login_proses']);


Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/out', [LoginController::class, 'logout']);

    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
    Route::post('/kategori/store', [KategoriController::class, 'store'])->name('kategori.store');
    Route::put('/kategori/update/{id}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::delete('/kategori/delete/{id}', [KategoriController::class, 'delete'])->name('kategori.delete');

    Route::get('/kategori/print/{kategori}', [KategoriController::class, 'print'])->name('listpoin.print');


    Route::get('/subkategori', [SubKategoriController::class, 'index'])->name('subkategori.index');
    Route::get('/subkategori/data', [SubKategoriController::class, 'ajaxdata'])->name('subkategori.data');
    Route::post('/subkategori/store', [SubKategoriController::class, 'store'])->name('subkategori.store');
    Route::put('/subkategori/update/{id}', [SubKategoriController::class, 'update'])->name('subkategori.update');
    Route::delete('/subkategori/delete/{id}', [SubKategoriController::class, 'delete'])->name('subkategori.delete');

    Route::get('/listpoin/{subkategoriid}', [ListPoinController::class, 'index'])->name('listpoin.index');
    Route::post('/listpoin/store', [ListPoinController::class, 'store'])->name('listpoin.store');
    Route::put('/listpoin/update/{id}', [ListPoinController::class, 'update'])->name('listpoin.update');
    Route::delete('/listpoin/delete/{id}', [ListPoinController::class, 'delete'])->name('listpoin.delete');


    Route::get('/juri', [JuriController::class, 'index'])->name('juri.index');
    Route::post('/a/juri', [JuriController::class, 'add'])->name('juri.add');
    Route::put('/u/juri/{id}', [JuriController::class, 'update'])->name('juri.update');
    Route::delete('/d/juri/{id}', [JuriController::class, 'delete'])->name('juri.delete');

    Route::get('/peserta', [RegistrasiController::class, 'showPeserta'])->name('peserta.index');
    Route::get('/list/peserta/{id}', [RegistrasiController::class, 'showDetailPeserta']);
    Route::post('/update/peserta/{id}', [RegistrasiController::class, 'a']);
    Route::get('cetak/peserta/{grup_id}', [RegistrasiController::class, 'cetakbos']);
    Route::delete('delete/peserta/{id}', [RegistrasiController::class, 'delete']);
    Route::get('cetak/idvard/{grup_id}', [RegistrasiController::class, 'cetakIDCard']);

    Route::get('/penilaian', [PenilaianController::class, 'index'])->name('penilaian.index');
    Route::get('/penilaian/data', [PenilaianController::class, 'ajaxData'])->name('penilaian.data');
    Route::get('/penilaian/nilai', [PenilaianController::class, 'index'])->name('penilaian.grup');
    Route::get('/penilaian/grup/{id}', [PenilaianController::class, 'a'])->name('penilaian.a');
    Route::post('/a/penilaian', [PenilaianController::class, 'main']);
    Route::put('/b/penilaian', [PenilaianController::class, 'update']);
    Route::post('/didis', [PenilaianController::class, 'didis']);

    Route::get('/administrasi', [AdministrasiController::class, 'index'])->name('administrasi.index');
    Route::post('/administrasi/store', [AdministrasiController::class, 'store'])->name('administrasi.store');
    Route::put('/administrasi/update/{id}', [AdministrasiController::class, 'update'])->name('administrasi.update');
    Route::delete('/administrasi/delete/{id}', [AdministrasiController::class, 'delete'])->name('administrasi.delete');
    Route::get('/administrasi/print', [AdministrasiController::class, 'print'])->name('administrasi.print');

    Route::get('/setting', [SettingController::class, 'index'])->name('setting');
    Route::put('/setting/update/{id}', [SettingController::class, 'update'])->name('setting.update');
});

