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

    $currentURL = URL::current();

    $shareComponent = \Share::page(
        $currentURL,
        'IKLAN JAWATAN KOSONG 
        1. PEMBANTU HAL EHWAL ISLAM (MUALLIM) (CFS), GRED S19 Permohonan hendaklah dihantar sebelum atau pada 20 Julai 2022 (Rabu) melalui'
    )->facebook()
    ->twitter()
    ->whatsapp();
    
    $iklan2 = Iklan::where('jenis', "TERBUKA")->first();
    $iklan = Iklan::where('jenis', "TERBUKA")->get();

    $tarikh_kini = \Carbon\Carbon::now()->format('Y-m-d');

    $bil = Iklan::where('tarikh_mula','<=',$tarikh_kini)
    ->where('tarikh_tamat', '>=', $tarikh_kini)
    ->where('jenis', "TERBUKA")
    ->where('publish', 1)
    ->count();

    // dd($bil);
    $syarat = DB::table('senarai-syarat-jawatan')->get();
    
    // dd($tarikh_kini, \Carbon\Carbon::parse($iklan->tarikh_mula)->format('Y-m-d'));
    return view('welcome', compact('iklan', 'syarat', 'bil', 'shareComponent'));
});

Route::get('/suk{url}', function ($url) {

    $currentURL = URL::current();

    $shareComponent = \Share::page(
        $currentURL,
        'IKLAN JAWATAN KOSONG 
        1. PEMBANTU HAL EHWAL ISLAM (MUALLIM) (CFS), GRED S19 Permohonan hendaklah dihantar sebelum atau pada 20 Julai 2022 (Rabu) melalui'
    )->facebook()
    ->twitter()
    ->whatsapp();

    $iklan = Iklan::where('jenis', "TERTUTUP")
    ->where('url', $url)
    ->get();

    $tarikh_kini = \Carbon\Carbon::now()->format('Y-m-d');
    
    $bil = Iklan::where('tarikh_mula','<=',$tarikh_kini)
    ->where('tarikh_tamat', '>=', $tarikh_kini)
    ->where('url', $url)
    ->where('jenis', "TERTUTUP")
    ->where('publish', 1)
    ->count();

    // dd($bil);
    $syarat = DB::table('senarai-syarat-jawatan')->get();
    
    return view('welcome', compact('iklan', 'syarat','bil', 'shareComponent'));
});

Auth::routes();

Route::get('/social-media-share', 'SocialShareButtonsController@ShareWidget');

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
    Route::post('/tukar-katalaluan', 'AdminController@tukarKataLaluan')->name('tukar-katalaluan-admin');
    Route::POST('tukar-password', 'AdminController@tukarkatalaluanSama')->name('kemaskinikatalaluan');
    Route::post('/kemaskini', 'AdminController@kemaskiniAdmin')->name('kemaskini-admin');
    Route::get('/konfigurasi', 'AdminController@konfigurasi')->name('admin.konfigurasi');
    Route::get('/pentadbir', 'AdminController@pentadbir')->name('admin.pentadbir');
    Route::get('/kemaskini-iklan/{id}', 'AdminController@kemaskiniiklan')->name('admin.kemaskini-iklan');

    Route::get('/cetak-iklan/{id}', 'AdminController@cetakiklan')->name('cetak-iklan');

    Route::post('/kemaskini-jawatan', 'AdminController@kemaskinijawatan')->name('kemaskini-jawatan');
    Route::get('/padam-jawatan', 'AdminController@padamjawatan')->name('padam-jawatan');

    Route::post('/tambah-jawatan', 'AdminController@tambahjawatan')->name('tambah-jawatan');
    
    Route::post('/buka-iklan', 'AdminController@bukaiklan')->name('buka-iklan');
    Route::get('/padam-iklan', 'AdminController@padamiklan')->name('padam-iklan');
    Route::post('/kemaskini-iklan/{id}', 'AdminController@kemaskiniiklann')->name('kemaskini-iklan');
    Route::post('/tambah-kumpulan-jawatan', 'AdminController@tambahkumpulanjawatan')->name('tambah-kumpulan-jawatan');
    Route::post('/kemaskini-kumpulan-jawatan', 'AdminController@kemaskinikumpulanjawatan')->name('kemaskini-kumpulan-jawatan');
    Route::post('/padam-kumpulan-jawatan', 'AdminController@padamkumpulanjawatan')->name('padam-kumpulan-jawatan');

    Route::post('/tambah-pentadbir', 'AdminController@tambahpentadbir')->name('tambah-pentadbir');
    Route::post('/tambah-taraf-jawatan', 'AdminController@tambahtarafjawatan')->name('tambah-taraf-jawatan');
    Route::post('/kemaskini-taraf-jawatan', 'AdminController@kemaskinitarafjawatan')->name('kemaskini-taraf-jawatan');
    Route::post('/padam-taraf-jawatan', 'AdminController@padamtarafjawatan')->name('padam-taraf-jawatan');
    Route::post('/kemaskini-pentadbir', 'AdminController@kemaskinipentadbir')->name('kemaskini-pentadbir');
    Route::post('/padam-pentadbir', 'AdminController@padampentadbir')->name('padam-pentadbir');

});

Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
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

    Route::get('/akademik/pt3-pmr-srp', 'PenggunaController@pt3')->name('PT3 /PMR / SRP');
    Route::get('/akademik/spm-spmv', 'PenggunaController@spm')->name('akademik.spm');
    Route::get('/akademik/spm-ulangan', 'PenggunaController@spmu')->name('akademik.spmu');
    Route::get('/akademik/svm', 'PenggunaController@svm')->name('akademik.svm');
    Route::get('/akademik/skm', 'PenggunaController@skm')->name('akademik.skm');
    Route::get('/akademik/stpm', 'PenggunaController@stpm')->name('akademik.stpm');
    Route::get('/akademik/stam', 'PenggunaController@stam')->name('akademik.stam');
    Route::get('/akademik/matrikulasi', 'PenggunaController@matrikulasi')->name('akademik.matrikulasi');
    Route::get('/akademik/pengajian-tinggi', 'PenggunaController@ipt')->name('akademik.ipt');
    
    Route::post('cropGambar', 'PenggunaController@crop')->name('cropGambar');
    Route::post('tambah-maklumat-diri/{id}', 'PenggunaController@tambahmaklumatdiri')->name('tambah-maklumat-diri');
    Route::post('kemaskini-maklumat-diri/{id}', 'PenggunaController@kemaskinimaklumatdiri')->name('kemaskini-maklumat-diri');
    Route::post('tambah-pengalaman', 'PenggunaController@tambahPengalaman')->name('tambah-pengalaman');
    Route::post('kemaskini-pengalaman/{id}', 'PenggunaController@kemaskiniPengalaman')->name('kemaskini-pengalaman');
    Route::get('padam-pengalaman/{id}', 'PenggunaController@padamPengalaman')->name('padam-pengalaman');
    
    // Akademik
    Route::post('simpan-svm', 'PenggunaController@simpansvm')->name('simpan-svm');
    Route::post('kemaskini-svm', 'PenggunaController@kemaskinisvm')->name('kemaskini-svm');
    Route::post('simpan-skm', 'PenggunaController@simpanskm')->name('simpan-skm');
    Route::get('padam-skm', 'PenggunaController@padamskm')->name('padam-skm');
    Route::post('simpan-pmr', 'PenggunaController@simpanpmr')->name('simpan-pmr');
    Route::post('simpan-ipt', 'PenggunaController@simpanipt')->name('simpan-ipt');
    Route::post('simpan-matrikulasi', 'PenggunaController@simpanmatrikulasi')->name('simpan-matrikulasi');
    Route::post('kemaskini-matrikulasi', 'PenggunaController@kemaskinimatrikulasi')->name('kemaskini-matrikulasi');
    
    Route::post('kemaskini-pmr', 'PenggunaController@kemaskinipmr')->name('kemaskini-pmr');
});

