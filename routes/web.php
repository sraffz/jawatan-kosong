<?php

use App\Iklan;
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

    $iklan = Iklan::where('jenis', "TERBUKA")->get();

    $tarikh_kini = \Carbon\Carbon::now()->format('Y-m-d');

    $bil = Iklan::where('tarikh_mula','<=',$tarikh_kini)
    ->where('tarikh_tamat', '>=', $tarikh_kini)
    ->where('jenis', "TERBUKA")
    ->count();

    // dd($bil);
    $syarat = DB::table('senarai-syarat-jawatan')->get();
    
    return view('welcome', compact('iklan', 'syarat', 'bil'));
});

Route::get('/suk{url}', function ($url) {

    $iklan = Iklan::where('jenis', "TERTUTUP")
    ->where('url', $url)
    ->get();

    $tarikh_kini = \Carbon\Carbon::now()->format('Y-m-d');
    
    $bil = Iklan::where('tarikh_mula','<=',$tarikh_kini)
    ->where('tarikh_tamat', '>=', $tarikh_kini)
    ->where('url', $url)
    ->where('jenis', "TERTUTUP")
    ->count();

    // dd($bil);
    $syarat = DB::table('senarai-syarat-jawatan')->get();
    
    return view('welcome', compact('iklan', 'syarat','bil'));
});

Auth::routes();


route::prefix('admin')->group(function () {
    Route::get('/login', 'Auth\admin\LoginController@showLoginForm')->name('auth.admin.login');
    Route::post('/login', 'Auth\admin\LoginController@sendLoginResponse')->name('admin.login');
    Route::post('/logout', 'Auth\admin\LoginController@logoutAdmin')->name('admin.logout');
});

Route::prefix('admin')->middleware(['auth:admin'])->group(function () {
    
    Route::get('/', 'AdminController@index')->name('admin');
    Route::get('/iklan', 'AdminController@iklan')->name('admin.iklan');
    Route::get('/profil', 'AdminController@profil')->name('admin.profil');
    Route::get('/tetapan', 'AdminController@tetapan')->name('admin.tetapan');
    Route::get('/konfigurasi', 'AdminController@konfigurasi')->name('admin.konfigurasi');
    Route::get('/kemaskini-iklan/{id}', 'AdminController@kemaskiniiklan')->name('admin.kemaskini-iklan');

    Route::get('/cetak-iklan/{id}', 'AdminController@cetakiklan')->name('cetak-iklan');

    Route::post('/kemaskini-jawatan', 'AdminController@kemaskinijawatan')->name('kemaskini-jawatan');
    Route::get('/padam-jawatan', 'AdminController@padamjawatan')->name('padam-jawatan');

    Route::post('/tambah-jawatan', 'AdminController@tambahjawatan')->name('tambah-jawatan');
    
    Route::post('/buka-iklan', 'AdminController@bukaiklan')->name('buka-iklan');
    Route::post('/kemaskini-iklan/{id}', 'AdminController@kemaskiniiklann')->name('kemaskini-iklan');
    Route::post('/tambah-kumpulan-jawatan', 'AdminController@tambahkumpulanjawatan')->name('tambah-kumpulan-jawatan');
    Route::post('/kemaskini-kumpulan-jawatan', 'AdminController@kemaskinikumpulanjawatan')->name('kemaskini-kumpulan-jawatan');
    Route::post('/padam-kumpulan-jawatan', 'AdminController@padamkumpulanjawatan')->name('padam-kumpulan-jawatan');

    Route::post('/tambah-taraf-jawatan', 'AdminController@tambahtarafjawatan')->name('tambah-taraf-jawatan');
    Route::post('/kemaskini-taraf-jawatan', 'AdminController@kemaskinitarafjawatan')->name('kemaskini-taraf-jawatan');
    Route::post('/padam-taraf-jawatan', 'AdminController@padamtarafjawatan')->name('padam-taraf-jawatan');

});

Route::get('dl-syarat/{id}', 'AdminController@dlsyarat')->name('dl-syarat');

Route::middleware(['auth:web'])->group(function () {
    route::post('/user/logout', 'Auth\LoginController@logoutUser')->name('user.logout');
    
    Route::get('/Halaman-utama', 'HomeController@index')->name('Halaman-utama');
    Route::get('/profil', 'HomeController@profil')->name('profil');
    Route::get('/tetapan', 'HomeController@tetapan')->name('tetapan');
    
    Route::get('/iklan-jawatan', 'PenggunaController@iklan')->name('iklan');
    Route::get('/maklumat-diri', 'PenggunaController@maklumatdiri')->name('maklumat-diri');
    Route::get('/pengalaman', 'PenggunaController@pengalaman')->name('pengalaman');
    Route::get('/pengesahan', 'PenggunaController@pengesahan')->name('pengesahan');

    
});

