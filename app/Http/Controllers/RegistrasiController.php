<?php

namespace App\Http\Controllers;

use App\Models\Grup;
use App\Models\Peserta;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as FacadesDB;

class RegistrasiController extends Controller
{
    public function index()
    {
        return view('registrasi.index');
    }

    public function store(Request $request)
    {
        FacadesDB::beginTransaction();
        try {

            $request->validate([
                'asal_sekolah' => 'required',
                'tim' => 'required',
                'tingkatan' => 'required',
                'no_hp' => 'required',
            ]);

            $filebukti = "bayar_{$request->asal_sekolah}_{$request->tim}." . $request->file("bukti_pembayaran")->getClientOriginalExtension();
            $bukti_pembayaran = $request->file("bukti_pembayaran");
            $bukti_pembayaran->storeAs('bukti_pembayaran', $filebukti , 'public');

            $grup = Grup::create([
                'asal_sekolah' => $request->asal_sekolah,
                'tim' => $request->tim,
                'bukti_pembayaran' => $bukti_pembayaran->getClientOriginalName(),
                'tingkatan' => $request->tingkatan,
                'no_hp' => $request->no_hp,
            ]);

            $roles = ['Official', 'Pelatih', 'Danton'];
            for ($i = 1; $i <= 15; $i++) {
                $roles[] = 'Anggota ' . $i;
            }

            foreach ($roles as $index => $role) {
                $pesertaName = $request->peserta[$index] ?? null;
                $filename = null;

                if ($request->hasFile("foto_peserta.$index")) {
                    $filename = "{$pesertaName}_{$request->asal_sekolah}_{$request->tim}." . $request->file("foto_peserta.$index")->getClientOriginalExtension();
                    $request->file("foto_peserta.$index")->storeAs('peserta_foto', $filename, 'public');
                }

                Peserta::create([
                    'grup_id' => $grup->id,
                    'nama' => $pesertaName,
                    'posisi' => $role,
                    'foto' => $filename,
                ]);
            }



            FacadesDB::commit();
            return redirect()->back()->with('success', 'Registrasi berhasil');
        } catch (\Exception $e) {
            FacadesDB::rollback();
            return redirect()->back()->with('error', 'Registrasi gagal ! ' . $e->getMessage());
        }
    }
}
