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
						<td>{{ session('nama') }}</td>						
					</tr>
					<tr>
						<td>Data : Pelanggan</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>Tipe : Pembayaran No. {{$pembayaran->id}}</td>
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
						<th>Tgl Pembayaran</th>
						<th>Bulan Bayar</th>
						<th>Total Bayar</th>
						<th>Metode/Kode</th>
						<th>Disahkan</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>{{ \Carbon\Carbon::parse($pembayaran->tanggal_pembayaran)->toFormattedDateString() }}</td>
						<td>{{ $pembayaran->bulan_bayar }}</td>
						<td>Rp. {{ number_format(round($pembayaran->total_bayar, -3)) }}</td>
						<td>{{ $pembayaran->metode.'/'.$pembayaran->kode }}</td>
						<td>{{ $pembayaran->admin->nama }}</td>
					</tr>
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