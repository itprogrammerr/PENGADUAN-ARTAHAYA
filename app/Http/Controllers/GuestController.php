<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class GuestController extends Controller
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
                'description' => 'required',
                'email' => 'required|unique:users',
                'image' => ['required', 'max:2048', 'mimes:jpg,jpeg,png'],
            ]);

            $newUser = new User;
            $newUser->nik = intval(substr(uniqid("", true), 0, 16));
            $newUser->name = "Guest" . substr(uniqid(), 0, 12);
            $newUser->email = $request->email;
            $newUser->phone = intval(substr(uniqid(), 0, 12));
            $newUser->password = Hash::make('12345678');
            $newUser->roles = "USER";
            $newUser->save();

            $imageEXT = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($imageEXT, PATHINFO_FILENAME);
            $EXT = $request->file('image')->getClientOriginalExtension();
            $fileimage = $filename . '_' . time() . '.' . $EXT;
            $path = $request->file('image')->move(public_path('file/laporan/image'), $fileimage);

            $laporan = new Pengaduan;
            $laporan->user_nik = $newUser->nik;
            $laporan->name = $newUser->name;
            $laporan->user_id = $newUser->id;
            $laporan->description = $request->description;
            $laporan->image = $fileimage;
            $laporan->save();

            $this->sendEmail($newUser);

            Alert::success('Berhasil', 'Pengaduan terkirim');
            return redirect()->back();
        } catch (\Illuminate\Validation\ValidationException $e) {
            $errors = $e->errors();

            if (array_key_exists('NIK', $errors)) {
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

    private function sendEmail(User $user)
    {
        Mail::send('emails.notifguest', ['user' => $user], function ($message) use ($user) {
            $message->from('Pengaduan@bankarthaya.com', 'Arthaya Support');
            $message->to($user->email, 'Admin');
            $message->subject('Notifikasi Pengaduan');
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
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     //
    // }
}
