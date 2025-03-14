<?php

namespace App\Http\Controllers;

use App\Models\Grup;
use App\Models\Penilaian;
use App\Models\Peserta;
use App\Models\SubKategori;
use App\Models\Juri;
use App\Models\Kategori;
use App\Models\Administrasi;
use App\Models\PenilaianAdministrasi;
use App\Models\PenilaianItem;
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
                $x = Penilaian::where('grup_id', $item->id)->value('status');
                if ($x == 'A') {
                    return '
                        <a href="' . route('penilaian.a', $item->id) . '" class="btn btn-sm btn-primary">Nilai</a> &nbsp;
                        <a href="' . route('rekaptim', $item->id) . '" class="btn btn-sm btn-primary">Rekap</a>
                    ';
                }else if (empty($x)) {
                    return '
                        <a href="' . route('penilaian.a', $item->id) . '" class="btn btn-sm btn-primary">Nilai</a>
                    ';
                }else {
                    return '
                        <span class="badge bg-danger">DISKULIFIKASI</span>
                    ';
                }

            })->addColumn('status', function ($item) {
                $y = Penilaian::where('grup_id', $item->id)->value('status');
                if (empty($y)) {
                    return 'Belum ada Penilaian';
                }else if ($y == 'A') {
                    return 'Aktif';
                }else{
                    return 'Diskualifikasi';
                }
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
        $minus = Administrasi::all();

        return view('penilaian.nilai.index', [
            'data_sekolah' => $data_sekolah,
            'kategori' => $kategori,
            'minus' => $minus,
            'juri' => $juri
        ]);
    }

    private function ab($id)
    {
        $id_penilaian = Penilaian::where('grup_id', $id)->value('id');

        $data = DB::select("SELECT a.*, b.nama kategoriname, c.nama sub_kategoriname FROM penilaianitem a
                            JOIN kategori b ON a.kategori_id = b.id
                            JOIN sub_kategori c ON a.sub_kategori_id = c.id
                            WHERE penilaian_id = $id_penilaian
                            ORDER BY a.kategori_id, a.sub_kategori_id");

        $dataMinus = DB::select("SELECT a.*, b.nama, b.tipe FROM penilaianadministrasi a
                                JOIN administrasi b ON a.administrasi_id = b.id
                                JOIN penilaian c ON a.penilaian_id = c.id
                                WHERE penilaian_id = $id_penilaian");

        $data_sekolah = Grup::where('id', $id)->with('peserta')->first();

        $da = $data[0];

        $totalnilai = Penilaian::where('id', $id_penilaian)->value('poin');

        return view('penilaian.nilai.edit', [
            'data_sekolah' => $data_sekolah,
            'da' => $da,
            'data' => $data,
            'dataMinus' => $dataMinus,
            'totalnilai' => $totalnilai,
            'id_penilaian' => $id_penilaian
        ]);
    }

    public function main(Request $req)
    {
        $nilaiData = $req->input('nilai');
        $id_administrasi = $req->id_administrasi;
        $minus = $req->minus;

        // return response()->json($req->all());

        // A = 'aktif'
        // C = 'diskualifikasi'

        try {
            DB::beginTransaction();

            $penilaian = DB::table('penilaian')->insertGetId([
                'grup_id' => $req->grup_id,
                'poin' => 0,
                'posted_at' => Carbon::now(),
                'status' => 'A'
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

            foreach ($id_administrasi as $key => $value) {
                DB::table('penilaianadministrasi')->where('id', $value)->insert([
                    'penilaian_id' => $penilaian,
                    'administrasi_id' => $value,
                    'poin' => $minus[$value],
                ]);
            }

            $this->updatePenilaianHeader($penilaian);

            DB::commit();
            return response()->json([
                'status' => 200,
                'message' => 'Sukses!'
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
            // return response()->json([
            //     'status' => 99,
            //     'message' => 'Terjadi Kesalahan!'
            // ]);
        }
    }

    public function update(Request $req)
    {
        $grup_id = $req->grup_id;
        $idnya = $req->idnya;
        $poin_plus = $req->poin_plus;

        $id_administrasi = $req->id_administrasi;
        $poin_min = $req->poin_min;

        $id_penilaian = Penilaian::where('grup_id', $grup_id)->value('id');

        try {
            DB::beginTransaction();

            foreach ($idnya as $v) {
                DB::table('penilaianitem')->where('id', $v)->update([
                    'plus' => $poin_plus[$v],
                ]);
            }

            foreach ($id_administrasi as $key => $value) {
                DB::table('penilaianadministrasi')->where('id', $value)->update([
                    'poin' => $poin_min[$value],
                ]);
            }

            $this->updatePenilaianHeader($id_penilaian);

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

    private function updatePenilaianHeader($penilaian){
        $dani_plus = DB::table('penilaianitem')->where('penilaian_id', $penilaian)->sum('plus');
        $dani_min = DB::table('penilaianadministrasi')->where('penilaian_id', $penilaian)->sum('poin');

        $totaleDhani = $dani_plus - $dani_min;

        DB::table('penilaian')->where('id', $penilaian)->update([
            'poin' => $totaleDhani,
        ]);
    }

    public function didis(Request $req){
        $id = $req->data;

        Penilaian::where('grup_id', $id)->update([
            'status' => 'C'
        ]);

        return response()->json([
            'status' => 200,
            'message' => 'Sukses!'
        ]);
    }

    public function rekapnilai($id)
    {
        $penilaian = Penilaian::with('grup')->where('grup_id', $id)->first();
        
        // $item = PenilaianItem::with('penilaian', 'kategori', 'subkategori')->where('penilaian_id', $penilaian->id)->get();
        // $minus = PenilaianAdministrasi::with('administrasi')->where('penilaian_id', $penilaian->id)->get();
        
        // return view('rekaptim', compact('penilaian', 'item', 'minus'));

        $data = DB::select("SELECT a.juri, a.plus, a.min, c.nama kategoriname, d.nama sub_kategoriname FROM penilaianitem a 
                            JOIN kategori c ON a.kategori_id = c.id
                            JOIN sub_kategori d ON a.sub_kategori_id = d.id
                            WHERE a.penilaian_id = $penilaian->id");

        $minus = DB::select("SELECT a.poin, c.nama FROM penilaianadministrasi a 
                            JOIN administrasi c ON a.administrasi_id = c.id
                            WHERE penilaian_id = $penilaian->id");

        $tim = Grup::where('id', $id)->first();

        // peringkat & umum 
        $totalan = DB::select("SELECT b.nama kategori_nama, SUM(a.plus) total_poin, 'PERINGKAT' tipe
                                FROM penilaianitem a
                                JOIN kategori b ON a.kategori_id = b.id
                                WHERE a.penilaian_id = $penilaian->id AND b.tipe = 'peringkat'
                                GROUP BY b.id
                                UNION ALL
                                SELECT b.nama kategori_nama, SUM(a.plus) total_poin, 'UMUM' tipe
                                FROM penilaianitem a
                                JOIN kategori b ON a.kategori_id = b.id
                                WHERE a.penilaian_id = $penilaian->id AND b.tipe = 'umum'
                                GROUP BY b.id");

        $groupedData = [];
        foreach ($data as $item) {
            $groupedData[$item->kategoriname][$item->sub_kategoriname][] = $item;
        }

        return view('b', [
            'groupedData' => $groupedData,
            'minus' => $minus,
            'tim' => $tim,
            'totalan' => $totalan
        ]);
    }
}
