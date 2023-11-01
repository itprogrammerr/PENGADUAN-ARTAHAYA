<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    public function index()
    {
        $data = User::where('uuid', Auth::user()->uuid)->first();
        return view('pages.masyarakat.profile', compact('data'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
        try {
            $profile            = User::where('uuid', $id)->first();
            $profile->nik       = $request->nik;
            $profile->name      = $request->name;
            $profile->email     = $request->email;
            $profile->phone     = $request->phone;
            $profile->password  = Hash::make($request->password);
            $profile->save();

            Alert::success('Berhasil', 'Berhasil merubah data');
            return redirect()->route('profile.index');
        } catch (\Exception $e) {
            Alert::error('error', $e->getMessage());
            return back();
        }
    }

    public function destroy($id)
    {
    }
}
