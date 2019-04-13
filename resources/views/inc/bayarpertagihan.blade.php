<div class="list-group-flush" id="list">
    @foreach($pelanggan->tagihan->where('status', 'Belum Bayar') as $index => $tagihan)
    <div class="list-group-item">
        <div class="row">
            <div class="col-md-5">
                <div class="d-block">
                    <h4 class="font-weight-bold color-yellow">{{ $tagihan->bulan }}</h4>
                    {{ \Carbon\Carbon::now()->toFormattedDateString() }}
                </div>
            </div>
            <div class="col md-5 d-flex align-items-center">
                <div class="d-block">
                    <i class="fas fa-money-bill-alt fa-2x color-green mr-2"></i>
                    <span class="font-weight-bold h5">Rp. {{ number_format(($tagihan->jumlah_meter * $tagihan->pelanggan->tarif->tarifperkwh) + round((($tagihan->jumlah_meter * $tagihan->pelanggan->tarif->tarifperkwh) * 0.01))) }}</span>
                </div>
            </div>
            <div class="col-md-2">
                <a href="javascript:void(0);" data-id="{{$tagihan->id}}" data-bulan="{{ $tagihan->bulan }}" data-tahun="{{$tagihan->tahun}}" data-total="{{$tagihan->jumlah_meter * $tagihan->pelanggan->tarif->tarifperkwh}}" data-biaya="{{ round(($tagihan->jumlah_meter * $tagihan->pelanggan->tarif->tarifperkwh) * 0.01) }}" class="btn cusbg-green item_tagihan_tf"><i class="fas fa-money-bill fa-2x text-white"></i></a>
            </div>
        </div>
    </div>
    @endforeach
</div>

@section('script')
<script type="text/javascript">
    $(document).ready(function () {
        $('.item_tagihan_tf').on('click', function () {
            var data = Object.values($(this).data());
            $('#modalPerTagihan').modal('show');
            $('.bln').text(data[3]+'/'+data[2]);
            $('.ttl').text(data[1]);
            $('.adm').text(data[0]);
            $('.ttl_byr').text(data[1]+data[0]);
            $('[name="mtd"]').text("Transfer");                
        });
    });
</script>
@endsection