<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use DB;

class ApiController extends Controller
{

	public function getPelanggan($no_kwh)
    {
    	$pelanggan = \App\Pelanggan::where('no_kwh', $no_kwh)->get();
    	$pelanggan->load(['tagihan' => function ($query)
    	{
    		$query->where('status', 'Belum Bayar');
    	}, 'tarif']);

    	return response()->json(['DATA' => $pelanggan], 201);
    }

    public function detailPelanggan($id)
    {

    	$pelanggan = \App\Pelanggan::find($id);
    	$pelanggan->load(['tagihan' => function ($query)
    	{
    		$query->where('status', 'Belum Bayar');
    	}, 'tarif']);

    	return response()->json(['DATA' => $pelanggan], 201);
    }

    public function detailPenggunaan($id)
    {

    	$penggunaan = \App\Penggunaan::find($id);
    	$penggunaan->load(['pelanggan.tarif', 'tagihan']);

    	return response()->json(['DATA' => $penggunaan], 201);
    }

    public function getTagihan($id)
    {

    	$tagihan = \App\Tagihan::find($id);
    	$tagihan->load('pelanggan.tarif');
    	return response()->json(['DATA' => $tagihan], 201);
    }
}
