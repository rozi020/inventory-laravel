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

		Route::resource('fakultas','FakultasController');

		Route::resource('jurusan','JurusanController');

		Route::resource('ruangan','RuanganController');

		Route::resource('barang','BarangController');

		Route::get('dashboard', 'DashboardController@index');

		Route::get('dashboard', 'DashboardController@hitungtable');

		Route::get('exportjurusan', 'JurusanController@export');

		Route::get('exportbarang', 'BarangController@export');


		


});

Route::post('importfakultas', 'FakultasController@import');
Route::get('dummy', 'EmailController@send');





?>
		

