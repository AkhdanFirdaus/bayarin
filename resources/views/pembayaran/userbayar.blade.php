@extends('userhome')

@section('title')
- Bayar
@endsection

@section('usercontent')	

<ul class="nav nav-pills nav-fill font-weight-bold h3 my-3" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="bayar-tab" data-toggle="tab" href="#bayar" role="tab" aria-controls="bayar" aria-selected="true">Bayar Semua</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="caraBayar-tab" data-toggle="tab" href="#caraBayar" role="tab" aria-controls="caraBayar" aria-selected="false">Bayar Per Tagihan</a>
    </li>
</ul>

<div class="tab-content">
    <div class="tab-pane fade show active" id="bayar" role="tabpanel" aria-labelledby="bayar-tab">
		<div class="card-group text-center">
		    <div class="card">
		        <div class="card-body text-primary">
		            <span class="d-block mb-4">
		                <i class="fas fa-credit-card fa-4x" data-fa-mask="fas fa-circle" data-fa-transform="shrink-5"></i>
		            </span>                                    
		            <h5 class="card-title">Transfer</h5>
		            <a class="card-link" href="#transferModal" data-toggle="modal" data-target="#transferModal">Kirimkan ke nomor rekening <u>berikut</u></a>
		        </div>
		    </div>
		    <div class="card">
		        <div class="card-body color-green">
		            <span class="d-block mb-4">
		                <i class="fas fa-wallet fa-4x" data-fa-mask="fas fa-circle" data-fa-transform="shrink-5"></i>
		            </span>                                    
		            <h5 class="card-title">Bayar Tunai</h5>
		            <a class="card-link" href="#tunaiModal" data-toggle="modal" data-target="#tunaiModal">Bayar dengan uang tunai di tempat <u>berikut</u></a>
		        </div>
		    </div>
		    <div class="card">
		        <div class="card-body color-yellow">
		            <span class="d-block mb-4">
		                <i class="fas fa-user fa-4x" data-fa-mask="fas fa-circle" data-fa-transform="shrink-4"></i>
		            </span>                                    
		            <h5 class="card-title">E-Bank</h5>
		            <a class="card-link" href="#akunModal" data-toggle="modal" data-target="#akunModal">Transfer uang dengan <u>akun anda</u></a>
		        </div>
		    </div>
		</div>
    </div>
    <div class="tab-pane fade" id="caraBayar" role="tabpanel" aria-labelledby="caraBayar-tab">
        <div class="p-3">
        	@if($pelanggan->tagihan->where('status', 'Lunas'))
        	@include('inc.bayarpertagihan')    		
        	@endif
        </div>
    </div>		    
</div>
@include('inc.bayarmodal')
@endsection