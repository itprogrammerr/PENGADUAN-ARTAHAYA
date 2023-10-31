<?php

use App\Http\Controllers\GuestController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('guest', "GuestController");

// Route::get('/sitemap.xml', function () {
//     // return view('sitemap');
//     return response()->view('sitemap')->header('Content-Type', 'text/xml');
// });

// Admin/Petugas
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


// Masyarakat
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
