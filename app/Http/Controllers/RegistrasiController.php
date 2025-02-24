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
            $bukti_pembayaran->storeAs('bukti_pembayaran', $filebukti, 'public');

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
                $roles[] = 'Anggota';
            }

            foreach ($roles as $index => $role) {
                $pesertaName = $request->peserta[$index] ?? null;

                if (empty($pesertaName)) {
                    continue;
                }

                $filename = null;

                if ($request->hasFile("foto_peserta.$index")) {
                    $filename = "{$pesertaName}_{$request->asal_sekolah}_{$request->tim}." .
                        $request->file("foto_peserta.$index")->getClientOriginalExtension();
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

    public function showPeserta()
    {
        $grup = Grup::all();

        return view('peserta.index', [
            'grup' => $grup
        ]);
    }

    public function showDetailPeserta($id)
    {
        $peserta = Peserta::where('grup_id', $id)->get();

        $data_grup = Grup::where('id', $id)->first();
        return view('peserta.listPeserta.index', [
            'peserta' => $peserta,
            'data_grup' => $data_grup
        ]);
    }

    public function a(Request $request, $id)
    {
        $old_foto = Peserta::where('id', $id)->value('foto');

        $pesertaName = $request->input("name$id");
        $posisi = $request->input("posisi$id");
        $grup_id = $request->input("sekolah$id");

        $data_grup = Grup::where('id', $grup_id)->first();
        $asal_sekolah = $data_grup->asal_sekolah;
        $tim = $data_grup->tim;


        $filename = "{$pesertaName}_{$asal_sekolah}_{$tim}";
        if ($request->hasFile("photo$id")) {
            $fileExtension = $request->file("photo$id")->getClientOriginalExtension();
            $filename .= ".{$fileExtension}";

            $filePath = 'peserta_foto/' . $old_foto;
            Storage::disk('public')->delete($filePath);

            $request->file("photo$id")->storeAs('peserta_foto', $filename, 'public');
        } else {
            $filename = $old_foto;
        }

        Peserta::where('id', $request->id)->update([
            'nama' => $pesertaName,
            'posisi' => $posisi,
            'foto' => $filename
        ]);

        toast('Data berhasil di update', 'success');
        return redirect()->back();
    }

    public function cetakbos($grup_id)
    {
        $peserta = Peserta::where('grup_id', $grup_id)->whereNotIn('posisi', ['Danton', 'Official', 'Pelatih'])->get();
        $data_grup = Grup::where('id', $grup_id)->first();

        $danton = Peserta::where('grup_id', $grup_id)->whereIn('posisi', ['Danton', 'Official', 'Pelatih'])->get();

        return view('peserta.listPeserta.cetak', [
            'peserta' => $peserta,
            'data_grup' => $data_grup,
            'danton' => $danton
        ]);
    }

    public function delete($id)
    {
        Peserta::where('id', $id)->delete();

        toast('Hapus Sukses!', 'success');
        return redirect()->back();
    }

    public function cetakIDCard($grup_id)
    {
        $peserta = Peserta::where('grup_id', $grup_id)->get();
        $data_grup = Grup::where('id', $grup_id)->first();
        return view('peserta.listPeserta.cetakidCard', [
            'peserta' => $peserta,
            'data_grup' => $data_grup
        ]);
    }
}
