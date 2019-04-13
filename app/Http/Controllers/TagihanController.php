<?php

namespace App\Http\Controllers;

use App\Tagihan;
use App\Tarif;
use App\Pelanggan;
use App\Penggunaan;
use Illuminate\Http\Request;
use Session;

class TagihanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tagihans = Tagihan::all();
        $penggunaans = Penggunaan::all();
        $penggunaans->pluck('bulan', 'id');
        return view('tagihan.tagihan')->with(['tagihans' => $tagihans, 'penggunaans' => $penggunaans]);
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
    public function store(Request $request)
    {
        Tagihan::create($request->all());
        Session::flash('msg', 'Berhasil menetapkan tagihan');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd($id);
        Tagihan::find($id)->destroy($id);
        Session::flash('msg', 'Sukses menghapus pelanggan');
        return redirect()->route('tagihan.index');
    }
}
