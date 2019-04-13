<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		* {
			font-family: 'Open Sans';
		}
		body {
			background-color: #DEDCDE;
		}
		.container {
			padding: 50px;
		}
		img.logo {
			width: 48px;
			height: 48px;
			border-radius: 50px;
			margin-right: 20px;
		}
		header {
			display: flex;
			align-items: center;
		}
		#client-info {
			display: flex;
			height: 150px;
			align-items: flex-start;
			justify-content: space-between;
		}
		.text-yellow {
			color: #FFDD7C;
			font-weight: bold;
		}
		.text-red {
			color: #E36755;
			font-weight: bold;
		}

		section.down {
			position: absolute;
			bottom: 0;
			left: 0;
			width: 100%;
			background-color: #D2CFC8;
			padding-top: 20px;			
		}
		.d-justify {
			display: flex;
			justify-content: space-around;
			text-align: center;
		}
		.d-footer {
			display: flex;
			justify-content: space-around;
			text-align: center;
			align-items: center;	
		}
		.d-block {
			display: block;
		}
		hr {
			margin-top: -10px;
			width: 75%;
		}
	</style>
</head>
<body>
	<div class="container">
		<header>
			<img src="{{asset('img/logo/logo.png')}}" class="logo">
			<h2>Bayarin</h2>
		</header>
		<section id="client-info">
			<dl>
				<h3 style="margin-bottom: 10px;">Client Name</h3>
				<dt>Tanggal : {{ \Carbon\Carbon::now()->format('d/m/y')}}</dt>
				<dt>Invoice No: 2</dt>
			</dl>
			<dl style="width: 25%; text-align: right;">
				<dt>{{ $pelanggan->nama }}</dt>
				<dt>{{ $pelanggan->alamat }}</dt>
			</dl>
		</section>
		<section>
			<div class="d-justify first">
				<div class="d-block">
					<h4>Deskripsi</h4>
					<p>Bayar semua tagihan tersisa</p>
				</div>
				<div class="d-block">
					<h4>Penggunaan</h4>
					<p>{{ $request['biaya_admin'] }}</p>
				</div>
				<div class="d-block">
					<h4>Subtotal</h4>
					<p class="text-red">{{ number_format($request['total_bayar']) }}</p>	
				</div>
			</div>
		</section>
		<section class="down">
			<div class="d-justify">
				<div class="d-block">
					<h4>Tanggal</h4>
					<h2>{{ \Carbon\Carbon::now()->toFormattedDateString() }}</h2>
				</div>

				<div class="d-block">
					<h4>Total</h4>
					<h2>{{ number_format($request['total_bayar']) }}</h2>
				</div>
				
				<div class="d-block">
					<h4>Pembulatan</h4>
					<h2 class="text-red">{{ number_format(round($request['total_bayar'], -3)) }}</h2>
				</div>				
			</div>
			<hr>
			<div class="d-footer">
				<h2>Terima kasih</h2>
				<div class="d-block">
					Akhdan Firdaus
				</div>
			</div>
			
		</section>
	</div>
</body>
</html>