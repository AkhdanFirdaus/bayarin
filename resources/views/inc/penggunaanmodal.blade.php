<form action="{{ route('penggunaan.store', $pelanggan->id) }}" method="POST">
    <div class="modal fade" id="penggunaanAddModal" tabindex="-1" role="dialog" aria-labelledby="penggunaanAddModalTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="penggunaanAddModalTitle">Tambah tagihan Baru</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-6">
                <input type="hidden" name="pelanggan_id" value="{{ $pelanggan->id }}">                    
                    <div class="form-group">               
                        <label for="bulan">Bulan Penggunaan</label>
                        <select id="bulan" class="form-control" name="bulan">
                            <option>Pilih Bulan</option>
                            <option value="Januari">Januari</option>
                            <option value="Februari">Februari</option>
                            <option value="Maret">Maret</option>
                            <option value="April">April</option>
                            <option value="Mei">Mei</option>
                            <option value="Juni">Juni</option>
                            <option value="Juli">Juli</option>
                            <option value="Agustus">Agustus</option>
                            <option value="September">September</option>
                            <option value="Oktober">Oktober</option>
                            <option value="November">November</option>
                            <option value="Desember">Desember</option>
                        </select>
                    </div>   
                    <div class="form-group">               
                        <label for="tahun">Tahun</label>
                        <span class="d-block yellow p-2" id="tahun">{{ \Carbon\Carbon::now()->format('Y') }}</span>
                        <input type="hidden" name="tahun" value="{{ \Carbon\Carbon::now()->format('Y') }}">
                    </div>
                </div>          
                <div class="col-md-6">
                    @php
                        $penggunaan = $pelanggan->penggunaan->last();
                    @endphp
                    <div class="form-group">               
                        <label for="meter_awal">Meter Awal</label>                        
                        @if($penggunaan)
                        <span id="meter_awal" class="d-block yellow p-2">{{ $penggunaan->meter_awal }}</span>
                        <input type="hidden" name="meter_awal" value="{{ $penggunaan->meter_awal }}">
                        @else
                        <input type="number" name="meter_awal" value="" class="form-control yellow">
                        @endif
                    </div>
                    <div class="form-group">               
                        <label for="meter_akhir">Meter Akhir</label>                        
                        <input type="number" name="meter_akhir" class="form-control yellow" required="required">
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