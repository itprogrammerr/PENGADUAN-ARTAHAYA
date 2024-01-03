<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('guest', "GuestController");

Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->group(function () {
        Route::get('/', 'DashboardController@index')->name('dashboard');

        Route::resource('pengaduans', 'PengaduanController');
        Route::resource('tanggapan', 'TanggapanController');
        Route::resource('adminprofile', 'AdminProfileController');

        Route::get('masyarakat', 'AdminController@masyarakat')->name('masyarakat');
        Route::resource('petugas', 'PetugasController');

        Route::get('laporan', 'AdminController@laporan');
        Route::get('laporan/cetak', 'AdminController@cetak');
        Route::get('pengaduan/cetak/{id}', 'AdminController@pdf');
    });


Route::prefix('user')
    ->middleware(['auth', 'MasyarakatMiddleware'])
    ->group(function () {
        Route::get('/', 'MasyarakatController@index')->name('masyarakat-dashboard');
        Route::resource('pengaduan', 'MasyarakatController');
        Route::resource('usertanggapan','UserTanggapanController');
        Route::resource('profile', 'ProfileController');
        Route::get('pengaduan', 'MasyarakatController@lihat')->name('show-pengaduan');
    });

require __DIR__ . '/auth.php';
