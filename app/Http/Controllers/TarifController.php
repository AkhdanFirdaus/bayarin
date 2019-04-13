<?php

namespace App\Http\Controllers;

use App\Tarif;
use Illuminate\Http\Request;
use Session;

class TarifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tarifs = Tarif::all();
        return view('tarif.tarif')->with('tarifs', $tarifs);
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
        Tarif::create($request->all());
        Session::flash('msg', 'Berhasil menambahkan tarif');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tarif  $tarif
     * @return \Illuminate\Http\Response
     */
    public function show(Tarif $tarif)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tarif  $tarif
     * @return \Illuminate\Http\Response
     */
    public function edit(Tarif $tarif)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tarif  $tarif
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Tarif::find($id)->update($request->all());
        Session::flash('msg', 'Berhasil mengubah daya '.$request->daya);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tarif  $tarif
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tarif::find($id)->destroy($id);
        Session::flash('msg', 'tarif telah dihapus');
        return redirect()->back();
    }
}
