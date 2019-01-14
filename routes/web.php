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
    return view('Auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => 'auth'], function() {
Route::resource ('admin/prov','inProv');
});

Route::group(['middleware' => 'auth'], function() {
Route::resource ('admin/kab','inKab');
});

Route::group(['middleware' => 'auth'], function() {
Route::resource ('admin/kec','inKec');
});

Route::group(['middleware' => 'auth'], function() {
Route::resource ('admin/des','inDes');
});


Route::group(['middleware' => 'auth'], function() {
Route::resource ('admin/ket','inKet');
});

Route::group(['middleware' => 'auth'], function() {
Route::resource ('req','inReq');
});


Route::group(['middleware' => 'auth'], function() {
Route::resource ('admin/dusun','inDus');
});


Route::group(['middleware' => 'auth'], function() {
Route::resource ('admin/user','cuser');
});
