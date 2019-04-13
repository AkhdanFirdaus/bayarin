<!-- Modal -->
<div class="modal fade" id="masukBayarForm" tabindex="-1" role="dialog" aria-labelledby="masukBayarFormTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
        <form action="{{ route('bayarform', $pelanggan->no_kwh) }}" method="POST">
            {{ csrf_field() }}
            <div class="modal-header">
                <h5 class="modal-title" id="masukBayarFormTitle">Bayar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="password">Password Akun</label>
                    <input type="password" name="password" id="password" class="form-control yellow">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>          
    </div>
  </div>
</div>

<div class="modal fade" id="riwayatBayarForm" tabindex="-1" role="dialog" aria-labelledby="riwayatBayarFormTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
        <form action="{{ route('riwayatbayar', $pelanggan->no_kwh) }}" method="POST">
            {{ csrf_field() }}
            <div class="modal-header">
                <h5 class="modal-title" id="riwayatBayarFormTitle">Lihat Riwayat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="password">Password Akun</label>
                    <input type="password" name="password2" id="password2" class="form-control yellow">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>          
    </div>
  </div>
</div>