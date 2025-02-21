<?php

namespace App\Http\Controllers;

use App\Models\Grup;
use App\Models\Penilaian;
use App\Models\Peserta;
use App\Models\SubKategori;
use Illuminate\Http\Request;

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
        $progressPenilaian = Penilaian::where('grup_id', 1)->count();

        if ($jumlahNilai || $progressPenilaian == 0) {
            $progress = 0;
            $areavalue = 100;
        } else {
            $progress = ($progressPenilaian / $jumlahNilai) * 100;
            $areavalue = $progress;
        }

        $bgprogress = 'bg-danger';

        if($progress >= 25) {
            $bgprogress = 'bg-warning';
        }

        if($progress >= 50) {
            $bgprogress = 'bg-info';
        }

        if($progress >= 75) {
            $bgprogress = 'bg-primary';
        }

        if($progress >= 100) {
            $bgprogress = 'bg-success';
        }

        return datatables()->of($query)
            ->addColumn('action', function ($item) {
                return '
                    <a href="' . route('penilaian.grup', $item->id) . '" class="btn btn-sm btn-primary">Nilai</a>
                ';
            })
            ->addColumn('progress', function ($item) use ($progress, $bgprogress, $areavalue) {
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
}
