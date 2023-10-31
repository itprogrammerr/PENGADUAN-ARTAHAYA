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

            $characters = '0123456789';
            $length = 16;

            $newUser = new User;

            function generateRandomString($characters, $length) {
                $randomString = '';
                $charactersLength = strlen($characters);
                for ($i = 0; $i < $length; $i++) {
                    $randomString .= $characters[rand(0, $charactersLength - 1)];
                }
                return $randomString;
            }
            $newUser->nik = generateRandomString($characters, $length);
            while (User::where('nik', $newUser->nik)->exists()) {
                $newUser->nik = generateRandomString($characters, $length);
            }
            $newUser->uuid = uniqid();
            $newUser->name = "Guest" . uniqid("",true);
            $newUser->email = $request->email;
            $newUser->phone = uniqid("",true);
            $newUser->password = Hash::make('12345678');
            $newUser->roles = 1;
            $newUser->save();

            $imageEXT = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($imageEXT, PATHINFO_FILENAME);
            $EXT = $request->file('image')->getClientOriginalExtension();
            $fileimage = $filename . '_' . time() . '.' . $EXT;
            $path = $request->file('image')->move(public_path('file/laporan/image'), $fileimage);

            $laporan = new Pengaduan;
            $laporan->user_uuid = $newUser->uuid;
            $laporan->description = $request->description;
            $laporan->image = $fileimage;
            $laporan->status = 0;
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
                Alert::error('Error', 'Email telah digunakan sebelumnya. ' . $errors);
            }
            if (array_key_exists('image', $errors)) {
                Alert::error('Error', 'Ukuran gambar terlalu besar atau tipe file salah');
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
