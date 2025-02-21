<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grup;
use App\Models\Peserta;

class HomeController extends Controller
{
    public function index(){
        $data_sekolah = Grup::count();
        $data_peserta = Peserta::where('nama', '!=', null)->count();
        
        return view('home', [
            'data_sekolah' => $data_sekolah,
            'data_peserta' => $data_peserta
        ]);
    }
}
