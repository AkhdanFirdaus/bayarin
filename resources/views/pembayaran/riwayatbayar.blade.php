@extends('userhome')

@section('title')
- Riwayat Bayar
@endsection

@section('usercontent')
<div class="card mt-3">
	<div class="card-body">
		<i class="fas fa-credit-card fa-2x color-red"></i> Riwayat Pembayaran Anda : {{ $pelanggan->pembayaran->count() }}
	</div>

	<div class="list-group-flush">
		@foreach($pelanggan->pembayaran as $index => $pembayaran)
		<div class="list-group-item">
			<div class="d-flex justify-content-between">
				<div class="d-block">
					<h4 class="font-weight-bold color-yellow">{{ $pembayaran->bulan_bayar }}</h4>
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
					<i class="fas fa-user-cog-alt fa-2x text-primary mr-2"></i>
					<div class="d-block">						
						<span class="font-weight-bold h5">Rp. {{ number_format(round($pembayaran->total_bayar, -3)) }}</span>
					</div>
				</div>
				@endif
				<div class="d-flex align-items-center">
					<form action="{{ route('reportPembayaranID', $pembayaran->id) }}" method="POST">
						{{ csrf_field() }}
						<button type="submit" class="btn cusbg-orange"><i class="fas fa-print fa-2x text-white"></i></button>
					</form>
				</div>
			</div>
		</div>
		@endforeach
	</div>
</div>
@endsection