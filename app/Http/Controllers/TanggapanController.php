<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Pengaduan;
use App\Models\Tanggapan;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;


class TanggapanController extends Controller
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
        // dd($request->all());
        try {
            $request->validate([
                'pengaduan_id'  => 'required',
                'tanggapan'     => 'required',
                'image'         => 'mimes:png,jpg|max:2048'
            ]);

            $tanggapan = new Tanggapan();

            $tanggapan->pengaduan_id    = $request->pengaduan_id;
            $tanggapan->tanggapan       = $request->tanggapan;
            $tanggapan->petugas_id      = Auth::user()->id;

            if ($request->hasFile('image')) {
                $imageEXT = $request->file('image')->getClientOriginalName();
                $filename = pathinfo($imageEXT, PATHINFO_FILENAME);
                $EXT = $request->file('image')->getClientOriginalExtension();
                $fileimage = $filename . '_' . time() . '.' . $EXT;
                $path = $request->file('image')->move(public_path('file/tanggapan'), $fileimage);

                $tanggapan->image = $fileimage;
            }

            DB::table('pengaduans')->where('id', $request->pengaduan_id)->update([
                'status' => $request->status,
            ]);

            $tanggapan->save();

            $userIdFromPengaduans = Pengaduan::findOrfail($request->pengaduan_id);
            $user = User::where('uuid',$userIdFromPengaduans->user_uuid)->first();
            $this->sendEmail($user);

            Alert::success('Berhasil', 'Pengaduan berhasil ditanggapi');
            return redirect()->back();
        } catch (\Exception $e) {
            Alert::error('Error', $e->getMessage());
            return redirect()->back();
        }
    }

    private function sendEmail(User $user)
    {
        Mail::send('emails.notif', ['user' => $user], function ($message) use ($user) {
            $message->from('Pengaduan@bankarthaya.com', 'Arthaya Support');
            $message->to($user->email, 'Admin');
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
        $item = Pengaduan::with([
            'details', 'user'
        ])->findOrFail($id);

        return view('pages.admin.tanggapan.add', [
            'item' => $item
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
                'pengaduan_id' => 'required',
                'tanggapan' => 'required',
                'image' => 'mimes:png,jpg|max:2048'
            ]);
            $tanggapan = Tanggapan::findOrFail($id);
            $tanggapan->pengaduan_id = $request->pengaduan_id;
            $tanggapan->tanggapan = $request->tanggapan;
            $tanggapan->petugas_id = Auth::user()->id;

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

            DB::table('pengaduans')->where('id', $request->pengaduan_id)->update([
                'status' => $request->status,
            ]);

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
