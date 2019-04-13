@extends('userhome')
@section('usercontent')
<div class="card">
    <div class="card-body">
        <div class="list-group-flush">
            <div class="list-group-item">
                <div class="d-flex justify-content-between">
                    <h3>Data Penggunaan</h3>
                    <a href="penggunaanAddModal" class="btn btn-primary" data-toggle="modal" data-target="#penggunaanAddModal"><i class="fas fa-plus"></i></a>
                </div>
            </div>
            @foreach($pelanggan->tagihan as $index => $tagihan)
            @if($tagihan->status == 'Belum Bayar')
            <div class="list-group-item">
                <div class="row">
                    <div class="col-md-5">
                        <div class="d-block">
                            <h4 class="font-weight-bold color-yellow">{{ $tagihan->bulan }}</h4>
                            {{ \Carbon\Carbon::now()->toFormattedDateString() }}
                        </div>
                    </div>
                    <div class="col md-5 d-flex align-items-center">
                        <div class="d-block">
                            <i class="fas fa-money-bill-alt fa-2x color-green mr-2"></i>
                            <span class="font-weight-bold h5">Rp. {{ number_format($tagihan->jumlah_meter * $tagihan->pelanggan->tarif->tarifperkwh) }}</span>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn cusbg-green"><i class="fas fa-money-bill fa-2x text-white"></i></button>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</div>
@include('inc.penggunaanmodal')
@endsection