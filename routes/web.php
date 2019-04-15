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

Route::get('/', 'Controller@index');
Route::get('cekNoKwh', 'Controller@cekNoKwh')->name('cekNoKwh');
Route::post('{no_kwh}/pembayaran', 'Controller@bayarform')->name('bayarform');
Route::post('{no_kwh}/pembayaran/bayarSemua', 'PembayaranController@store')->name('pembayaran.bayarSemua');
Route::post('{no_kwh}/pembayaran/bayarBank', 'PembayaranController@bayarBank')->name('pembayaran.bayarBank');
Route::post('{no_kwh}/pembayaran/bayarTunai', 'PembayaranController@bayarTunai')->name('pembayaran.bayarTunai');
Route::post('{no_kwh}/pembayaran/btnbayarpertagihan', 'PembayaranController@bayarPerTagihan')->name('pembayaran.bayarpertagihan');
Route::post('{no_kwh}/riwayatbayar', 'Controller@riwayatbayar')->name('riwayatbayar');
Route::get('exitSess', 'Controller@exitSession')->name('exitSess');

Route::get('/loginuser', 'Auth\UserLoginController@showUserLoginForm');
Route::post('/loginuser', 'Auth\UserLoginController@login');

Route::get('/registeruser', 'Auth\UserRegisterController@showUserRegistrationForm')->name('registeruser.show');
Route::post('/registeruser', 'Auth\UserRegisterController@register')->name('registeruser.store');

// userreport
Route::post('report/pembayaran/{id}', 'PDFController@reportPembayaranID')->name('reportPembayaranID');

Auth::routes();

Route::group(['middleware' => 'admin'], function () {
	Route::get('/home', 'HomeController@index')->name('home');

	Route::put('verif/pembayaran/{id}', 'HomeController@verifbank')->name('verifbank');

	Route::resource('pelanggan', 'PelangganController');
	Route::get('pelanggan/{nama}/penggunaan', 'PelangganController@dataPenggunaan')->name('dataPenggunaan');
	Route::get('pelanggan/{nama}/pembayaran', 'PelangganController@dataPembayaran')->name('dataPembayaran');

	Route::resource('penggunaan', 'PenggunaanController', ['only' => ['index', 'show']]);
	Route::post('pelanggan/{id}/penggunaan', 'PenggunaanController@store')->name('penggunaan.store');

	Route::resource('tagihan', 'TagihanController', ['only' => ['index', 'store', 'destroy']]);
	Route::resource('tarif', 'TarifController', ['except' => ['create', 'edit', 'show']]);

});

Route::group(['prefix' => '/report', 'middleware' => 'admin'], function () {
	Route::post('pelanggan', 'PDFController@reportPelanggan')->name('reportPelanggan');
	Route::post('penggunaan', 'PDFController@reportPenggunaan')->name('reportPenggunaan');
	Route::post('pembayarans', 'PDFController@reportPembayaran')->name('reportPembayaran');
	Route::post('tagihan', 'PDFController@reportTagihan')->name('reportTagihan');
	Route::post('tarif', 'PDFController@reportTarif')->name('reportTarif');
});
