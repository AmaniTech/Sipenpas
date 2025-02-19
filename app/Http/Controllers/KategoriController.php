<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KategoriController extends Controller
{
    public function index()
    {
        $data['kategori'] = Kategori::all();
        $data['title'] = 'Master Kategori';
        return view('master.kategori.index')->with($data);
    }

    public function ajaxData()
    {
        $query = Kategori::orderBy('id', 'desc');
        return DataTables::of($query)->toJson();
    }
}
