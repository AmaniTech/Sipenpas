<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(Request $req){
        return view('login');
    }

    public function login_proses(Request $request){
        $credentials = $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);

        // if (Auth::attempt($credentials, $request->has('remember'))) {
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            toast('Welcome, Komandan!','success');
            return redirect('/home');
        }

        Alert::error('Error', 'Data yang anda masukkan salah!');
        return redirect('/login');
    }

    public function logout(){
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/login');
    }
}
