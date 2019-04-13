<html>
<head>
	<title>Bayar Semua Tagihan</title>
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
						<th width="30%"><?= $pelanggan->nama ?></th>
					</tr>					
				</thead>
				<tbody>
					<tr>
						<td>Tanggal : <?= date('d-m-y') ?></td>
						<td><?= $pelanggan->alamat ?></td>
					</tr>
					<tr>
						<td>
							<dl>
								<dt>Kode Pembayaran: <?= $request['kode'] ?></dt>
								<dt>Tipe Pembayaran: <?= $request['metode'] ?></dt>
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
						<td width="25%">
							<dl>
								<h3>Deskripsi</h3>
								<p>Bayar semua tagihan tersisa</p>
							</dl>
							<dl>
								<h3>Penggunaan</h3>
								<p><?= $pelanggan->tagihan->sum('jumlah_meter') ?> Kwh</p>
							</dl>
							<dl>
								<h3>Subtotal</h3>
								<p>Rp. <?= $pelanggan->tagihan->sum('jumlah_meter') * $pelanggan->tarif->tarifperkwh ?></p>
							</dl>
						</td>
						<td width="25%">&nbsp;</td>
						<td width="25%">&nbsp;</td>
						<td width="25%">
							<br><br><br>
							<dl>
								<h3>Terhitung Bulan</h3>
								<p><?= $pelanggan->tagihan->first()->bulan.' sampai '. $pelanggan->tagihan->last()->bulan ?></p>
							</dl>
							<dl>
								<h3>Daya Rumah</h3>
								<p><?= $pelanggan->tarif->daya ?> VA</p>
							</dl>
							<dl>
								<h3>Total</h3>
								<p><?= number_format($pelanggan->tagihan->sum('jumlah_meter') * $pelanggan->tarif->tarifperkwh) ?></p>
							</dl>
							<dl>
								<h3>Pembulatan</h3>
								<p>Rp. <?= number_format(round($pelanggan->tagihan->sum('jumlah_meter') * $pelanggan->tarif->tarifperkwh, -3)) ?></p>
							</dl>
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