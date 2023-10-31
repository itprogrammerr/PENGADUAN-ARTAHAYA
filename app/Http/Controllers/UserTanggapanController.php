<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class UserTanggapanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        try {
            $request->validate([
                "pengaduan_id"  => "required",
                "tanggapan"     => "required",
                "image"         => "mimes:png,jpg|max:2048",
            ]);
            $userTanggapan = new Tanggapan();
            $userTanggapan->pengaduan_id = $request->pengaduan_id;
            $userTanggapan->tanggapan = $request->tanggapan;
            $userTanggapan->petugas_id = 0;

            if ($request->hasFile('image')) {
                $imageEXT = $request->file('image')->getClientOriginalName();
                $filename = pathinfo($imageEXT, PATHINFO_FILENAME);
                $EXT = $request->file('image')->getClientOriginalExtension();
                $fileimage = $filename . '_' . time() . '.' . $EXT;
                $path = $request->file('image')->move(public_path('file/tanggapan'), $fileimage);

                $tanggapan->image = $fileimage;
            }

            $userTanggapan->save();
            $pengaduan_data = Pengaduan::where('id', $request->pengaduan_id)->first();
            $this->sendEmail($pengaduan_data);

            Alert::success('Berhasil', 'Pengaduan berhasil ditanggapi');
            return redirect()->back();
        } catch (\Illuminate\Validation\ValidationException $e) {
            $errors = $e->errors();

            if (array_key_exists('pengduan_id', $errors)) {
                Alert::error('Error', 'Pengaduan ID tidak ditemukan.');
            }

            if (array_key_exists('tanggapan', $errors)) {
                Alert::error('Error', 'Tanggapan terlalu panjang');
            }

            if (array_key_exists('image', $errors)) {
                Alert::error('Error', 'Gagal dalam melakukan upload gambar');
            }

            return back()->withErrors($errors);
        } catch (\Exception $e) {
            Alert::error('Error', $e->getMessage());
            return back();
        }
    }

    private function sendEmail(Pengaduan $pengaduan_data)
    {
        Mail::send('emails.notifToAdmin', ['pengaduan' => $pengaduan_data], function ($message) use ($pengaduan_data) {
            $message->from('userpengaduan@bankarthaya.com', 'Arthaya Support');
            $message->to('pengaduan@bankarthaya.com', 'Admin');
            $message->subject('Notifikasi Update Pengaduan');
        });
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
                'pengaduan_id' => 'required',
                'tanggapan' => 'required',
                'image' => 'mimes:png,jpg|max:2048'
            ]);
            $tanggapan = Tanggapan::findOrFail($id);
            $tanggapan->pengaduan_id = $request->pengaduan_id;
            $tanggapan->tanggapan = $request->tanggapan;

            if ($request->hasFile('image')) {
                $oldImage = $tanggapan->image;
                if ($oldImage && File::exists(public_path('file/tanggapan/' . $oldImage))) {
                    File::delete(public_path('file/tanggapan/' . $oldImage));
                }

                $imageEXT = $request->file('image')->getClientOriginalName();
                $filename = pathinfo($imageEXT, PATHINFO_FILENAME);
                $EXT = $request->file('image')->getClientOriginalExtension();
                $fileimage = $filename . '_' . time() . '.' . $EXT;
                $path = $request->file('image')->move(public_path('file/tanggapan'), $fileimage);
                $tanggapan->image = $fileimage;
            }

            $tanggapan->save();

            Alert::success('Berhasil', 'Pengaduan berhasil diupdate');
            return redirect()->back();
        } catch (\Exception $e) {
            Alert::error('Error', 'Data not Found');
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
            $tanggapan = Tanggapan::findOrFail($id);

            if (!empty($tanggapan->image)) {
                if ($tanggapan->image && File::exists(public_path('file/tanggapan/' . $tanggapan->image))) {
                    File::delete(public_path('file/tanggapan/' . $tanggapan->image));
                }
            }
            $tanggapan->delete();

            Alert::success('Berhasil', 'Pengaduan di hapus');
            return redirect()->back();
        } catch (\Exception $e) {
            Alert::error('Error', $e->getMessage());
            return redirect()->back();
        }
    }
}
