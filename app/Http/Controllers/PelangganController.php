<?php

namespace App\Http\Controllers;

use App\Pelanggan;
use App\Tarif;
use Illuminate\Http\Request;
use Faker;
use Session;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faker = Faker\Factory::create();
        $random = [
            'randomkwh' => substr($faker->isbn13,2),
            'randomusername' => $faker->username,
            'randompass' => $faker->password
        ];
        $pelanggans = Pelanggan::all();
        $tarifs = Tarif::get();
        $tarifs->pluck('daya', 'id');
        return view('pelanggan.pelanggan', compact('pelanggans', 'tarifs', 'faker', 'random'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        Pelanggan::create($request->all());
        Session::flash('msg', 'Berhasil menambahkan'.$request->nama);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tarifs = Tarif::all();
        $pelanggan = Pelanggan::find($id);
        $total = 0;
        foreach ($pelanggan->tagihan->where('status', 'Belum Bayar') as $key => $tagihan) {
            $total = $tagihan->where('status', 'Belum Bayar')->sum('jumlah_meter') * $tagihan->pelanggan->tarif->tarifperkwh;
        }
        return view('pelanggan.showPelanggan', compact('pelanggan', 'tarifs', 'total'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
        
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pelanggan = Pelanggan::find($id);
        $pelanggan->update($request->all());
        Session::flash('msg', 'Berhasil mengubah '.$request->nama);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pelanggan::find($id)->destroy($id);
        Session::flash('msg', 'Sukses menghapus pelanggan');
        return redirect()->route('pelanggan.index');
    }

    // public function lihatriwayat($id)
    // {
    //     $pelanggan = Pelanggan::find($id);
    //     return view('pembayaran.pembayaran');
    // }

    public function dataPenggunaan($nama)
    {
        $tarifs = Tarif::all();
        $tarifs->pluck('daya', 'id');
        $pelanggan = Pelanggan::where('nama', $nama)->firstOrFail();
        $total = 0;
        foreach ($pelanggan->tagihan->where('status', 'Belum Bayar') as $key => $tagihan) {
            $total = $tagihan->jumlah_meter * $tagihan->pelanggan->tarif->tarifperkwh;
        }
        return view('penggunaan.dataPenggunaan', compact('pelanggan', 'tarifs', 'total'));
    }
    public function dataPembayaran($nama)
    {
        $tarifs = Tarif::all();
        $tarifs->pluck('daya', 'id');
        $pelanggan = Pelanggan::where('nama', $nama)->firstOrFail();
        $total = 0;
        foreach ($pelanggan->tagihan->where('status', 'Belum Bayar') as $key => $tagihan) {
            $total = $tagihan->jumlah_meter * $tagihan->pelanggan->tarif->tarifperkwh;
        }
        return view('pembayaran.riwayatbayar', compact('pelanggan', 'tarifs', 'total'));
    }
}
