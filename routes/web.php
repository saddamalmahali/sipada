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
Route::get('/', 'HomeController@index');
Auth::routes();

Route::get('/home', 'HomeController@index');
Route::group(['middleware'=>'auth'], function(){
    Route::get('/client/tools/migrasi', 'ToolsController@index_migrate_wilayah');
    Route::post('/client/tools/migrasi', 'ToolsController@migrasi_wilayah');
    Route::get('/client/preferences/registrasi_wilayah', 'ToolsController@index_registrasi_wilayah');
    Route::get('/client/preferences/registrasi_wilayah/registrasi/{id}', 'ToolsController@tambah_registrasi_wilayah');
    Route::get('/client/preferences/registrasi_wilayah/detile/{id}', 'ToolsController@detile_wilayah');
    Route::post('/client/preferences/registrasi_wilayah/simpan_registrasi', 'ToolsController@simpan_registrasi_wilayah');
});
