<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Pengaduan;
use App\Models\Tanggapan;
use App\Models\User;
use PDF;


class AdminController extends Controller
{
    public function index($id)
    {
        try {
            $item = Pengaduan::with([
                'details', 'user'
            ])->findOrFail($id);

            return view('pages.admin.tanggapan.add', [
                'item' => $item
            ]);
        } catch (\Exception $e) {
            Alert::error('Error', $e->getMessage());
            return back();
        }
    }

    public function masyarakat(Request $request)
    {
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
        $query->where('roles', '=', 1);
        $data = $query->paginate(10);
        return view('pages.admin.masyarakat', compact('data'));
    }

    public function laporan(Request $request)
    {
        $query = Pengaduan::query();
        if ($request->has('search')) {
            $searchTerm = '%' . $request->search . '%';
            $query->where(function ($q) use ($searchTerm) {
                $q->orWhere('user_uuid', 'like', $searchTerm)
                ->orWhere('description', 'like', $searchTerm)
                ->orWhere('image', 'like', $searchTerm)
                ->orWhere('status', 'like', $searchTerm);
            });
        }
        $data = $query->paginate(10);

        return view('pages.admin.laporan', [
            'pengaduan' => $data,
        ]);
    }

    public function cetak()
    {
        $pengaduan = Pengaduan::all();

        $pdf = PDF::loadview('pages.admin.pengaduan', [
            'pengaduan' => $pengaduan
        ]);
        return $pdf->download('laporan.pdf');
    }

    public function pdf($id)
    {
        $pengaduan = Pengaduan::find($id);

        $pdf = PDF::loadview('pages.admin.pengaduan.cetak', compact('pengaduan'))->setPaper('a4');
        return $pdf->download('laporan-pengaduan.pdf');
    }
}
