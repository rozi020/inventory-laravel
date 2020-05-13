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
Auth::routes();

Route::get('signout', ['as' => 'auth.signout', 'uses' => 'Auth\loginController@signout']);

Route::group(['middleware' => 'auth'], function(){

	Route::group(['middleware' => 'checkRole:admin'], function(){

		Route::resource('fakultas','FakultasController');

		Route::resource('jurusan','JurusanController');

		Route::resource('ruangan','RuanganController');

		Route::resource('barang','BarangController');

		});

	Route::group(['middleware' => ['auth','checkRole:admin,staff']], function(){

		Route::get('barang', ['as' => 'barang.index', 'uses' => 'BarangController@index']);

		Route::get('barang/edit/{id}', ['as' => 'barang.edit', 'uses' => 'BarangController@edit']);

		Route::put('barang/edit/{id}', ['as' => 'barang.update', 'uses' => 'BarangController@update']);
		
	});


		Route::get('dashboard', 'DashboardController@index');

		Route::get('home', 'DashboardController@index');

		Route::get('dashboard', 'DashboardController@hitungtable');

		Route::get('exportjurusan', 'JurusanController@export');

		Route::get('exportbarang', 'BarangController@export');

});

Route::post('importfakultas', 'FakultasController@import');

Route::get('dummy', 'EmailController@send');

Route::get('/','landingpageController@index');

Route::get('landingpage','landingpageController@index');




?>
		

