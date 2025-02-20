<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $data = Setting::first();
        return view('setting', compact('data'));
    }

    public function update(Request $request, $id)
    {
        try{
            $data = Setting::find($id);

            if($request->hasFile('logo')){
                $file = $request->file('logo');
                $filename = 'logo.' . $file->getClientOriginalExtension();
                $file->storeAs('logo', $filename, 'public');
            }

            $data->update(
                [
                    'nama' => $request->nama,
                    'alamat' => $request->alamat,
                    'email' => $request->email,
                    'no_hp' => $request->no_hp,
                    'logo' => $filename ?? $data->logo,
                ]
            );
            toast('Update Sukses!', 'success');
            return redirect()->route('setting');
        } catch (\Exception $e) {
            toast($e->getMessage(), 'error');
            return redirect()->route('setting');
        }

    }
}
