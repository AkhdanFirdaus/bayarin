@if($pelanggan->tagihan->where('status', 'Belum Bayar')->count() > 0)
<div class="list-group-flush" id="list">    
    @foreach($pelanggan->tagihan->where('status', 'Belum Bayar') as $index => $tagihan)
    <div class="list-group-item">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-block">
                <h4 class="font-weight-bold color-yellow">{{ $tagihan->bulan }}</h4>
                {{ \Carbon\Carbon::now()->toFormattedDateString() }}
            </div>
            <div class="d-block">
                <i class="fas fa-bolt fa-2x color-yellow mr-2"></i>
                <span class="font-weight-bold h5">{{ number_format($tagihan->jumlah_meter) }} Kwh</span>
            </div>
            <div class="d-block">
                <i class="fas fa-money-bill-alt fa-2x color-green mr-2"></i>
                <span class="font-weight-bold h5">Rp. {{ number_format(($tagihan->jumlah_meter * $tagihan->pelanggan->tarif->tarifperkwh) + round((($tagihan->jumlah_meter * $tagihan->pelanggan->tarif->tarifperkwh) * 0.01))) }}</span>
            </div>
            <a href="javascript:void(0);" data-id="{{$tagihan->id}}" data-bulan="{{ $tagihan->bulan }}" data-tahun="{{$tagihan->tahun}}" data-total="{{$tagihan->jumlah_meter * $tagihan->pelanggan->tarif->tarifperkwh}}" data-biaya="{{ round(($tagihan->jumlah_meter * $tagihan->pelanggan->tarif->tarifperkwh) * 0.01) }}" class="btn cusbg-green item_tagihan_tf"><i class="fas fa-money-bill fa-2x text-white"></i></a>
        </div>
    </div>
    @endforeach
</div>
@else
<div class="card">
    <div class="card-body">Anda Tidak mempunyai tagihan</div>
</div>
@endif

@section('script')
<script type="text/javascript">
    $(document).ready(function () {
        $('.item_tagihan_tf').on('click', function () {
            var data = Object.values($(this).data());
            console.log(data);
            $('#modalPerTagihan').modal('show');
            $('.bln').text(data[3]+'/'+data[2]);
            $('.ttl').text(data[1]);
            $('.adm').text(data[0]);            
            $('.ttl_byrs').text(data[1]+data[0]);
            $('[name="total_bayar"]').val(data[1]+data[0]);
            $('[name="biaya_admin"]').val(data[1]+data[0]);
            $('[name="mtd"]').val("Transfer");
            $('[name="tagihan_id"]').val(data[4]);
        });
    });
</script>
@endsection