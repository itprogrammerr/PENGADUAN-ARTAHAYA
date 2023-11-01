<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AdminProfileController extends Controller
{
    public function index()
    {
        $data = User::where('id', Auth::user()->id)->first();
        return view('pages.admin.profile', compact('data'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nik' => 'required|numeric|unique:users',
                'name' => 'required',
                'email' => 'required|unique:users',
                'password' => 'required',
                'phone' => 'required',
                'roles' => 'required'
            ]);

            $user = new User();
            $user->uuid = uniqid();
            $user->nik = $request->nik;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->roles = $request->roles;
            $user->password = Hash::make($request->password);
            $user->save();

            Alert::success('Berhasil', 'Berhasil menambahkan data');
            return back();
        } catch (\Illuminate\Validation\ValidationException $e) {
            $errors = $e->errors();

            if (array_key_exists('nik', $errors)) {
                Alert::error('Error', 'NIK telah digunakan sebelumnya.');
            }

            if (array_key_exists('email', $errors)) {
                Alert::error('Error', 'Email telah digunakan sebelumnya.');
            }

            return back()->withErrors($errors);
        } catch (\Exception $e) {
            Alert::error('Error', $e->getMessage());
            return back();
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $profile = User::findOrFail($id);
            $profile->nik = $request->nik;
            $profile->name = $request->name;
            $profile->email = $request->email;
            $profile->phone = $request->phone;
            $profile->password = Hash::make($request->password);

            $profile->save();

            Alert::success('Berhasil', 'Berhasil merubah data');
            return back();
        } catch (\Exception $e) {
            Alert::error('error', $e->getMessage());
            return back();
        }
    }

    public function destroy($id)
    {
        try {
            $profile = User::findOrFail($id);
            $profile->delete();

            Alert::success('Berhasil', 'Berhasil menghapus data');
            return back();
        } catch (\Exception $e) {
            Alert::error('error', $e->getMessage());
            return back();
        }
    }
}
