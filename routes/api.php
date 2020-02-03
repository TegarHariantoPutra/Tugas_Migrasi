<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

///////////////////PETUGAS
Route::post('register_petugas', 'UserController@register');
Route::post('login', 'UserController@login');
Route::put('/ubah_petugas/{id}','UserController@update')->middleware('jwt.verify');
Route::delete('/hapus_petugas/{id}','UserController@hapus')->middleware('jwt.verify');
Route::get('/tampil_petugas','UserController@tampil_petugas')->middleware('jwt.verify');

///////////////////ANGGOTA
Route::post('register_anggota', 'UserController@register2');
Route::post('login', 'UserController@login');
Route::put('/ubah_anggota/{id}','UserController@update2')->middleware('jwt.verify');
Route::delete('/hapus_anggota/{id}','UserController@hapus2')->middleware('jwt.verify');
Route::get('/tampil_anggota','UserController@tampil_anggota')->middleware('jwt.verify');

///////////////////BUKU
Route::post('/simpan_buku', 'BukuController@store');
Route::put('/ubah_buku/{id}','BukuController@update')->middleware('jwt.verify');
Route::delete('/hapus_buku/{id}','BukuController@hapus')->middleware('jwt.verify');
Route::get('/tampil_buku','BukuController@tampil_buku')->middleware('jwt.verify');

//////////////////PEMINJAMAN
Route::post('/simpan_peminjaman', 'PeminjamanController@store');
Route::put('/ubah_peminjaman/{id}','PeminjamanController@update')->middleware('jwt.verify');
Route::delete('/hapus_peminjaman/{id}','PeminjamanController@hapus')->middleware('jwt.verify');
Route::get('/tampil_peminjaman/{id}','PeminjamanController@tampil_peminjaman')->middleware('jwt.verify');

//////////////////DETAIL_PEMINJAMAN
Route::post('/simpan_detail', 'PeminjamanController@store2');
Route::put('/ubah_detail/{id}','PeminjamanController@update2')->middleware('jwt.verify');
Route::delete('/hapus_detail/{id}','PeminjamanController@hapus2')->middleware('jwt.verify');
Route::get('/tampil_detail','PeminjamanController@tampil_detail')->middleware('jwt.verify');

// Route::get('/',function(){
//     return Auth::User()->level;
// })->middleware('jwt.verify');
