<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $status->update($data);
        return redirect('admin/pengaduans');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
