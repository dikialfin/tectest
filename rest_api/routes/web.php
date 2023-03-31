<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Http\Middleware\CorsMiddleware;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->group(['middleware' => CorsMiddleware::class], function () use ($router) {
    $router->get('/pegawai', 'PegawaiController@getAllPegawai');
    $router->get('/pegawai/{id_pegawai}', 'PegawaiController@getPegawaiById');
    // $router->get('/jabatan', 'JabatanController@getAllJabatan');
    // $router->get('/jabatan/{id_jabatan}', 'JabatanController@getJabatanById');
    $router->get('/kontrak', 'KontrakController@getAllKontrak');
    $router->get('/kontrak/{id_pegawai}', 'KontrakController@getKontrakByIdPegawai');
});
