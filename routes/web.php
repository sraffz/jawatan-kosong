<?php

use App\Iklan;
 
use Illuminate\Http\Request;
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

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return dd('done');
});



Route::get('/', function () {

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
    ->where('publish', 1)
    ->count();

    // dd($bil);
    $syarat = DB::table('senarai-syarat-jawatan')->get();
    
    return view('welcome', compact('iklan', 'syarat','bil'));
});

Route::get('/semakan',  function () {
    return view('semakan');
});

Route::post('/cetak-keputusan', 'PenggunaController@cetakkeputusan');
Route::get('/cetak-keputusan/{id}', 'PenggunaController@cetakkeputusan2');

Route::post('/keputusan-semakan',  'PenggunaController@semakkeputusan')->name('semak');

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
    Route::get('/ujian-temuduga', 'AdminController@ujianTemuduga')->name('admin.ujian-temuduga');
    Route::get('/pentadbir', 'AdminController@pentadbir')->name('admin.pentadbir');
    Route::get('/kemaskini-iklan/{id}', 'AdminController@kemaskiniiklan')->name('admin.kemaskini-iklan');
    
    Route::get('/senarai-pemohon/{url}', 'AdminController@senaraiPermohonan')->name('admin.permohonan.senarai');
    Route::get('/butiran-pemohon/{id2}-{id}', 'AdminController@butiranPermohonan')->name('butiran-pemohon');

    Route::get('/cetak-iklan/{id}', 'AdminController@cetakiklan')->name('cetak-iklan');
    Route::get('/export-senarai-pemohon', 'AdminController@exportSenaraiPemohon')->name('export-senarai-pemohon');

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
    Route::post('/tambah-jenis-panggilan', 'AdminController@tambahJenisPanggilan')->name('tambah-jenis-panggilan');
    Route::post('/kemaskini-jenis-panggilan', 'AdminController@kemaskinijenispanggilan')->name('kemaskini-jenis-panggilan');
    Route::post('/padam-jenis-panggilan', 'AdminController@padamjenis-panggilan')->name('padam-jenis-panggilan');

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
    Route::get('/permohonan', 'PenggunaController@permohonan')->name('permohonan');
    Route::get('/butiran-iklan/{id}', 'PenggunaController@butiraniklan')->name('butiran-iklan');
    Route::get('/maklumat-diri', 'PenggunaController@maklumatdiri')->name('maklumat-diri');
    Route::get('/pengalaman', 'PenggunaController@pengalaman')->name('pengalaman');
    Route::get('/maklumat-tambahan', 'PenggunaController@maklumatTambahan')->name('maklumat-tambahan');

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
    Route::post('hantar-permohonan', 'PenggunaController@hantarPermohonan')->name('hantar-permohonan');
    Route::get('/batal-permohonan', 'PenggunaController@batalPermohonan')->name('batal-permohonan');
    Route::post('simpan-tambahan', 'PenggunaController@simpanTambahan')->name('simpan-tambahan');
    
    Route::get('padam-pengalaman/{id}', 'PenggunaController@padamPengalaman')->name('padam-pengalaman');
    
    // Akademik
    
    Route::post('simpan-pmr', 'PenggunaController@simpanpmr')->name('simpan-pmr');
    Route::post('simpan-spm', 'PenggunaController@simpanspm')->name('simpan-spm');
    Route::post('simpan-spm-ulangan', 'PenggunaController@simpanspmulangan')->name('simpan-spm-ulangan');
    Route::post('simpan-stpm', 'PenggunaController@simpanstpm')->name('simpan-stpm');
    Route::post('simpan-stam', 'PenggunaController@simpanstam')->name('simpan-stam');
    Route::post('simpan-svm', 'PenggunaController@simpansvm')->name('simpan-svm');
    Route::post('simpan-skm', 'PenggunaController@simpanskm')->name('simpan-skm');
    Route::post('simpan-matrikulasi', 'PenggunaController@simpanmatrikulasi')->name('simpan-matrikulasi');
    Route::post('simpan-ipt', 'PenggunaController@simpanipt')->name('simpan-ipt');
    
    
    Route::post('kemaskini-pmr', 'PenggunaController@kemaskinipmr')->name('kemaskini-pmr');
    Route::post('kemaskini-spm', 'PenggunaController@kemaskinispm')->name('kemaskini-spm');
    Route::post('kemaskini-spm-ulangan', 'PenggunaController@kemaskinispmulangan')->name('kemaskini-spm-ulangan');
    Route::post('kemaskini-stpm', 'PenggunaController@kemaskinistpm')->name('kemaskini-stpm');
    Route::post('kemaskini-stam', 'PenggunaController@kemaskinistam')->name('kemaskini-stam');
    Route::post('kemaskini-matrikulasi', 'PenggunaController@kemaskinimatrikulasi')->name('kemaskini-matrikulasi');
    Route::post('kemaskini-svm', 'PenggunaController@kemaskinisvm')->name('kemaskini-svm');
    Route::post('kemaskini-ipt', 'PenggunaController@kemaskiniipt')->name('kemaskini-ipt');
    Route::post('kemaskini-maklumat-tambahan', 'PenggunaController@kemaskiniMaklumatTambahan')->name('kemaskini-maklumat-tambahan');

    Route::get('padam-skm', 'PenggunaController@padamskm')->name('padam-skm');
    Route::get('padam-ipt', 'PenggunaController@padamipt')->name('padam-ipt');
    Route::get('padam-mp-pt3', 'PenggunaController@padampt3')->name('padam-mp-pt3');
    Route::get('padam-mp-spm', 'PenggunaController@padamspm')->name('padam-mp-spm');
    Route::get('padam-mp-spmu', 'PenggunaController@padamspmu')->name('padam-mp-spmu');
    Route::get('padam-mp-stam', 'PenggunaController@padamstam')->name('padam-mp-stam');
    Route::get('padam-mp-stpm', 'PenggunaController@padamstpm')->name('padam-mp-stpm');
});

