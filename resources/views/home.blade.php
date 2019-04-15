@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">        
        <div class="col-md-4 yellow p-5 responsif">
            <div class="container">                
                <div class="text-center">
                    @include('inc.datetime')
                    <hr>
                    <img src="{{ asset('img/logo/logo.png') }}" alt="Logo" class="img-fluid img-thumbnail rounded-circle mx-auto" width="120px">    
                    <h3>{{ Auth::user()->nama }}</h3>
                    <p">{{ strtoupper(Auth::user()->level) }}</p>
                </div>
                <div class="list-group font-weight-bold">
                    <a id="lpelanggan" href="{{ route('pelanggan.index') }}" class="list-group-item list-group-item-action d-flex align-items-center text-primary">
                        <i class="fas fa-user-friends fa-4x"></i>
                        <span class="card-text p-4">Pelanggan</span>
                    </a>
                    <a id="ltagihan" href="{{ route('tagihan.index') }}" class="list-group-item list-group-item-action d-flex align-items-center color-green">
                        <i class="fas fa-money-bill-wave-alt fa-4x"></i>
                        <span class="card-text p-4">Tagihan</span>
                    </a>
                    <a id="ltarif" href="{{ route('tarif.index') }}" class="list-group-item list-group-item-action d-flex align-items-center color-orange">
                        <i class="fas fa-file-invoice-dollar fa-4x"></i>
                        <span class="card-text p-4">Tarif</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-8 bgr p-5 responsif">            
            @if(Request::is('home'))
            <div class="card-columns text-center">
                <div class="card">
                    <div class="card-body">
                        <span class="display-4">{{ $pelanggan->count() }}</span>
                        <h5 class="card-title p-4">Pelanggan</h5>
                        <hr>
                        <form method="POST" action="{{ route('reportPelanggan') }}">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-print"></i></button>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <span class="display-4">{{ $tagihan->count() }}</span>
                        <h5 class="card-title p-4">Tagihan</h5>
                        <hr>
                        <div class="row">
                            <div class="col text-danger">
                                <div class="d-block">
                                    <i class="fas fa-times fa-2x"></i>
                                </div>                                
                                <span class="badge badge-danger">{{ $tagihan->where('status', 'Belum Bayar')->count() }}</span>
                            </div>
                            <div class="col text-warning">
                                <div class="d-block">
                                    <i class="fas fa-exclamation-triangle fa-2x"></i>
                                </div>                                
                                <span class="badge badge-warning">{{ $tagihan->where('status', 'Konfirmasi')->count() }}</span>
                            </div>
                            <div class="col text-success">
                                <div class="d-block">
                                    <i class="fas fa-check fa-2x"></i>
                                </div>                                
                                <span class="badge badge-success">{{ $tagihan->where('status', 'Lunas')->count() }}</span>
                            </div>
                        </div>
                        <hr>
                        <form method="POST" action="{{ route('reportTagihan') }}">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-print"></i></button>
                        </form>                        
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <span class="display-4">{{ $tarif->count() }}</span>
                        <h5 class="card-title p-4">Tarif</h5>
                        <hr>
                        <form method="POST" action="{{ route('reportTarif') }}">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-print"></i></button>
                        </form>                        
                    </div>
                </div>
            </div>
            @endif
            @yield('admincontent')
            @include('inc.floatbtn')
        </div>
    </div>
</div>
@endsection
