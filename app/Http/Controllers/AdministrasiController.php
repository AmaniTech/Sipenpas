<?php

namespace App\Http\Controllers;

use App\Models\Administrasi;
use Illuminate\Http\Request;

class AdministrasiController extends Controller
{
    public function index()
    {
        $data['administrasi'] = Administrasi::all();
        $data['title'] = 'Master Administrasi dan Juri Arena';
        return view('master.administrasi.index')->with($data);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama' => 'required',
                'jenis' => 'required',
                'tipe' => 'required',
                'nilai' => 'required',
            ]);

            Administrasi::create([
                'nama' => $request->nama,
                'jenis' => $request->jenis,
                'tipe' => $request->tipe,
                'nilai' => $request->nilai,
            ]);

            toast('Tambah Sukses!', 'success');
            return redirect()->route('administrasi.index');
        } catch (\Exception $e) {
            toast($e->getMessage(), 'error');
            return redirect()->route('administrasi.index');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'nama' => 'required',
                'jenis' => 'required',
                'tipe' => 'required',
                'nilai' => 'required',
            ]);

            Administrasi::find($id)->update([
                'nama' => $request->nama,
                'jenis' => $request->jenis,
                'tipe' => $request->tipe,
                'nilai' => $request->nilai,
            ]);

            toast('Update Sukses!', 'success');
            return redirect()->route('administrasi.index');
        } catch (\Exception $e) {
            toast($e->getMessage(), 'error');
            // toast('Update Gagal!', 'error');
            return redirect()->route('administrasi.index');
        }
    }

    public function delete($id)
    {
        try {
            Administrasi::find($id)->delete();
            toast('Hapus Sukses!', 'success');
            return redirect()->route('administrasi.index');
        } catch (\Exception $e) {
            toast('Hapus Gagal!', 'error');
            return redirect()->route('administrasi.index');
        }
    }

    public function print()
    {
        $administrasi = Administrasi::where('jenis', 'Administrasi')->get();
        $juri = Administrasi::where('jenis', 'Juri Arena Lomba')->get();


        return view('master.administrasi.print', compact('administrasi', 'juri'));
    }
}
