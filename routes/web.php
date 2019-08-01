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

Route::get('/', function(){
    return view('welcome');
});

//Route Buku
Route::prefix('buku')->group(function () {
    Route::get('/', 'BukuController@index')->name('index.buku');
    Route::get('/add', 'BukuController@create')->name('add.buku');
    Route::post('/store', 'BukuController@store')->name('store.buku');
    Route::get('/detail/{id}', 'BukuController@show')->name('detail.buku');
    Route::get('/edit/{id}', 'BukuController@edit')->name('edit.buku');
	Route::post('/update/{id}', 'BukuController@update')->name('update.buku');
	Route::get('/delete/{id}', 'BukuController@destroy')->name('delete.buku');
    Route::get('/q', 'BukuController@index')->name('q.buku');
});
Auth::routes();

Route::get('home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('/', function () {
        return view('admin.index');
    });
});