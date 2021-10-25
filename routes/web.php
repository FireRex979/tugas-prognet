<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', function() {
    return redirect()->route('provinsi.index');
});
Route::group(['prefix' => 'suara'], function() {
    Route::get('/', 'SuaraController@index')->name('suara.index');
    Route::get('/create', 'SuaraController@create')->name('suara.create');
    Route::post('/store', 'SuaraController@store')->name('suara.store');
    Route::get('/show/{id}', 'SuaraController@show')->name('suara.show');
    Route::get('/edit/{id}', 'SuaraController@edit')->name('suara.edit');
    Route::post('/update/{id}', 'SuaraController@update')->name('suara.update');
    Route::post('/delete', 'SuaraController@delete')->name('suara.delete');
});
Route::group(['prefix' => 'animal'], function() {
    Route::get('/', 'AnimalController@index')->name('animal.index');
    Route::get('/create', 'AnimalController@create')->name('animal.create');
    Route::post('/store', 'AnimalController@store')->name('animal.store');
    Route::get('/show/{id}', 'AnimalController@show')->name('animal.show');
    Route::get('/edit/{id}', 'AnimalController@edit')->name('animal.edit');
    Route::post('/update/{id}', 'AnimalController@update')->name('animal.update');
    Route::post('/delete', 'AnimalController@delete')->name('animal.delete');
});
Route::group(['prefix' => 'provinsi'], function() {
    Route::get('/', 'ProvinsiController@index')->name('provinsi.index');
    Route::get('/create', 'ProvinsiController@create')->name('provinsi.create');
    Route::post('/store', 'ProvinsiController@store')->name('provinsi.store');
    Route::get('/show/{id}', 'ProvinsiController@show')->name('provinsi.show');
    Route::get('/edit/{id}', 'ProvinsiController@edit')->name('provinsi.edit');
    Route::post('/update/{id}', 'ProvinsiController@update')->name('provinsi.update');
    Route::post('/delete', 'ProvinsiController@delete')->name('provinsi.delete');
});
Route::group(['prefix' => 'kabupaten'], function() {
    Route::get('/', 'KabupatenController@index')->name('kabupaten.index');
    Route::get('/create', 'KabupatenController@create')->name('kabupaten.create');
    Route::post('/store', 'KabupatenController@store')->name('kabupaten.store');
    Route::get('/show/{id}', 'KabupatenController@show')->name('kabupaten.show');
    Route::get('/edit/{id}', 'KabupatenController@edit')->name('kabupaten.edit');
    Route::post('/update/{id}', 'KabupatenController@update')->name('kabupaten.update');
    Route::post('/delete', 'KabupatenController@delete')->name('kabupaten.delete');
});
Route::group(['prefix' => 'kecamatan'], function() {
    Route::get('/', 'KecamatanController@index')->name('kecamatan.index');
    Route::get('/get-kabupaten', 'KecamatanController@getKabupaten')->name('kecamatan.get-kabupaten');
    Route::get('/create', 'KecamatanController@create')->name('kecamatan.create');
    Route::post('/store', 'KecamatanController@store')->name('kecamatan.store');
    Route::get('/show/{id}', 'KecamatanController@show')->name('kecamatan.show');
    Route::get('/edit/{id}', 'KecamatanController@edit')->name('kecamatan.edit');
    Route::post('/update/{id}', 'KecamatanController@update')->name('kecamatan.update');
    Route::post('/delete', 'KecamatanController@delete')->name('kecamatan.delete');
});
