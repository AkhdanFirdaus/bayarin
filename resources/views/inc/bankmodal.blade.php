<div class="modal fade" id="dataPembayaran" tabindex="-1" role="dialog" aria-labelledby="dataPembayaranModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="dataPembayaranModal">Data Tagihan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive mt-3">
                  <table class="table table-striped bg-light">
                      <thead class="table-dark">
                          <tr>
                              <th scope="col">#</th>
                              <th scope="col">Tanggal Pembayaran</th>
                              <th scope="col">Bulan Bayar</th>             
                              <th scope="col">Total Bayar</th>
                              <th scope="col">Disahkan</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($pembayaran as $index => $pem)
                          <tr class="item{{$pem->id}}">
                              <td scope="col">{{ $index+1 }}</td>
                              <td scope="col">{{ \Carbon\Carbon::parse($pem->tanggal_pembayaran)->toFormattedDateString() }}</td>
                              <td scope="col">{{ $pem->bulan_bayar }}</td>
                              <td scope="col">Rp. {{ number_format($pem->total_bayar) }}</td>
                              <td scope="col">{{ $pem->admin->nama }}</td>
                          </tr>
                          @endforeach
                      </tbody>
                  </table>
              </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="dataTagihan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Data Tagihan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive mt-3">
                  <table class="table table-striped bg-light">
                      <thead class="table-dark">
                          <tr>
                              <th scope="col">#</th>
                              <th scope="col">Nama</th>
                              <th scope="col">Bulan/Tahun</th>
                              <th scope="col">Jumlah Penggunaan</th>                    
                              <th scope="col">Tagihan</th>
                              <th scope="col">Status</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($tagihan as $index => $tag)
                          <tr class="item{{$tag->id}}">
                              <td scope="col">{{ $index+1 }}</td>
                              <td scope="col">{{ $tag->pelanggan->nama }}</td>
                              <td scope="col">{{ $tag->bulan.'/'.$tag->tahun }}</td>
                              <td scope="col">{{ $tag->jumlah_meter }} Kwh</td>
                              <td scope="col">Rp. {{ number_format($tag->jumlah_meter * $tag->pelanggan->tarif->tarifperkwh) }}</td>
                              <td scope="col">
                                  @if($tag->status == 'Lunas')
                                  <span class="badge badge-success">Lunas</span>
                                  @elseif($tag->status == 'Konfirmasi')
                                  <span class="badge badge-warning">Konfirmasi</span>                        
                                  @elseif($tag->status == 'Belum Bayar')
                                  <span class="badge badge-danger">Belum Bayar</span>
                                  @endif
                              </td>
                          </tr>
                          @endforeach
                      </tbody>
                  </table>
              </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>