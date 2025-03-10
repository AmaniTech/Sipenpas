<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Penilaian;
use Illuminate\Http\Request;

class RekapController extends Controller
{
    public function index()
    {
        $data = Penilaian::with('grup', 'subkategori', 'subkategori.kategori', 'items', 'penilaianadministrasi')->orderBy('poin', 'desc')->get();
        $kategori = Kategori::all();
        return view('rekap', compact('data', 'kategori'));
    }
}
