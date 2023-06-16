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


Route::get('/index', function(){
    return view('index');
});

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', 'PageController@home');
Route::get('/profile', 'PageController@profile');
Route::get('/mahasiswa', 'PageController@mahasiswa');
Route::get('/contact', 'PageController@contact');
Route::get('/mahasiswa/pencarian', 'PageController@pencarian');
Route::get('/mahasiswa/formtambah', 'PageController@tambah');
Route::post('/mahasiswa/simpan', 'PageController@simpan');
Route::post('/mahasiswa/pencarian', 'PageController@pencarian');

Route::get('/mahasiswa/formedit/{id}', 'PageController@formedit');
Route::put('/mahasiswa/update/{id}', 'PageController@update');
Route::get('/mahasiswa/delete/{id}', 'PageController@delete');

