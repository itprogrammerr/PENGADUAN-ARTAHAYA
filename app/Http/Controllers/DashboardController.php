<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use App\Models\User;

class DashboardController extends Controller
{
    public function index() {
        return view('pages.admin.dashboard',[
            'pengaduan' => Pengaduan::count(),
            'user' => User::where('roles','=', 1)->count(),
            'petugas' => User::where('roles', '=', 3)->count(),
            'admin' => User::where('roles', '=', 1)->count(),
            'tanggapan' => Tanggapan::count(),
            'pending' => Pengaduan::where('status','=', '0')->count(),
            'process' => Pengaduan::where('status','=', '1')->count(),
            'success' => Pengaduan::where('status','=', '2')->count(),
        ]);
    }
}