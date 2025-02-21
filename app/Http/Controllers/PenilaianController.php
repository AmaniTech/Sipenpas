<?php

namespace App\Http\Controllers;

use App\Models\Grup;
use App\Models\Penilaian;
use App\Models\Peserta;
use App\Models\SubKategori;
use App\Models\Juri;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class PenilaianController extends Controller
{
    public function index()
    {
        return view('penilaian.index');
    }

    public function ajaxData()
    {
        $query = Grup::all();

        $jumlahNilai = SubKategori::count();


        return datatables()->of($query)
            ->addColumn('action', function ($item) {
                return '
                    <a href="' . route('penilaian.a', $item->id) . '" class="btn btn-sm btn-primary">Nilai</a>
                ';
            })
            ->addColumn('progress', function ($item) use ($jumlahNilai) {

                $progressPenilaian = Penilaian::where('grup_id', $item->id)->count();
                if ($jumlahNilai == 0 || $progressPenilaian == 0) {
                    $progress = 0;
                    $areavalue = 100;
                } else {
                    $progress = ($progressPenilaian / $jumlahNilai) * 100;
                    $areavalue = $progress;
                }


                $bgprogress = 'bg-danger';

                if ($progress >= 25) {
                    $bgprogress = 'bg-warning';
                }

                if ($progress >= 50) {
                    $bgprogress = 'bg-info';
                }

                if ($progress >= 75) {
                    $bgprogress = 'bg-primary';
                }

                if ($progress >= 100) {
                    $bgprogress = 'bg-success';
                }

                return '
                   <div class="progress" role="progressbar" aria-label="Example with label" aria-valuenow="' . $progress . '" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar ' . $bgprogress . '" style="width: ' . $areavalue . '%">' . $progress . '% </div>
                    </div>
                ';
            })
            ->addIndexColumn()
            ->rawColumns(['action', 'progress'])
            ->make(true);
    }

    public function a($id)
    {
        $cek = Penilaian::where('grup_id', $id)->count();


        if ($cek > 0) {
            Alert::error('Gagal', 'Penilaian Sudah Dilakukan');
            return back();
        }

        $data_sekolah = Grup::where('id', $id)->with('peserta')->first();

        $kategori = Kategori::with('subkategori')->get();

        $juri = Juri::all();

        return view('penilaian.nilai.index', [
            'data_sekolah' => $data_sekolah,
            // 'data_peserta' => $data_peserta,
            'kategori' => $kategori,
            'juri' => $juri
        ]);
    }

    public function main(Request $req)
    {
        $urutanKategori = $req->kategori;
        $juri = $req->juri;
        $grup_id = $req->grup_id;
        $i = $req->i;
        $u = $req->u;
        // return response()->json($req->all());

        try {
            DB::beginTransaction();

            foreach ($u as $key => $value) {
                Penilaian::create([
                    'juri_id' => $juri,
                    'grup_id' => $grup_id,
                    'sub_kategori_id' => $value,
                    'poin' => $req->nilai[$i[$key]][$value],
                ]);
            }


            DB::commit();
            return response()->json([
                'status' => 200,
                'message' => 'Sukses!'
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
            return response()->json([
                'status' => 99,
                'message' => 'Terjadi Kesalahan!'
            ]);
        }
    }
}
