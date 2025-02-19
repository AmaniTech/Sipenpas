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
}
