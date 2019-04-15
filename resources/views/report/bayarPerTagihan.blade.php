<html>
<head>
	<title>Bayar Tagihan bulan {{$bayar->tagihan->bulan}}</title>
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
						<th width="30%">{{ $bayar->pelanggan->nama }}</th>
					</tr>					
				</thead>
				<tbody>
					<tr>
						<td>Tanggal : {{ date('d-m-y') }}</td>
						<td>{{ $bayar->pelanggan->alamat }}</td>
					</tr>
					<tr>
						<td>
							<dl>
								<dt>Kode Pembayaran: {{ $request['kode'] }}</dt>
								<dt>Tipe Pembayaran: {{ $request['metode'] }}</dt>
							</dl>

						</td>
					</tr>										
				</tbody>
			</table>
		</section>
		<hr>
		<section>
			<table width="100%">
				<tbody>
					<tr>
						<td width="50%">
							<h3>Deskripsi</h3>
							<p>Bayar tagihan</p>
						</td>
						<td width="50%">
							<h3>Pembayaran Bulan</h3>
							<p>{{ $bayar->tagihan->bulan }}</p>
						</td>						
					</tr>
					<tr>
						<td>
							<h3>Penggunaan</h3>
							<p>{{ $bayar->tagihan->jumlah_meter }} Kwh</p>
						</td>
						<td>
							<h3>Daya Rumah</h3>
							<p>{{ $bayar->pelanggan->tarif->daya }} VA</p>
						</td>
					</tr>
					<tr>
						<td>
							<h3>Subtotal</h3>
							<p>Rp. {{ $bayar->tagihan->jumlah_meter * $bayar->pelanggan->tarif->tarifperkwh }}</p>
						</td>
						<td>
							<h3>Total</h3>
							<p>Rp. {{ number_format($bayar->tagihan->jumlah_meter * $bayar->pelanggan->tarif->tarifperkwh) }}</p>
						</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>
							<h3>Pembulatan</h3>
							<p>Rp. {{ number_format(round($bayar->tagihan->jumlah_meter * $bayar->pelanggan->tarif->tarifperkwh, -3)) }}</p>
						</td>
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