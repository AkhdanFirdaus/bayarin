<form action="{{ route('pelanggan.store') }}" method="POST">
    <div class="modal fade" id="pelangganAdd" tabindex="-1" role="dialog" aria-labelledby="pelangganAddTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable|modal-dialog-centered modal-sm|modal-lg|modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pelangganAddTitle">Tambah Pelanggan Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input id="nama" type="text" class="form-control" name="nama" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea id="alamat" type="text" class="form-control" name="alamat" required rows="5">

		                </textarea>
                            </div>
                            <div class="form-group">
                                <label for="tarif_id">Daya</label>
                                <select id="tarif_id" type="text" class="form-control" name="tarif_id">
                                    @foreach($tarifs as $tarif)
                                    <option value="{{ $tarif->id }}">{{ $tarif->daya }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="no_kwh">Nomor Kwh</label>
                                <input id="no_kwh" type="number" class="form-control yellow p-2" name="no_kwh" value="{{ $random['randomkwh'] }}">
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input id="username" type="text" class="form-control yellow p-2" name="username" value="{{ $random['randomusername'] }}">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" type="text" class="form-control yellow p-2" name="password" value="{{ $random['randompass'] }}">
                            </div>
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

<div class="modal fade" id="deletePengguna" tabindex="-1" role="dialog" aria-labelledby="deletePenggunaTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
        	<form id="deletepen" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <div class="modal-header">
                <h5 class="modal-title" id="deletePenggunaTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h4>Hapus <span class="nama"></span> ?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
            </div>
	        </form>
        </div>
    </div>
</div>
@section('script')
<script type="text/javascript">
$(document).ready(function() {
	$('.btndelpeng').on('click', function () {
		let id = $(this).data('id');
		$('#deletepen').attr("action", "pelanggan/"+id);
		$('#deletePengguna').modal('show');
		$('#deletePenggunaTitle').text($(this).data('nama'));
		$('.nama').text($(this).data('nama'));
	});
});
</script>
@endsection