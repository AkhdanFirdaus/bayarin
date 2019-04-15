@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-7 bgl py-4 responsif">
            <div class="container">
                @include('inc.datetime')
                @if(!Request::is('cekNoKwh'))
                @yield('usercontent')
                @else
                @include('inc.daftartagihan')                
                @endif
            </div>
        </div>
        <div class="col-md-5 yellow vh-100 py-4 responsif">
            <div class="container">
                <div class="text-center">
                    <img src="{{ asset('img/logo/logo.png') }}" alt="Logo" class="img-fluid img-thumbnail rounded-circle mx-auto" width="100px">
                    <h3 class="my-2">{{ $pelanggan->nama }}</h3>
                </div>
                <span class="badge badge-info">Detail Penggunaan</span>
                <div class="card-group mb-2 text-center">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Tagihan</h5 class="card-title">
                            <h2 class="font-weight-light">{{ $pelanggan->tagihan->where('status', 'Belum Bayar')->count() }}</h2>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Penggunaan</h5 class="card-title">
                            <h2 class="font-weight-light">
                                @if($pelanggan->tagihan->where('status', 'Belum Bayar')->count() > 0)
                                {{ $pelanggan->tagihan->where('status', 'Belum Bayar')->sum('jumlah_meter') }}
                                @else
                                    0
                                @endif
                            </h2>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Jatuh Tempo</h5 class="card-title">
                            <h2 class="font-weight-light">
                                @if($pelanggan->tagihan->where('status', 'Belum Bayar')->last())
                                {{ \Carbon\Carbon::parse($pelanggan->tagihan->where('status', 'Belum Bayar')->last()->created_at)->addDay(7)->format('d/m/y') }}</h2>
                                @else
                                -
                                @endif
                        </div>
                    </div>
                </div>                
                <div class="row">
                    <div class="col-md-8">
                        <span class="badge badge-info">Identitas User</span>
                        <div class="list-group font-weight-bold">
                            <div class="list-group-item d-flex align-items-center">
                                <div class="col-2 text-center">
                                    <i class="fas fa-id-badge fa-2x text-primary"></i>
                                </div>                        
                                <div class="col">
                                    <span class="badge badge-primary">Nomor KWH</span>
                                    <p>{{ $pelanggan->no_kwh }}</p>
                                </div>                            
                            </div>
                            <div class="list-group-item d-flex align-items-center">
                                <div class="col-2 text-center">
                                    <i class="fas fa-map-marker-alt fa-2x color-red"></i>
                                </div>
                                <div class="col">
                                    <span class="badge badge-primary">Alamat</span>
                                    <p>{{ $pelanggan->alamat }}</p>
                                </div>                        
                            </div>
                            <div class="list-group-item d-flex align-items-center">                                
                                <div class="col-2 text-center">
                                    <i class="fas fa-bolt fa-2x color-yellow"></i>
                                </div>
                                <div class="col">
                                    <span class="badge badge-primary">Daya Rumah</span>
                                    <p>{{ $pelanggan->tarif->daya }} VA</p>
                                </div>                        
                            </div>
                        </div>                
                    </div>
                    <div class="col-md-4">
                        <span class="badge badge-info">Menu</span>
                        @if(Auth::check())
                        <a href="#pelangganEdit" class="btn btn-warning text-white btn-block py-3" data-toggle="modal" data-target="#pelangganEdit"><i class="fas fa-pen fa-2x"></i></a>                        
                        <a href="{{ route('dataPembayaran', $pelanggan->nama) }}" class="btn btn-primary btn-block py-3"><i class="fas fa-clock fa-2x"></i></a>
                        <a href="{{ route('dataPenggunaan', $pelanggan->nama) }}" class="btn btn-success btn-block py-3"><i class="fas fa-hands fa-2x"></i></a>
                        <div class="d-flex justify-content-start mt-2 align-items-start">
                            <a href="javascript:void();" onclick="history.go(-1)" class="btn btn-primary d-block mr-1"><i class="fas fa-chevron-left fa-lg"></i></a>
                            <a href="{{ route('home') }}" class="btn btn-primary d-block"><i class="fas fa-home fa-lg"></i></a>
                        </div>
                        @include('inc.pelangganmodaledit')
                        @include('inc.penggunaanmodal')
                        @else
                        <a href="#masukBayarForm" class="btn btn-success btn-block py-3" id="bayarform" data-toggle="modal" data-target="#masukBayarForm"><i class="fas fa-credit-card fa-2x"></i></a>
                        <a href="#riwayatBayarForm" class="btn btn-primary btn-block py-3" id="riwayatbayarform" data-toggle="modal" data-target="#riwayatBayarForm"><i class="fas fa-clock fa-2x"></i></a>
                        <a href="{{ route('exitSess') }}" class="btn btn-danger btn-block py-3"><i class="fas fa-sign-out-alt fa-2x"></i></a>
                        <div class="d-flex justify-content-start mt-2 align-items-start">
                            <a href="javascript:void();" onclick="history.go(-1)" class="btn btn-primary d-block mr-1"><i class="fas fa-chevron-left fa-lg"></i></a>
                            <a href="{{ route('cekNoKwh', ['no_kwh' => session('no_kwh'), '_token' => csrf_field()] ) }}" class="btn btn-primary d-block"><i class="fas fa-home fa-lg"></i></a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(session()->has('msg'))
    @include('inc.toastmsg')
    @endif
    @include('inc.checkmodal')
    {{-- @include('inc.floatbtn') --}}
</div>
@endsection