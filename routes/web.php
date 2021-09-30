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

Route::get('/', function () {
    return view('welcome');
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
