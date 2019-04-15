@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">        
        <div class="col-md-4 yellow responsif p-5">
            <div class="container">                
                <div class="text-center">
                    @include('inc.datetime')
                    <img src="{{ asset('img/logo/logo.png') }}" alt="Logo" class="img-fluid img-thumbnail rounded-circle mx-auto" width="120px">    
                    <h3>{{ Auth::user()->nama }}</h3>
                    <p">{{ strtoupper(Auth::user()->level) }}</p>
                    <div class="d-block mb-2">
                        <form action="{{ route('logout') }}" method="POST">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-lg"><i class="fas fa-sign-out-alt"></i></button>
                        </form>
                    </div>
                </div>
                <div class="list-group font-weight-bold">                    
                    <a href="#dataPembayaran" class="list-group-item list-group-item-action d-flex align-items-center color-green" data-toggle="modal" data-target="#dataPembayaran">
                        <i class="fas fa-money-bill-wave-alt fa-4x"></i>
                        <span class="card-text p-4">Pembayaran</span>
                    </a>
                    <a href="#dataTagihan" class="list-group-item list-group-item-action d-flex align-items-center color-orange"  data-toggle="modal" data-target="#dataTagihan">
                        <i class="fas fa-file-invoice-dollar fa-4x"></i>
                        <span class="card-text p-4">Tagihan</span>
                    </a>                    
                </div>
            </div>
        </div>
        <div class="col-md-8 bgr p-4 responsif">            
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-2 text-center">
                        <div class="card-body">
                            <span class="display-4">{{ $pembayaran->count() }}</span>
                            <h5 class="card-title p-4">Pembayaran</h5>
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
                            <form method="POST" action="{{ route('reportPembayaran') }}">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-print"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="card text-center">
                        <div class="card-body">
                            <span class="display-4">{{ $tagihan->count() }}</span>
                            <h5 class="card-title p-4">Tagihan</h5>
                            <hr>
                            <form method="POST" action="{{ route('reportTagihan') }}">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-print"></i></button>
                            </form>
                        </div>
                    </div>                        
                </div>
                <div class="col-md-8">
                    <div class="accordion" id="accordionExample">                
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Daftar Konfirmasi Pembayaran
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="list-group-flush">
                                        @foreach($pembayaran->where('admin_id', null) as $index => $pemb)
                                        <div class="list-group-item">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="d-block">
                                                        <h4 class="font-weight-bold color-yellow">{{ \Carbon\Carbon::parse($pemb->tanggal_pembayaran)->toFormattedDateString() }}</h4>
                                                        {{ $pemb->pelanggan->nama }}
                                                    </div>
                                                </div>
                                                <div class="col md-5 align-items-center">
                                                    <span class="font-weight-bold badge badge-info">{{ $pemb->metode }}</span>
                                                    <div class="d-block">
                                                        <i class="fas fa-money-bill-alt fa-2x color-green mr-2"></i>
                                                        <span class="font-weight-bold h5">Rp. {{ number_format($pemb->total_bayar) }}</span>
                                                    </div>
                                                </div>                                                
                                                <div class="col-md-2">
                                                    <form action="{{ route('verifbank', $pemb->id) }}" method="POST">
                                                        {{ csrf_field() }}
                                                        {{ method_field('PUT') }}
                                                        <button type="submit" class="btn btn-success"><i class="fas fa-check fa-2x text-white"></i></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if(session()->has('msg'))
                    <div class="alert alert-success">
                        {{session('msg')}}
                    </div>
                    @endif
                </div>            
            </div>
        </div>
    </div>
</div>
@include('inc.bankmodal')
@endsection
