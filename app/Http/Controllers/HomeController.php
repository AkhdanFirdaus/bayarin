<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelanggan;
use App\Pembayaran;
use App\Penggunaan;
use App\Tagihan;
use App\Tarif;
use Auth;
use Faker;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faker = Faker\Factory::create();
        $pelanggan = Pelanggan::all();
        $pembayaran = Pembayaran::all();
        $penggunaan = Penggunaan::all();
        $tagihan = Tagihan::all();
        $tarif = Tarif::all();
        if (Auth::user()->level == 'admin') {
            return view('home', compact('faker', 'pelanggan', 'pembayaran', 'penggunaan', 'tagihan', 'tarif'));
        } elseif (Auth::user()->level == 'bank') {
            return view('bank', compact('faker', 'pembayaran', 'tagihan'));
        }
        return view('userhome');
    }
    public function verifbank($id)
    {
        $tagihan = Tagihan::where('status', 'Konfirmasi');
        $pembayaran = Pembayaran::find($id);
        $pembayaran->update(['admin_id' => Auth::user()->id]);
        $tagihan->update(['status' => 'Lunas']);
        Session::flash('msg', 'Berhasil Verif');
        return redirect()->back();
    }
}
