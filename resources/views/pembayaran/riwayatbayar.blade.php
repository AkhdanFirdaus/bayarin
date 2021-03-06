@extends('userhome')

@section('title')
- Riwayat Bayar
@endsection

@section('usercontent')
@if($pelanggan->tagihan->count() > 0)
<div class="accordion" id="accordionExample">
    <div class="card">
        <div class="card-header" id="headingOne">
            <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    Daftar Riwayat Pembayaran Anda - <span class="badge badge-info font-weight-bold">{{ $pelanggan->pembayaran->count() }}</span>
                </button>
            </h2>
        </div>
        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
                <div class="list-group-flush">
                    @foreach($pelanggan->pembayaran as $index => $pembayaran)
					<div class="list-group-item">
						<div class="d-flex justify-content-between">
							<div class="d-block">
								@if($pembayaran->tagihan != null)
								<h4 class="font-weight-bold color-yellow">{{ $pembayaran->tagihan->bulan }}</h4>
								@else
								<h4 class="font-weight-bold color-yellow">{{ $pembayaran->bulan_bayar }}</h4>
								@endif
								{{ \Carbon\Carbon::parse($pembayaran->tanggal_pembayaran)->format("d/m/Y") }}
							</div>
							<div class="d-flex align-items-center">
								<i class="fas fa-money-bill-alt fa-2x color-green mr-2"></i>
								<div class="d-block">						
									<span class="font-weight-bold h5">Rp. {{ number_format(round($pembayaran->total_bayar, -3)) }}</span>
								</div>
							</div>
							@if($pembayaran->admin_id != null)
							<div class="d-flex align-items-center">
								<form action="{{ route('reportPembayaranID', $pembayaran->id) }}" method="POST">
									{{ csrf_field() }}
									<button type="submit" class="btn cusbg-orange"><i class="fas fa-print fa-2x text-white"></i></button>
								</form>
							</div>
							@endif
						</div>
					</div>
					@endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@else
<div class="card">
    <div class="card-body">Anda Tidak Punya Riwayat Pembayaran</div>
</div>
@endif
@endsection