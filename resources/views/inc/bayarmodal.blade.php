@php
$bulan = \Carbon\Carbon::now()->format("M");
$tanggal = \Carbon\Carbon::now()->toDateTimeString();
$tgl = \Carbon\Carbon::now()->toFormattedDateString();
$administrasi = round($total * 0.01);
$kode = \Faker\Factory::create()->ean8;
@endphp
<div class="modal fade" id="transferModal" tabindex="-1" role="dialog" aria-labelledby="transferModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form action="{{ route('pembayaran.bayarSemua', $pelanggan->no_kwh) }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h5 class="modal-title" id="transferModalTitle">Transfer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <span class="badge badge-info">List Bank</span>
                            <div class="list-unstyled">
                                <div class="media mb-4">
                                    <img src="{{ asset('img/logo/logo mandiri.png') }}" class="mr-3 img-fluid align-self-center" alt="mandiri" width="84px">
                                    <div class="media-body">
                                        <h5 class="mt-0 color-yellow">Bank Mandiri</h5>
                                        <strong>102-00-0526387-3</strong>
                                    </div>
                                    <button type="button" class="btn cusbg-orange text-white btn-lg"><i class="fas fa-copy"></i></button>
                                </div>
                                <div class="media mb-4">
                                    <img src="{{ asset('img/logo/logo bni.png') }}" class="mr-3 img-fluid align-self-center" alt="mandiri" width="84px">
                                    <div class="media-body">
                                        <h5 class="mt-0 color-yellow">Bank BNI</h5>
                                        <strong>0358181212</strong>
                                    </div>
                                    <button type="button" class="btn cusbg-orange text-white btn-lg"><i class="fas fa-copy"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">                            
                            <input type="hidden" name="tagihan_id" value="">
                            <input type="hidden" name="pelanggan_id" value="{{ $pelanggan->id }}">
                            <input type="hidden" name="tanggal_pembayaran" value="{{ $tanggal }}">
                            <div class="row">
                                <dl class="col-6">
                                    <dd class="badge badge-info">Kode Transaksi</dd>
                                    <dt class="red p-2 d-block">{{ $kode }}</dt>
                                    <input type="hidden" name="bulan_bayar" value="{{ $bulan }}">
                                </dl>
                                <dl class="col-6">
                                    <dd class="badge badge-info">Tanggal Hari Ini</dd>
                                    <dt class="yellow p-2 d-block">{{ $tgl }}</dt>
                                    <input type="hidden" name="bulan_bayar" value="{{ $bulan }}">
                                </dl>                                
                            </div>
                            <div class="row">
                                <dl class="col-6">
                                    <dd class="badge badge-info">Total Pembayaran Pemakaian</dd>
                                    <dt class="yellow p-2 d-block">Rp. {{ number_format($total) }}</dt>
                                </dl>
                                <dl class="col-6">
                                    <dd class="badge badge-info">Biaya administrasi</dd>
                                    <dt class="yellow p-2 d-block">Rp. {{ number_format($administrasi) }}</dt>
                                    <input type="hidden" name="biaya_admin" value="{{ $administrasi }}">
                                </dl>
                            </div>
                            <dl>
                                <dd class="badge badge-info">Total Pembayaran</dd>
                                <dt class="yellow p-2 d-block">Rp. {{ number_format($total + $administrasi) }} <span class="badge badge-info">Pembulatan</span> <u>Rp. {{ number_format(round($total + $administrasi, -3)) }}</u></dt>
                                <input type="hidden" name="total_bayar" value="{{ $total + $administrasi }}">
                            </dl>
                            <input type="hidden" name="metode" value="Transfer">
                            <input type="hidden" name="kode" value="{{ $kode }}">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Bayar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="tunaiModal" tabindex="-1" role="dialog" aria-labelledby="tunaiModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="{{ route('pembayaran.bayarTunai', $pelanggan->no_kwh) }}" method="POST">
            {{ csrf_field() }}
            <div class="modal-header">
                <h5 class="modal-title" id="tunaiModalTitle">Tunai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="text-center">
                        <img src="{{ asset('img/logo/alfamart.png') }}" alt="" class="img-fluid" style="width: 120px;">
                        <img src="{{ asset('img/logo/indomaret.png') }}" alt="" class="img-fluid" style="width: 120px;">
                    </div>
                    <hr>
                    <input type="hidden" name="tagihan_id2" value="">
                    <input type="hidden" name="pelanggan_id2" value="{{ $pelanggan->id }}">
                    <input type="hidden" name="tanggal_pembayaran2" value="{{ $tanggal }}">
                    <input type="hidden" name="bulan_bayar2" value="{{ $bulan }}">
                    <input type="hidden" name="biaya_admin2" value="{{ $administrasi }}">
                    <div class="form-row">
                        <div class="col">
                            <span class="badge badge-info">Total Pembayaran</span>
                            <input type="number" class="form-control blue" value="{{ round($total + $administrasi, -3) }}" required="required" disabled="disabled">
                            <input type="hidden" name="total_bayar2" value="{{ round($total + $administrasi, -3) }}" required="required">
                        </div>
                        <div class="col">
                            <span class="badge badge-info">Bulan</span>
                            <span class="yellow p-2 d-block rounded">{{ $bulan }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <span for="kode" class="badge badge-danger">Kode Pembayaran</span>
                        <span class="p-2 red d-block">{{ $kode }}</span>
                        <input type="hidden" name="kode2" id="kode2" class="form-control yellow" value="{{ $kode }}">
                    </div>                  
                    <input type="hidden" name="metode2" value="Tunai">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Bayar</button>
            </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="akunModal" tabindex="-1" role="dialog" aria-labelledby="akunModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="{{ route('pembayaran.bayarBank', $pelanggan->no_kwh) }}" method="POST">
            {{ csrf_field() }}
            <div class="modal-header">
                <h5 class="modal-title" id="akunModalTitle">E-Bank</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">                
                <div class="container">
                    <span class="text-center d-block mb-2">
                        <i class="fas fa-user fa-4x" data-fa-mask="fas fa-circle" data-fa-transform="shrink-3"></i>
                    </span>
                    <input type="hidden" name="tagihan_id3" value="">
                    <input type="hidden" name="pelanggan_id3" value="{{ $pelanggan->id }}">
                    <input type="hidden" name="tanggal_pembayaran3" value="{{ $tanggal }}">
                    <input type="hidden" name="bulan_bayar3" value="{{ $bulan }}">          
                    <input type="hidden" name="biaya_admin3" value="{{ $administrasi }}">
                    <div class="form-row">
                        <div class="col">
                            <span class="badge badge-info">Total Pembayaran</span>
                            <input type="number" class="form-control blue" value="{{ round($total + $administrasi, -3) }}" required="required" disabled="disabled">
                            <input type="hidden" name="total_bayar3" value="{{ round($total + $administrasi, -3) }}" required="required">
                        </div>
                        <div class="col">
                            <span class="badge badge-info">Bulan</span>
                            <span class="yellow p-2 d-block rounded">{{ $bulan }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="kode">Nomor Rekening</label>
                        <input type="text" name="kode3" id="kode" class="form-control yellow" placeholder="Masukkan nomor rekening anda" required="required">
                    </div>                    
                    <div class="form-group">
                        <label for="admin_id">Bank</label>
                        <select id="admin_id" class="form-control">
                            <option>Pilih Bank</option>
                            <option value="Mandiri">Mandiri</option>
                            <option value="BNI">BNI</option>
                            <option value="BRI">BRI</option>
                        </select>
                        <input type="hidden" name="metode3" value="Bank">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Bayar</button>
            </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="modalPerTagihan" tabindex="-1" role="dialog" aria-labelledby="modalPerTagihanTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form action="{{ route('pembayaran.bayarpertagihan', $pelanggan->no_kwh) }}" method="POST">
            {{ csrf_field() }}
            <div class="modal-header">
                <h5 class="modal-title" id="modalPerTagihanTitle">Bayar per Tagihan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <span class="badge badge-info">List Bank</span>
                        <div class="list-unstyled">
                            <div class="media mb-4">
                                <img src="{{ asset('img/logo/logo mandiri.png') }}" class="mr-3 img-fluid align-self-center" alt="mandiri" width="84px">
                                <div class="media-body">
                                    <h5 class="mt-0 color-yellow">Bank Mandiri</h5>
                                    <strong>102-00-0526387-3</strong>
                                </div>
                                <button type="button" class="btn cusbg-orange text-white btn-lg"><i class="fas fa-copy"></i></button>
                            </div>
                            <div class="media mb-4">
                                <img src="{{ asset('img/logo/logo bni.png') }}" class="mr-3 img-fluid align-self-center" alt="mandiri" width="84px">
                                <div class="media-body">
                                    <h5 class="mt-0 color-yellow">Bank BNI</h5>
                                    <strong>0358181212</strong>
                                </div>
                                <button type="button" class="btn cusbg-orange text-white btn-lg"><i class="fas fa-copy"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">                            
                        <input type="hidden" name="tagihan_id">
                        <input type="hidden" name="pelanggan_id" value="{{ $pelanggan->id }}">
                        <input type="hidden" name="tanggal_pembayaran" value="{{ $tanggal }}">
                        <div class="row">
                            <dl class="col-6">
                                <dd class="badge badge-info">Kode Transaksi</dd>
                                <dt class="red p-2 d-block">{{ $kode }}</dt>
                                <input type="hidden" name="bulan_bayar" value="{{ $bulan }}">
                            </dl>
                            <dl class="col-6">
                                <dd class="badge badge-info">Bulan</dd>
                                <dt class="yellow p-2 d-block bln">{{ $tgl }}</dt>
                                <input type="hidden" name="bulan_bayar" value="{{ $bulan }}">
                            </dl>                                
                        </div>
                        <div class="row">
                            <dl class="col-6">
                                <dd class="badge badge-info">Total Pembayaran Pemakaian</dd>
                                <dt class="yellow p-2 d-block ttl"></dt>
                            </dl>
                            <dl class="col-6">
                                <dd class="badge badge-info">Biaya administrasi</dd>
                                <dt class="yellow p-2 d-block adm"></dt>
                                <input type="hidden" name="biaya_admin">
                            </dl>
                        </div>
                        <dl>
                            <dd class="badge badge-info">Total Pembayaran</dd>
                            <dt class="yellow p-2 d-block"><span class="ttl_byrs"></span></dt>
                            <input type="hidden" name="total_bayar">
                        </dl>
                        <input type="hidden" name="metode" value="Transfer">
                        <input type="hidden" name="kode" value="{{ $kode }}">
                    </div>
                </div>  
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="btnbayarpertagihan">Bayar</button>
            </div>
            </form>
        </div>
    </div>
</div>