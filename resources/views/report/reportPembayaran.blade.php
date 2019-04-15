<html>
<head>
	<title>Report Pembayaran</title>
</head>
<body>
	<div class="container">
		<header>
			<h2>Bayarin</h2>
		</header>
		<section id="client-info">
			<table width="100%">
				<thead>
					<tr>
						<th width="70%">Laporan</th>
						<th width="30%">Diminta Oleh</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Tanggal : {{ date('d-m-y') }}</td>
						<td>{{ $request->user()->nama }}</td>						
					</tr>
					<tr>
						<td>Data : Pembayaran</td>
						<td>{{ $request->user()->level }}</td>
					</tr>
					<tr>
						<td>Tipe : Keseluruhan</td>
						<td>&nbsp;</td>
					</tr>	
				</tbody>
			</table>
		</section>
		<hr>
		<section>
			<table width="100%">
				<thead align="left">
					<tr>
						<th>#</th>
						<th>Nama</th>
						<th>Tanggal Pembayaran</th>
						<th>Bulan Bayar</th>
						<th>Total Bayar</th>
						<th>Metode</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					@foreach($pembayarans as $index => $pembayaran)
					<tr>
						<th>{{ $index+1 }}</th>
						<td>{{ $pembayaran->nama }}</td>
						<td>{{ \Carbon\Carbon::parse($pembayaran->tanggal_pembayaran)->toFormattedDateString() }}</td>
						<td>{{ $pembayaran->bulan_bayar }}</td>
						<td>{{ number_format(round($pembayaran->total_bayar, -3)) }}</td>
						<td>{{ $pembayaran->metode }}</td>						
						<td>@if($pembayaran->admin_id != null) Lunas @else Konfirmasi @endif</td>
					</tr>
					@endforeach
				</tbody>
			</table>		
		</section>
		<br>
		<hr>
		<br>
		<section>
			<table width="100%">
				<thead align="center">
					<tr>
						<td>Terima kasih</td>
						<td>Akhdan Firdaus</td>
					</tr>
				</tbody>
			</table>
		</section>
	</div>
</body>
</html>