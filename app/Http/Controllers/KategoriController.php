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

            toast('Tambah Sukses!', 'success');
            return redirect()->route('kategori.index');
        } catch (\Exception $e) {
            toast($e->getMessage(), 'error');
            return redirect()->route('kategori.index');
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

            toast('Update Sukses!', 'success');
            return redirect()->route('kategori.index');
        } catch (\Exception $e) {
            toast('Update Gagal!', 'error');
            return redirect()->route('kategori.index');
        }
    }

    public function delete($id)
    {
        try {
            Kategori::find($id)->delete();
            toast('Hapus Sukses!', 'success');
            return redirect()->route('kategori.index');
        } catch (\Exception $e) {
            toast('Hapus Gagal!', 'error');
            return redirect()->route('kategori.index');
        }
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
