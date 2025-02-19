<?php

namespace App\Http\Controllers;

use App\Models\ListPoin;
use App\Models\SubKategori;
use Illuminate\Http\Request;

class ListPoinController extends Controller
{
    public function index($subkategoriid)
    {
        $data['subkategori'] = SubKategori::find($subkategoriid);
        $data['listpoin'] = ListPoin::where('sub_kategori_id', $subkategoriid)->get();
        return view('list_poin.index')->with($data);
    }

    public function store(Request $request)
    {
        try{
            $request->validate([
                'sub_kategori_id' => 'required',
                'level' => 'required',
                'max_poin' => 'required',
                'min_poin' => 'required',
                'is_minus' => '',
            ]);

            $is_minus = 0;

            if(isset($request->is_minus)){
                $is_minus = 1;
            }

            ListPoin::create([
                'sub_kategori_id' => $request->sub_kategori_id,
                'level' => $request->level,
                'max_poin' => $request->max_poin,
                'min_poin' => $request->min_poin,
                'is_minus' => $is_minus
            ]);

            toast('Tambah Sukses!', 'success');
            return redirect()->route('listpoin.index', $request->sub_kategori_id);
        } catch (\Exception $e) {
            toast($e->getMessage(), 'error');
            return redirect()->route('listpoin.index', $request->sub_kategori_id);
        }

    }

    public function update(Request $request, $id)
    {
        try{
            $request->validate([
                'sub_kategori_id' => 'required',
                'level' => 'required',
                'max_poin' => 'required',
                'min_poin' => 'required',
                'is_minus' => '',
            ]);

            $is_minus = 0;

            if(isset($request->is_minus)){
                $is_minus = 1;
            }

            ListPoin::find($id)->update([
                'sub_kategori_id' => $request->sub_kategori_id,
                'level' => $request->level,
                'max_poin' => $request->max_poin,
                'min_poin' => $request->min_poin,
                'is_minus' => $is_minus
            ]);

            toast('Update Sukses!', 'success');
            return redirect()->route('listpoin.index', $request->sub_kategori_id);
        } catch (\Exception $e) {
            toast($e->getMessage(), 'error');
            return redirect()->route('listpoin.index', $request->sub_kategori_id);
        }
    }
}
