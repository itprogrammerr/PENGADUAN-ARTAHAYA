<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
use File;

class MasyarakatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $userNik = Auth::user()->nik;
            $allPengaduans = Pengaduan::where('user_nik', $userNik)->count();
            $allTanggapans = Tanggapan::whereHas('pengaduan', function ($query) use ($userNik) {
                $query->where('user_nik', $userNik);
            })->count();
            $allPendings = Pengaduan::where("user_nik", $userNik)->where('status', 'Belum di Proses')->count();
            $allProcess = Pengaduan::where("user_nik", $userNik)->where('status', 'Sedang di Proses')->count();
            $allSelesai = Pengaduan::where("user_nik", $userNik)->where('status', 'Selesai')->count();
            return view('pages.masyarakat.index', compact('allPengaduans', 'allTanggapans', 'allPendings', 'allProcess', 'allSelesai'));
        } catch (\Exception $e) {
            Alert::error('Error', $e->getMessage());
            return back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.masyarakat.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'description' => 'required',
                'image' => ['required', 'max:2048', 'mimes:jpg,jpeg,png'],
            ]);

            $imageEXT   = $request->file('image')->getClientOriginalName();
            $filename   = pathinfo($imageEXT, PATHINFO_FILENAME);
            $EXT        = $request->file('image')->getClientOriginalExtension();
            $fileimage  = $filename . '_' . time() . '.' . $EXT;
            $path       = $request->file('image')->move(public_path('file/laporan/image'), $fileimage);

            $laporan                = new Pengaduan;
            $laporan->user_nik      = Auth::user()->nik;
            $laporan->name          = Auth::user()->name;
            $laporan->user_id       = Auth::user()->id;
            $laporan->description   = $request->description;
            $laporan->image         = $fileimage;
            $laporan->save();

            Alert::success('Berhasil', 'Pengaduan terkirim');
            return redirect()->back();
        } catch (\Exception $e) {
            Alert::error("Gagal", $e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function lihat()
    {
        $user = Auth::user()->pengaduan()->get();
        $items = Pengaduan::get();
        return view('pages.masyarakat.detail', [
            'items' => $user
        ]);
    }

    public function show($id)
    {
        $item = Pengaduan::with([
            'details', 'user'
        ])->findOrFail($id);

        $tangap = Tanggapan::where('pengaduan_id', $id)->get();

        return view('pages.masyarakat.show', [
            'item' => $item,
            'tangap' => $tangap
        ]);
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
        try {
            $request->validate([
                'description' => 'required',
                'image' => ['max:2048', 'mimes:jpg,jpeg,png'],
            ]);

            $pengaduanEdit = Pengaduan::findOrFail($id);

            if ($request->hasFile($request->image)) {
                if ($pengaduanEdit->image && File::exists(public_path('file/laporan/image/' . $pengaduanEdit->image))) {
                    File::delete(public_path('file/laporan/image/' . $pengaduanEdit->image));
                }
                $imageEXT = $request->file('image')->getClientOriginalName();
                $filename = pathinfo($imageEXT, PATHINFO_FILENAME);
                $EXT = $request->file('image')->getClientOriginalExtension();
                $fileimage = $filename . '_' . time() . '.' . $EXT;
                $path = $request->file('image')->move(public_path('file/laporan/image'), $fileimage);
                $pengaduanEdit->image = $fileimage;
            }

            $pengaduanEdit->description = $request->description;
            $pengaduanEdit->save();

            Alert::success('Berhasil', 'Pengaduan terupdate');
            return redirect()->back();
        } catch (\Exception $e) {
            Alert::error('Error',$e->getMessage());
            return redirect()->back();
        }
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
            $delete = Pengaduan::findOrFail($id);
            if ($delete->image && File::exists(public_path('file/laporan/image/' . $delete->image))) {
                File::delete(public_path('file/laporan/image/' . $delete->image));
            }
            $delete->forceDelete();
            Alert::success('Sukses', 'Berhasil menghapus data');
            return redirect()->back();
        } catch (\Exception $e) {
            Alert::error('Error', $e->getMessage());
            return redirect()->back();
        }
    }
}
