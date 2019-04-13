<div class="accordion" id="accordionExample">
    <div class="card">
        <div class="card-header" id="headingOne">
            <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    Daftar Tagihan - <span class="badge badge-danger font-weight-bold">Belum Dibayar</span>
                </button>
            </h2>
        </div>
        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
                <div class="list-group-flush">
                    @foreach($pelanggan->tagihan->where('status', 'Belum Bayar') as $index => $tagihan)
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
                        </div>
                    </div>
                    @endforeach
                    <div class="list-group-item">
                        <div class="d-flex justify-content-end">
                            <div class="mr-3">Total</div>
                            <span class="font-weight-bold h5">Rp. {{ number_format(($pelanggan->tagihan->where('status', 'Belum Bayar')->sum('jumlah_meter') * ($pelanggan->tarif->tarifperkwh))) }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingTwo">
            <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Daftar Tagihan Tunggu - <span class="badge badge-warning font-weight-bold">Belum dikonfirmasi Admin</span>
                </button>
            </h2>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
            <div class="card-body">
                <div class="list-group-flush">
                    @foreach($pelanggan->tagihan->where('status', 'Konfirmasi') as $index => $tagihan)
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
                        </div>
                    </div>
                    @endforeach
                    <div class="list-group-item">
                        <div class="d-flex justify-content-end">
                            <div class="mr-3">Total</div>
                            <span class="font-weight-bold h5">Rp. {{ number_format(($pelanggan->tagihan->where('status', 'Konfirmasi')->sum('jumlah_meter') * ($pelanggan->tarif->tarifperkwh))) }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingThree">
            <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Daftar Bukti Tagihan - <span class="badge badge-success font-weight-bold">Lunas</span>
                </button>
            </h2>
        </div>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
            <div class="card-body">
                <div class="list-group-flush">
                    @foreach($pelanggan->tagihan->where('status', 'Lunas') as $index => $tagihan)
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
                                <button class="btn cusbg-orange"><i class="fas fa-print fa-2x text-white"></i></button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>