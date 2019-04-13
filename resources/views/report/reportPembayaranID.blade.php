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
						<td>Data : Pelanggan</td>
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
						<th>Alamat</th>
						<th>Daya Rumah</th>
						<th>Nomor KWH</th>
					</tr>
				</thead>
				<tbody>
{{-- 					@foreach($pelanggans as $index => $pelanggan) --}}
					<tr>
						<th>{{ $index+1 }}</th>
						<td>{{ $pelanggan->nama }}</td>
						<td>{{ $pelanggan->alamat }}</td>
						<td>{{ $pelanggan->tarif->daya }}</td>
						<td>{{ $pelanggan->no_kwh }}</td>
					</tr>
					{{-- @endforeach --}}
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