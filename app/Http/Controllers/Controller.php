<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Auth;
use Session;
use Hash;
use App\Pelanggan;
use App\Tagihan;
use App\Tarif;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
    	if (!Auth::check()) {
    		return view('welcome');
    	}
    	return redirect()->back();    	
    }

    public function cekNoKwh(Request $request)
    {
        Session::put('no_kwh', $request->no_kwh);
    	$pelanggan = Pelanggan::where('no_kwh', $request->no_kwh)->first();

        if ($pelanggan == null) {
            Session::flash('msg', 'Tidak ditemukan');
            return redirect()->back();
        }

        $total = 0;
        foreach ($pelanggan->tagihan->where('status', 'Belum Bayar') as $key => $tagihan) {
            $total = $tagihan->jumlah_meter * $tagihan->pelanggan->tarif->tarifperkwh;
        }

        Session::flash('msg', 'Ditemukan');
    	return view('userhome', compact('pelanggan', 'total'));
    }

    public function bayarform(Request $request, $no_kwh)
    {
        $pelanggan = Pelanggan::where('no_kwh', $no_kwh)->firstOrFail();

        if (Hash::check($request->password, $pelanggan->password)) {            
            $total = 0;
            foreach ($pelanggan->tagihan->where('status', 'Belum Bayar') as $key => $tagihan) {
                $total = $tagihan->where('status', 'Belum Bayar')->sum('jumlah_meter') * $tagihan->pelanggan->tarif->tarifperkwh;
            }
            return view('pembayaran.userbayar')->with(['pelanggan' => $pelanggan, 'total' => $total]);
        }
        Session::flash('msg', 'Password tak sama');
        return redirect()->back();
    }

    public function riwayatbayar(Request $request, $no_kwh)
    {        
        $tarifs = Tarif::all();
        $pelanggan = Pelanggan::where('no_kwh', $no_kwh)->firstOrFail();
        $total = 0;
        foreach ($pelanggan->tagihan->where('status', 'Belum Bayar') as $key => $tagihan) {
            $total = $tagihan->where('status', 'Belum Bayar')->sum('jumlah_meter') * $tagihan->pelanggan->tarif->tarifperkwh;
        }

        if (Hash::check($request->password2, $pelanggan->password)) {
            return view('pembayaran.riwayatbayar', compact('pelanggan', 'tarifs', 'total'));
        }

        Session::flash('msg', 'Password tak sama');
        return redirect()->back();
    }

    public function exitSession()
    {
        Session::forget('no_kwh');
        return redirect('/');
    }
}
