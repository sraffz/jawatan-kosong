<?php
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

Auth::routes();

route::post('/user/logout', 'Auth\LoginController@logoutUser')->name('user.logout');


Route::prefix('admin')->group(function() {
    
    Route::get('/login', 'Auth\admin\LoginController@showLoginForm')->name('auth.admin.login');
    Route::post('/login', 'Auth\admin\LoginController@sendLoginResponse')->name('admin.login');
    Route::post('/logout', 'Auth\admin\LoginController@logoutAdmin')->name('admin.logout');
    
    Route::get('/', 'AdminController@index')->name('admin');
    Route::get('/profil', 'AdminController@profil')->name('admin.profil');
    Route::get('/iklan', 'AdminController@iklan')->name('admin.iklan');
    Route::get('/tetapan', 'AdminController@tetapan')->name('admin.tetapan');
    Route::get('/kemaskini-iklan/{id}', 'AdminController@kemaskiniiklan')->name('admin.kemaskini-iklan');
});

Route::post('/buka-iklan', 'AdminController@bukaiklan')->name('buka-iklan');


Route::get('/Halaman-utama', 'HomeController@index')->name('Halaman-utama');
