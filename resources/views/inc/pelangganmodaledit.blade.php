<!-- Modal -->
<form action="{{ route('pelanggan.update', $pelanggan->id) }}" method="POST">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <div class="modal fade" id="pelangganEdit" tabindex="-1" role="dialog" aria-labelledby="pelangganEditTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pelangganEditTitle">Edit Pelanggan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input id="nama" type="text" class="form-control blue" name="nama" required autofocus value="{{ $pelanggan->nama }}">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea id="alamat" type="text" class="form-control blue" name="alamat" required rows="5">{{ $pelanggan->alamat }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tarif_id">Daya</label>
                                <select id="tarif_id" type="text" class="form-control yellow" name="tarif_id">
                                    @foreach($tarifs as $tarif)
                                    <option value="{{ $tarif->id }}">{{ $tarif->daya }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="no_kwh">Nomor Kwh</label>
                                <input id="no_kwh" type="text" class="form-control yellow" name="no_kwh" value="{{ $pelanggan->no_kwh }}">
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input id="username" type="text" class="form-control yellow" name="username" value="{{ $pelanggan->username }}">
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