@extends('userhome')

@section('title')
- Data Penggunaan
@endsection

@section('usercontent')
<div class="accordion" id="accordionPenggunaan">
    <div class="card">
        <div class="card-header" id="headingOne">
            <h2 class="mb-0 d-flex justify-content-between">
                <button class="btn btn-default collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    Data Penggunaan
                </button>
                <a href="penggunaanAddModal" class="btn btn-primary" data-toggle="modal" data-target="#penggunaanAddModal"><i class="fas fa-plus"></i></a>
            </h2>                    
        </div>
        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionPenggunaan">
            <div class="card-body">
                <div class="list-group-flush">
                    @foreach($pelanggan->penggunaan as $index => $penggunaan)
                    <div class="list-group-item">
                        <div class="row">
                            <div class="col">
                                <div class="d-block">
                                    <h4 class="font-weight-bold color-yellow">{{ $penggunaan->bulan }}</h4>
                                    {{ $penggunaan->tahun }}
                                </div>
                            </div>
                            <div class="col-2 text-center">
                                <span class="badge badge-info">Meter Awal</span>
                                <div class="d-block">
                                    <span class="font-weight-bold h5">{{ $penggunaan->meter_awal }}</span>
                                </div>
                            </div>
                            <div class="col-2 text-center">
                                <span class="badge badge-info">Meter Akhir</span>
                                <div class="d-block">
                                    <span class="font-weight-bold h5">{{ $penggunaan->meter_akhir }}</span>
                                </div>
                            </div>
                            <div class="col text-center">
                                <span class="badge badge-danger">Jumlah Meter</span>
                                <div class="d-block">
                                    <span class="font-weight-bold h5">{{ abs($penggunaan->meter_akhir - $penggunaan->meter_awal) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@include('inc.toastmsg')
@endsection