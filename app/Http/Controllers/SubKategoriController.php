<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\SubKategori;
use Illuminate\Http\Request;

class SubKategoriController extends Controller
{
    public function index()
    {
        $data['kategori'] = Kategori::all();
        return view('master.subkategori.index')->with($data);
    }

    public function ajaxData()
    {
        $data = SubKategori::with('kategori')->get();
        return datatables()->of($data)
            ->addIndexColumn()
            ->addColumn('kategori', function ($data) {
                return $data->kategori->nama;
            })
            ->addColumn('action', function ($data) {
                return '<button type="button" class="btn btn-warning border border-white"
                onclick="showEditModal(' . $data->id . ', \'' . addslashes($data->nama) . '\', ' . $data->kategori_id . ')">
                Edit
            </button>  <form action="/subkategori/delete/' . $data->id . '" method="POST" style="display:inline;">
                                                          ' . csrf_field() . '
                                                          ' . method_field("DELETE") . '
                                                        <button type="submit" class="btn btn-danger border border-white" onclick="return confirm(\'Apakah anda yakin ingin menghapus data ini?\')">Delete</button>
                                                    </form>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'kategori_id' => 'required',
                'nama' => 'required',
            ]);

            SubKategori::create([
                'kategori_id' => $request->kategori_id,
                'nama' => $request->nama,
            ]);

            toast('Tambah Sukses!', 'success');
            return redirect()->route('subkategori.index');
        } catch (\Exception $e) {
            toast($e->getMessage(), 'error');
            return redirect()->route('subkategori.index');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'kategori_id' => 'required',
                'nama' => 'required',
            ]);

            SubKategori::find($id)->update([
                'kategori_id' => $request->kategori_id,
                'nama' => $request->nama,
            ]);

            toast('Update Sukses!', 'success');
            return redirect()->route('subkategori.index');
        } catch (\Exception $e) {
            toast('Update Gagal!', 'error');
            return redirect()->route('subkategori.index');
        }
    }
}
