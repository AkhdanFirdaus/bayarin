<?php

namespace App\Http\Controllers;

use App\Pembayaran;
use App\Pelanggan;
use App\Tarif;
use App\Tagihan;
use Illuminate\Http\Request;
use Session;
use PDF;
use View;
use Auth;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pembayaran.riwayatbayar');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pembayaran.userbayar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Pembayaran::create($request->all());
        Tagihan::where('status', 'Belum Bayar')->orderBy('pelanggan_id', $request->pelanggan_id)->update(['status' => 'Konfirmasi']);
        Session::flash('msg', 'Berhasil membayar');

        $pelanggan = Pelanggan::find($request->pelanggan_id);
        view()->share(['pelanggan' => $pelanggan, 'request' => $request->all()]);
        $pdf = PDF::loadHTML(View::make('report.bayarSemuaTFs'))->setPaper('A4', 'potrait');
        return $pdf->stream();
        // return redirect()->route('cekNoKwh', ['_token' => csrf_field(), 'no_kwh' => $pelanggan->no_kwh]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */

    public function bayarSemuaTagihan(Request $request)
    {        
        Pembayaran::create($request->all());
        Tagihan::where('status', 'Belum Bayar')->orderBy('pelanggan_id', $request->pelanggan_id)->update(['status' => 'Konfirmasi']);
        Session::flash('msg', 'Silahkan Bayar');
        // if ($pembayaran) {
        //     $pelanggan = Pelanggan::find($request->pelanggan_id);
        //     view()->share(['pelanggan' => $pelanggan, 'request' => $request->all()]);
        //     $pdf = PDF::loadView('report.bayarSemuaTF');
        //     $pdf->setPaper('A4', 'potrait');
        //     return $pdf->stream('Pembayaran'.$pelanggan->nama.date('Y-m-d').'.pdf');
        // }
        return redirect()->back();        

        // $pelanggan = Pelanggan::find($request->pelanggan_id);
        // view()->share(['pelanggan' => $pelanggan, 'request' => $request->all()]);
        // if ($request->has('download')) {
        //     $pdf = PDF::loadHTML(View::make('report.bayarSemuaTFs'))->setPaper('A4', 'potrait');
        //     return $pdf->stream();
        // }
    }

    public function bayarTagihan($id)
    {
                
    }

    public function bayarTunai(Request $request)
    {
        $pembayaran = new Pembayaran;
        $pembayaran->tagihan_id = $request->tagihan_id2;
        $pembayaran->pelanggan_id = $request->pelanggan_id2;
        $pembayaran->tanggal_pembayaran = $request->tanggal_pembayaran2;
        $pembayaran->bulan_bayar = $request->bulan_bayar2; 
        $pembayaran->biaya_admin = $request->biaya_admin2;
        $pembayaran->total_bayar = $request->total_bayar2;
        $pembayaran->admin_id = null;
        $pembayaran->metode = $request->metode2;
        $pembayaran->kode = $request->kode2;
        $pembayaran->save();

        $tag = Tagihan::where('status', 'Belum Bayar')->orderBy('pelanggan_id', $request->pelanggan_id2)->update(['status' => 'Konfirmasi']);
        Session::flash('msg', 'Berhasil memilih tunai, silahkan bayar di gerai terdekat');

        $pelanggan = Pelanggan::find($request->pelanggan_id2);
        return redirect()->route('cekNoKwh', ['_token' => csrf_field(), 'no_kwh' => $pelanggan->no_kwh]);
    }

    public function bayarBank(Request $request)
    {
        $pembayaran = new Pembayaran;
        $pembayaran->tagihan_id = $request->tagihan_id3;
        $pembayaran->pelanggan_id = $request->pelanggan_id3;
        $pembayaran->tanggal_pembayaran = $request->tanggal_pembayaran3;
        $pembayaran->bulan_bayar = $request->bulan_bayar3; 
        $pembayaran->biaya_admin = $request->biaya_admin3;
        $pembayaran->total_bayar = $request->total_bayar3;
        $pembayaran->admin_id = null;
        $pembayaran->metode = $request->metode3;
        $pembayaran->kode = $request->kode3;
        $pembayaran->save();

        $tag = Tagihan::where('status', 'Belum Bayar')->orderBy('pelanggan_id', $request->pelanggan_id2)->update(['status' => 'Konfirmasi']);
        Session::flash('msg', 'Berhasil membayar dengan bank');

        $pelanggan = Pelanggan::find($request->pelanggan_id3);
        return redirect()->route('cekNoKwh', ['_token' => csrf_field(), 'no_kwh' => $pelanggan->no_kwh]);
    }

    public function verifbank($id)
    {
        $pembayaran = Pembayaran::find($id);
        $pembayaran->update(['admin_id' => Auth::user()->id]);
        $pembayaran->tagihan->update(['status', 'Lunas']);
        Session::flash('msg', 'Berhasil Verif');
        return redirect()->back();
    }
}
