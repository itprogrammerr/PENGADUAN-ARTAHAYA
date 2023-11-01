<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class PengaduanController extends Controller
{
    public function index(Request $request)
    {
        $query = Pengaduan::query();
        $query->join('users','pengaduans.user_uuid','=','users.uuid');

        if ($request->has('search')) {
            $searchTerm = '%' . $request->search . '%';
            $query->where(function ($q) use ($searchTerm) {
                $q->orWhere('pengaduans.description', 'like', $searchTerm)
                    ->orWhere('pengaduans.name', 'like', $searchTerm)
                    ->orWhere('pengaduans.status', 'like', $searchTerm)
                    ->orWhere('pengaduans.created_at', 'like', $searchTerm)
                    ->orWhere('users.name', 'like', $searchTerm);
            });
        }
        $query->select('pengaduans.*','users.name as username');

        $items = $query->orderBy('id','desc')->paginate(10);
        return view('pages.admin.pengaduan.index', compact('items'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show($id)
    {
        try {
            $item = DB::table('pengaduans')
                ->join('users','pengaduans.user_uuid','=','users.uuid')
                ->select('pengaduans.*','users.name as username','users.nik as usernik', 'users.phone as userphone')
                ->where('pengaduans.id', $id)
                ->first();
            
            $tangap = DB::table('tanggapans')
                ->join('pengaduans', 'tanggapans.pengaduan_id', '=', 'pengaduans.id')
                ->select('tanggapans.*', 'pengaduans.status')
                ->where('tanggapans.pengaduan_id', $id)
                ->get();
            return view('pages.admin.pengaduan.detail', [
                'item' => $item,
                'tangap' => $tangap
            ]);
        } catch (\Exception $e) {
            Alert::error('Error', 'id not found');
            return redirect()->back();
        }
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
        $status->update($data);
        return redirect('admin/pengaduans');
    }

    public function destroy($id)
    {
        try {
            $pengaduan = Pengaduan::find($id);
            $pengaduan->delete();

            Alert::success('Berhasil', 'Pengaduan telah di hapus');
            return redirect('admin/pengaduans');
        } catch (\Throwable $e) {
            Alert::error('Error',$e->getMessage());
            return redirect()->back();
        }
    }
}
