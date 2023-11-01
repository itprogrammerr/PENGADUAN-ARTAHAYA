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
    public function index()
    {
        try {
            $uuid = Auth::user()->uuid;
            $allPengaduans = Pengaduan::where('user_uuid', $uuid)->count();
            $allTanggapans = Tanggapan::whereHas('pengaduan', function ($query) use ($uuid) {
                $query->where('user_uuid', $uuid);
            })->count();
            $allPendings = Pengaduan::where("user_uuid", $uuid)->where('status','=', 0)->count();
            $allProcess = Pengaduan::where("user_uuid", $uuid)->where('status','=', 1)->count();
            $allSelesai = Pengaduan::where("user_uuid", $uuid)->where('status','=', 2)->count();
            return view('pages.masyarakat.index', compact('allPengaduans', 'allTanggapans', 'allPendings', 'allProcess', 'allSelesai'));
        } catch (\Exception $e) {
            Alert::error('Error', $e->getMessage());
            return back();
        }
    }

    public function create()
    {
        return view('pages.masyarakat.index');
    }

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
            $laporan->user_uuid      = Auth::user()->uuid;
            $laporan->description   = $request->description;
            $laporan->image         = $fileimage;
            $laporan->save();

            Alert::success('Berhasil', 'Pengaduan terkirim');
            return redirect()->back();
        } catch (\Illuminate\Validation\ValidationExceptionception $e) {
            $errors = $e->errors();

            if (array_key_exists('description', $errors)) {
                Alert::error('Error', 'Deskripsi terlalu panjang');
            }

            if (array_key_exists('image', $errors)) {
                Alert::error('Error', 'Image gagal di inputkan ');
            }

            return back()->withErrors($errors);
        } catch (\Exception $e) {
            Alert::error('Error', $e->getMessage());
            return back();
        }
    }


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

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'description' => 'required',
                'image' => ['max:2048', 'mimes:jpg,jpeg,png'],
            ]);
            
            $pengaduanEdit = Pengaduan::findOrFail($id);

            if ($request->hasFile('image')) {
                $oldImage= $pengaduanEdit->image;
                if ($oldImage && File::exists(public_path('file/laporan/image/' . $oldImage))) {
                    File::delete(public_path('file/laporan/image/' . $oldImage));
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
