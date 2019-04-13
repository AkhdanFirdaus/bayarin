<?php

namespace App\Http\Controllers;

use App\Penggunaan;
use App\Pelanggan;
use App\Tarif;
use Illuminate\Http\Request;
use Session;

class PenggunaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        Penggunaan::create($request->all());
        Session::flash('msg', 'berhasil menambahkan');
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
        return view('penggunaan.penggunaan', compact('pelanggan', 'total', 'tarifs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
