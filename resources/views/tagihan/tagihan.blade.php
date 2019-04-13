@extends('home')

@section('title')
- Tagihan
@endsection

@section('admincontent')
<div class="container">           
    <ol class="breadcrumb">
        <li class="breadcrumb-item active">
            <h4>Tagihan</h4>
        </li>
        <li class="ml-auto d-flex">
        	<form method="POST" action="{{ route('reportTagihan') }}">
                            {{ csrf_field() }}
	            <button type="submit" class="btn btn-default" data-toggle="modal" data-target="#tagihanAdd"><i class="fas fa-print fa-lg"></i></button>
	        </form>
            <a href="#tagihanAdd" class="btn btn-default" data-toggle="modal" data-target="#tagihanAdd"><i class="fas fa-plus fa-lg"></i></a>
        </li>
    </ol>
    <div class="card-deck">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <i class="fas fa-cash-register fa-4x text-primary"></i>
                    <div class="ml-auto display-4 pull-right">{{ $tagihans->count() }}</div>
                </div>                                
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <i class="fas fa-dollar-sign fa-4x color-green"></i>
                    <div class="ml-auto h3 pull-right">{{ $tagihans->where('status', 'Lunas')->sum('jumlah_meter') }}</div>
                </div>                                
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <i class="fas fa-dollar-sign fa-4x color-red"></i>
                    <div class="ml-auto display-4 pull-right">{{ $tagihans->where('status', 'Belum Bayar')->sum('jumlah_meter') }}</div>
                </div>                                
            </div>
        </div>
    </div>
    <div class="table-responsive mt-3">
        <table class="table table-striped bg-light">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Bulan/Tahun</th>
                    <th scope="col">Jumlah Penggunaan</th>                    
                    <th scope="col">Tagihan</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tagihans as $index => $tagihan)
                <tr>
                    <td scope="col">{{ $index+1 }}</td>
                    <td scope="col">{{ $tagihan->pelanggan->nama }}</td>
                    <td scope="col">{{ $tagihan->bulan.'/'.$tagihan->tahun }}</td>
                    <td scope="col">{{ $tagihan->jumlah_meter }} Kwh</td>
                    <td scope="col">Rp. {{ number_format($tagihan->jumlah_meter * $tagihan->pelanggan->tarif->tarifperkwh) }}</td>
                    <td scope="col">
                        @if($tagihan->status = 'Belum Bayar')
                        <span class="badge badge-danger">Belum Bayar</span>
                        @elseif($tagihan->status = 'Konfirmasi')
                        <span class="badge badge-warning">Konfirmasi</span>
                        @elseif($tagihan->status = 'Lunas')
                        <span class="badge badge-success">Lunas</span>
                        @endif
                    </td>                    
                    <td scope="col">
                        <a class="btn btn-primary tagihanitem" href="#tagihanItemModal" data-id="{{ $tagihan->id }}" data-pelanggan-nama="{{ $tagihan->pelanggan->nama }}" data-bulan="{{ $tagihan->bulan }}" data-tahun="{{ $tagihan->tahun }}" data-jumlah_meter="{{ $tagihan->jumlah_meter }}" data-tarifperkwh="{{ $tagihan->pelanggan->tarif->tarifperkwh }}"><i class="fas fa-eye"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@include('inc.tagihanmodal')
@endsection