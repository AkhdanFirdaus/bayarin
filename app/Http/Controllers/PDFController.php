<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelanggan;
use App\Penggunaan;
use App\Pembayaran;
use App\Tagihan;
use App\Tarif;
use Auth;
use PDF;
use View;

class PDFController extends Controller
{
    public function __construct()
    {
    	return $this->middleware('admin');
    }

    public function reportPelanggan(Request $request)
    {
    	$pelanggans = Pelanggan::all();
        view()->share(['pelanggans' => $pelanggans, 'request' => $request]);
        $pdf = PDF::loadHTML(View::make('report.reportPelanggan'))->setPaper('A4', 'potrait');
        return $pdf->stream();
    }

    public function reportPenggunaan(Request $request)
    {
    	$penggunaans = Penggunaan::all();
        view()->share(['penggunaans' => $penggunaans, 'request' => $request]);
        $pdf = PDF::loadHTML(View::make('report.reportPenggunaan'))->setPaper('A4', 'potrait');
        return $pdf->stream();
    }

    public function reportPembayaran(Request $request)
    {
    	$pembayarans = Pembayaran::all();
        view()->share(['pembayarans' => $pembayarans, 'request' => $request]);
        $pdf = PDF::loadHTML(View::make('report.reportPembayaran'))->setPaper('A4', 'potrait');
        return $pdf->stream();
    }

    public function reportPembayaranID(Request $request, $id)
    {
        $pembayaran = Pembayaran::find($id);
        view()->share(['pembayaran' => $pembayaran, 'request' => $request]);
        $pdf = PDF::loadHTML(View::make('report.reportPembayaranID'))->setPaper('A4', 'potrait');
        return $pdf->stream();
    }

    public function reportTagihan(Request $request)
    {
    	$tagihans = Tagihan::all();
        view()->share(['tagihans' => $tagihans, 'request' => $request]);
        $pdf = PDF::loadHTML(View::make('report.reportTagihan'))->setPaper('A4', 'potrait');
        return $pdf->stream();
    }

    public function reportTarif(Request $request)
    {
    	$tarifs = Tarif::all();
        view()->share(['tarifs' => $tarifs, 'request' => $request]);
        $pdf = PDF::loadHTML(View::make('report.reportTarif'))->setPaper('A4', 'potrait');
        return $pdf->stream();
    }
}
