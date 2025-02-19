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

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama' => 'required',
            ]);

            Kategori::create([
                'nama' => $request->nama,
            ]);

            return redirect()->route('kategori.index')->with('success', 'Data berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->route('kategori.index')->with('error', 'Data gagal ditambahkan');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'nama' => 'required',
            ]);

            Kategori::find($id)->update([
                'nama' => $request->nama,
            ]);

            return redirect()->route('kategori.index')->with('success', 'Data berhasil diubah');
        } catch (\Exception $e) {
            return redirect()->route('kategori.index')->with('error', 'Data gagal diubah');
        }
    }

    // public function ajaxData()
    // {
    //     $query = Kategori::orderBy('id', 'desc');
    //     return DataTables::of($query)
    //         ->addColumn('action', function ($item) {
    //             return '<a href="#" class="btn btn-sm btn-primary">Edit</a>' . ' ' . '<a href="#" class="btn btn-sm
    //             btn-danger">Hapus</a>';
    //         })
    //         ->rawColumns(['action'])
    //         ->make(true);
    // }
}
