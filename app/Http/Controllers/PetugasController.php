<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use RealRashid\SweetAlert\Facades\Alert;


class PetugasController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::user()->roles !== 0) {
            Alert::warning('Peringatan', 'Maaf Anda tidak punya akses');
            return back();
        }

        $query = User::query();

        if ($request->has('search')) {
            $searchTerm = '%' . $request->search . '%';
            $query->where(function ($q) use ($searchTerm) {
                $q->orWhere('nik', 'like', $searchTerm)
                    ->orWhere('name', 'like', $searchTerm)
                    ->orWhere('email', 'like', $searchTerm)
                    ->orWhere('phone', 'like', $searchTerm);
            });
        }

        $query->where(function ($q) {
            $q->where('roles','=', 0)
                ->orWhere('roles','=', 2);
        });

        $data = $query->paginate(10);
        return view('pages.admin.petugas.index', compact('data'));
    }

    public function create()
    {
        return view('pages.admin.petugas.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nik' => 'required|string|max:16|unique:users',
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'phone' => 'required|string|max:15',
                'password' => 'required|string|confirmed|min:8',

            ]);

            $user = $request->all();

            $user = User::create([
                'uuid'      => uniqid(),
                'nik'       => $request->nik,
                'name'      => $request->name,
                'email'     => $request->email,
                'phone'     => $request->phone,
                'roles'     => $request->roles,
                'password'  => Hash::make($request->password),

            ]);

            Alert::success('Berhasil', 'Petugas baru ditambahkan');
            return redirect('admin/petugas');
        } catch (\Throwable $e) {
            Alert::error('Error', $e->getMessage());
            return redirect()->back();
        }
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
