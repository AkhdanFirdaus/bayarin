@extends('layouts.app')

@section('style')
<style type="text/css">
    body {
        background-image: url({{asset('img/bright-bulb-color-929661.jpg')}});
        -webkit-background-size: cover;
        background-size: cover;
        background-position: center center;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="d-flex align-items-center justify-content-center vh-100">                    
                <div class="card-group text-center ">
                    <div class="card">
                        <div class="card-body text-primary">
                            <span class="d-block mb-4">
                                <i class="fas fa-eye fa-4x" data-fa-mask="fas fa-circle" data-fa-transform="shrink-4"></i>
                            </span>                                    
                            <p class="card-text">Lihat Tagihan Listrik Anda Saat Ini.</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body color-green">
                            <span class="d-block mb-4">
                                <i class="fas fa-dollar-sign fa-4x" data-fa-mask="fas fa-circle" data-fa-transform="shrink-4"></i>
                            </span>                                    
                            <p class="card-text">Bayar Tagihan Demi Kenyamanan Anda.</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body color-yellow">
                            <span class="d-block mb-4">
                                <i class="fas fa-bolt fa-4x" data-fa-mask="fas fa-circle" data-fa-transform="shrink-4"></i>
                            </span>                                    
                            <p class="card-text">Nikmati Listrik dan Gunakan Dengan Bijak.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="d-flex justify-content-center align-items-center vh-100">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="{{ asset('img/logo/logo.png') }}" alt="Logo" class="img-fluid img-thumbnail rounded-circle mx-auto" width="98px" style="margin-top: -72px;">    
                        </div>
                        <form action="{{ route('cekNoKwh') }}" method="GET">
                            {{ csrf_field() }}
                            <div class="card-text px-4 pt-4 pb-0">
                                <div class="form-group">
                                    <label for="no_kwh">Nomor Kwh</label>
                                    <input type="number" name="no_kwh" id="no_kwh" class="form-control p-4">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-block" id="cari">Cek Tagihan</button>
                                </div>
                            </div>
                        </form>                            
                    </div>
                    <div class="card-footer text-center">
                        <a class="btn btn-link text-decoration-none" href="{{ url('login') }}">Login</a>
                        <a class="btn btn-link text-decoration-none" href="{{ route('registeruser.show') }}">Register</a>
                    </div>
                </div>                
            </div>                
        </div>
    </div>
</div>
@if(session()->has('msg'))
@include('inc.toastmsg')
@endif
@endsection

@section('script')

@endsection