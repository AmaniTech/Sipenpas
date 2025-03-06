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
use Carbon\Carbon;

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
            return $this->ab($id);
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

    private function ab($id)
    {
        $data = DB::select("SELECT a.*,
        b.nama,
        b.id AS idsubkategori,
        d.nama AS namajuri,
        c.nama AS kategori,
        b.urutan
        FROM penilaian a
        JOIN sub_kategori b ON a.sub_kategori_id = b.id
        JOIN kategori c ON b.kategori_id = c.id
        JOIN juri d ON a.juri_id = d.id
        WHERE a.grup_id = $id
        ORDER BY c.nama, b.urutan");

        $data_sekolah = Grup::where('id', $id)->with('peserta')->first();

        $da = $data[0];

        $juri = Juri::all();

        return view('penilaian.nilai.edit', [
            'data_sekolah' => $data_sekolah,
            'da' => $da,
            'data' => $data,
            'juri' => $juri
        ]);
    }

    public function main(Request $req)
    {
        $nilaiData = $req->input('nilai'); 

        // return response()->json($req->all());

        try {
            DB::beginTransaction();

            $penilaian = DB::table('penilaian')->insertGetId([
                'grup_id' => $grup_id,
                'poin' => 0, 
                'posted_at' => Carbon::now(),
            ]);

            foreach ($nilaiData as $kategori_id => $subkategori) {
                foreach ($subkategori as $sub_kategori_id => $data) {
                    $nilai_juri = $data['juri'] ?? []; 
                    
                    
                    foreach ($nilai_juri as $juri_id => $nilai_per_juri) {
                        DB::table('penilaianitem')->insert([
                            'penilaian_id' => $penilaian,
                            'kategori_id' => $kategori_id,
                            'sub_kategori_id' => $sub_kategori_id,
                            'juri' => $juri_id + 1,
                            'plus' => $nilai_per_juri ?? 0, 
                            'min' => 0, 
                            'created_at' => Carbon::now(),
                        ]);
                    }
                }
            }

            $dani_plus = DB::table('penilaianitem')->where('penilaian_id', $penilaian)->sum('plus');
            $dani_min = DB::table('penilaianitem')->where('penilaian_id', $penilaian)->sum('min');

            $totaleDhani = $dani_plus + $dani_min;

            Penilaian::where('id', $penilaian)->update([
                'poin' => $totaleDhani,
            ]);


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

    public function update(Request $req)
    {
        $idnya = $req->idnya;
        $poin = $req->poin;
        $grup_id = $req->grup_id;
        $juri = $req->juri;

        try {
            DB::beginTransaction();

            foreach ($idnya as $v) {
                Penilaian::where('id', $v)->update([
                    'poin' => $poin[$v],
                ]);
            }

            Penilaian::where('grup_id', $grup_id)->update([
                'juri_id' => $juri,
            ]);

            DB::commit();
            return response()->json([
                'status' => 200,
                'message' => 'Sukses!'
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            // dd($th);
            return response()->json([
                'status' => 99,
                'message' => 'Terjadi Kesalahan!'
            ]);
        }
    }
}
