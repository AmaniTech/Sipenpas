<?php

namespace App\Http\Controllers;

use App\Models\Grup;
use App\Models\Peserta;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as FacadesDB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;

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
                // 'bukti_pembayaran' => $bukti_pembayaran->getClientOriginalName(),
                'bukti_pembayaran' => $filebukti,
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

    public function showPeserta(){
        $grup = Grup::all();

        return view('peserta.index', [
            'grup' => $grup
        ]);
    }

    public function showDetailPeserta($id){
        $peserta = Peserta::where('grup_id', $id)->get();

        $data_grup = Grup::where('id', $id)->first();
        return view('peserta.listPeserta.index', [
            'peserta' => $peserta,
            'data_grup' => $data_grup
        ]);
    }

    public function updateDetailPeserta(Request $request, $id){
        $old_foto = Peserta::where('id', $id)->value('foto');
        $pesertaName = $request->name;
        $posisi = $request->posisi;

        $data_grup = Grup::where('id', $request->sekolah)->first();
        $asal_sekolah = $data_grup->asal_sekolah;
        $tim = $data_grup->tim;

        
        $filename = "{$pesertaName}_{$asal_sekolah}_{$tim}";
        if ($request->hasFile('gambar')) {
            $fileExtension = $request->file('gambar')->getClientOriginalExtension();
            $filename .= ".{$fileExtension}";

            $filePath = 'peserta_foto/' . $old_foto;
            Storage::disk('public')->delete($filePath);

            $request->file('gambar')->storeAs('peserta_foto', $filename, 'public');
        } else {
            // Jika tidak ada gambar baru, gunakan gambar lama
            $filename = $old_foto;
        }

        Peserta::where('id', $id)->update([
            'nama' => $pesertaName,
            'posisi' => $posisi,
            'foto' => $filename,
        ]);

        toast('Data berhasil di update','success');
        return redirect()->back();
        
    }
}
