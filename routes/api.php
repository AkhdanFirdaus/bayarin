<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('getPelanggan/{no_kwh}', 'ApiController@getPelanggan');
Route::get('detailPelanggan/{id}', 'ApiController@detailPelanggan');
Route::get('detailPenggunaan/{id}', 'ApiController@detailPenggunaan');
Route::get('getTagihan/{id}', 'ApiController@getTagihan');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

