<!-- Modal -->
<form action="{{ route('tagihan.store') }}" method="POST">
    <div class="modal fade" id="tagihanAdd" tabindex="-1" role="dialog" aria-labelledby="tagihanAddTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tagihanAddTitle">Tambah tagihan Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" name="pelanggan_id">
                            <div class="form-group">
                                <label for="penggunaan_id">Bulan Penggunaan</label>
                                <select id="penggunaan_id" class="form-control" name="penggunaan_id">
                                    <option>Pilih Penggunaan</option>
                                    @foreach($penggunaans as $penggunaan)
                                    <option value="{{ $penggunaan->id }}">{{ $penggunaan->bulan }}</option>
                                    @endforeach
                                </select>
                                <input type="hidden" name="bulan">
                            </div>
                            <div class="form-group">
                                <label for="tahun">Tahun</label>
                                <span class="d-block yellow p-2" id="tahun">Tahun</span>
                                <input type="hidden" name="tahun">
                            </div>
                            <div class="form-group">
                                <label for="atasnama">a. n.</label>
                                <span class="d-block yellow p-2" id="atasnama">Atas Nama</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="no_kwh">Jumlah Penggunaan</label>
                                <span id="jumlah_penggunaan" class="d-block yellow p-2">Jumlah Meteran</span>
                                <input type="hidden" name="jumlah_meter">
                            </div>
                            <div class="form-group">
                                <label for="tarif">Tarif</label>
                                <span id="tarif" class="d-block yellow p-2">Tarif</span>
                            </div>
                            <div class="form-group">
                                <label for="total">Total Tagihan <small class="badge badge-info">jumlah penggunaan * tarif</small></label>
                                <span id="total" class="d-block red p-2">Total Tagihan</span>
                                <input type="hidden" name="jumlah_meter">
                            </div>
                            <input type="hidden" name="status" value="Belum Bayar">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</form>

<div class="modal fade" id="tagihanItemModal" tabindex="-1" role="dialog" aria-labelledby="tagihanItemModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tagihanItemModalTitle">Tagihan Nomor <span class="badge badge-info" id="tagihanno"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
        		<h4 class="font-weight-bold color-yellow" id="bulanmodal"></h4>
                <span id="tahunmodal"></span>
                <hr>
                <div class="d-flex justify-content-between">
                	<span class="font-weight-bold h5" id="jumlahmetermodal"></span>
                    <span class="font-weight-bold h5" id="totalbayarmodal"></span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger" id="btndel"><i class="fas fa-trash"></i></button> 
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@include('inc.toastmsg')

@section('script')
<script type="text/javascript">
$(document).ready(function() {
    $('select[name="penggunaan_id"]').on('change', function() {
        var penggunaanId = $(this).val();
        var tarifId = $('#tarif').text();

        if (penggunaanId) {
            $.ajax({
                url: 'api/detailPenggunaan/' + penggunaanId,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    let jumlah_meter = Math.abs(data.DATA.meter_akhir - data.DATA.meter_awal);
                    let totalbayar = data.DATA.pelanggan.tarif.tarifperkwh * (jumlah_meter);
                    $('#tahun').text(data.DATA.tahun);
                    $('#jumlah_penggunaan').text(jumlah_meter);
                    $('#total').text(totalbayar);
                    $('#atasnama').text(data.DATA.pelanggan.nama);
                    $('#tarif').text(data.DATA.pelanggan.tarif.tarifperkwh);

                    $('[name="pelanggan_id"]').val(data.DATA.pelanggan_id);
                    $('[name="bulan"]').val(data.DATA.bulan);
                    $('[name="tahun"]').val(data.DATA.tahun);
                    $('[name="jumlah_meter"]').val(jumlah_meter);
                }
            });
        }
    });
    $('.tagihanitem').on('click', function () {
    	var data = Object.values($(this).data());
    	console.log(data);
    	$('#tagihanItemModal').modal('show');
    	$('#tagihanno').text(data[5]);
    	$('#bulanmodal').text(data[3]);
    	$('#tahunmodal').text(data[2]);
    	$('#jumlahmetermodal').text(data[1]+' Kwh');
    	$('#totalbayarmodal').text('Rp. '+data[1] * data[0]);        
    });

    $('#btndel').on('click', function () {
        var id = $('#tagihanno').text();
        var token = $("meta[name='csrf-token']").attr("content");
        $.ajax({            
            type: 'DELETE',
            dataType: 'JSON',
            data: {_token: token},
            url: "tagihan/" + id,
            success: function (data) {
                $('.item' + data['id']).remove();
                $('#tagihanItemModal').modal('hide');
                $('.toast').toast('show');
                $('.toast-body').text("Berhasil menghapus tagihan no "+id);
            }
        });
        return false;
    });
});
</script>
@endsection