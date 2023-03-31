<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', "App\Http\Controllers\Pegawai\ViewController@indexView");
Route::post('/pegawai', "App\Http\Controllers\Pegawai\MainController@TambahDataPegawai");
Route::put('/pegawai', "App\Http\Controllers\Pegawai\MainController@editDataPegawai");
Route::delete('/pegawai', "App\Http\Controllers\Pegawai\MainController@deleteDataPegawai");

Route::get('/jabatan', "App\Http\Controllers\jabatan\ViewController@indexView");
Route::get('/data/jabatan', "App\Http\Controllers\jabatan\MainController@getAllDataJabatan");
Route::get('/data/jabatan/{id_jabatan}', "App\Http\Controllers\jabatan\MainController@getDataJabatanById");
Route::post('/jabatan', "App\Http\Controllers\jabatan\MainController@tambahDataJabatan");
Route::put('/jabatan', "App\Http\Controllers\jabatan\MainController@editDataJabatan");
Route::delete('/jabatan', "App\Http\Controllers\jabatan\MainController@deleteDataJabatan");

Route::get('/kontrak', "App\Http\Controllers\Kontrak\ViewController@indexView");
Route::post('/kontrak', "App\Http\Controllers\Kontrak\MainController@TambahDataKontrak");
Route::put('/kontrak', "App\Http\Controllers\Kontrak\MainController@editDataKontrak");
Route::delete('/kontrak', "App\Http\Controllers\Kontrak\MainController@deleteDataKontrak");
