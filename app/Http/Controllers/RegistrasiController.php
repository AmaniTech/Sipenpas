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
            $bukti_pembayaran = $request->file('bukti_pembayaran');
            $bukti_pembayaran->store('bukti_pembayaran', 'public');

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
                $fotoPath = null;

                if ($request->hasFile("foto_peserta.$index")) {
                    $fotoPath = $request->file("foto_peserta.$index")->store('peserta_foto', 'public');
                }

                Peserta::create([
                    'nama' => $pesertaName,
                    'peran' => $role,
                    'foto' => $fotoPath,
                ]);
            }



            FacadesDB::commit();

            return redirect()->back()->with('success', 'Registrasi berhasil');
        } catch (\Exception $e) {
            FacadesDB::rollback();
           dd($e);

        }
    }
}
