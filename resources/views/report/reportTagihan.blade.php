<html>
<head>
	<title>Report Tagihan</title>
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
						<td>Data : Tagihan</td>
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
						<th>Bulan/Tahun</th>
						<th>Nomor Kwh</th>
						<th>Daya Rumah</th>
						<th>Nama</th>
					</tr>
				</thead>
				<tbody>
					@foreach($tagihans->where('status', 'Belum Bayar') as $index => $tagihan)
					<tr>
						<th>{{ $index+1 }}</th>
						<td>{{ $tagihan->bulan.'/'.$tagihan->tahun }}</td>
						<td>{{ $tagihan->pelanggan->no_kwh }}</td>
						<td>{{ $tagihan->jumlah_meter * $tagihan->pelangan->tarif->daya }}</td>
						<td>{{ $tagihan->pelanggan->nama }}</td>						
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