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
    $iklan = Iklan::all();
    
    return view('welcome', compact('iklan'));
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
    
    Route::post('/buka-iklan', 'AdminController@bukaiklan')->name('buka-iklan');
    Route::post('/tambah-kumpulan-jawatan', 'AdminController@tambahkumpulanjawatan')->name('tambah-kumpulan-jawatan');
    Route::post('/kemaskini-kumpulan-jawatan', 'AdminController@kemaskinikumpulanjawatan')->name('kemaskini-kumpulan-jawatan');
    Route::post('/padam-kumpulan-jawatan', 'AdminController@padamkumpulanjawatan')->name('padam-kumpulan-jawatan');

    Route::post('/tambah-taraf-jawatan', 'AdminController@tambahtarafjawatan')->name('tambah-taraf-jawatan');
    Route::post('/kemaskini-taraf-jawatan', 'AdminController@kemaskinitarafjawatan')->name('kemaskini-taraf-jawatan');
    Route::post('/padam-taraf-jawatan', 'AdminController@padamtarafjawatan')->name('padam-taraf-jawatan');
});

Route::middleware(['auth:web'])->group(function () {
    route::post('/user/logout', 'Auth\LoginController@logoutUser')->name('user.logout');
    
    Route::get('/Halaman-utama', 'HomeController@index')->name('Halaman-utama');
    Route::get('/profil', 'HomeController@profil')->name('profil');
    Route::get('/tetapan', 'HomeController@tetapan')->name('tetapan');
    
});

