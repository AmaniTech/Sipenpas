<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Juri;

class JuriController extends Controller
{
    public function index(){
        $juri = Juri::all();    

        return view('juri.index', [
            'juri' => $juri
        ]);
    }

    public function add(Request $req){
        Juri::create([
            'nama' => $req->juri
        ]);

        toast('Tambah Sukses!','success');
        return redirect('/juri');
    }


    public function update(Request $req, $id){
        $juri = Juri::where('id',$id)->update([
            'nama' => $req->juri
        ]);

        toast('Update Sukses!','success');
        return redirect('/juri');
    }

    public function delete($id){
        $juri = Juri::destroy($id);

        toast('Hapus Sukses!','success');
        return redirect('/juri');
    }
}
