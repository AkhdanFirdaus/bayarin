<form action="{{ route('tarif.store') }}" method="POST">
	{{ csrf_field() }}
    <div class="modal fade" id="tarifAdd" tabindex="-1" role="dialog" aria-labelledby="tarifAddTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tarifAddTitle">Tambah Tarif Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">                    
                    <div class="form-group">
                        <label for="daya">Daya</label>
                        <input type="number" name="daya" id="daya" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="tarifperkwh">Tarif Per Kwh</label>
                        <input type="number" name="tarifperkwh" id="tarifperkwh" class="form-control">
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
<form id="modalEdit" method="POST">
	{{ csrf_field() }}
	{{ method_field("PUT") }}
    <div class="modal fade" id="tarifEditModal" tabindex="-1" role="dialog" aria-labelledby="tarifEditModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tarifEditModalTitle">Tambah Tarif Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">                    
                    <div class="form-group">
                        <label for="daya">Daya</label>
                        <input type="number" name="daya" id="dayaEdit" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="tarifperkwh">Tarif Per Kwh</label>
                        <input type="number" name="tarifperkwh" id="tarifperkwhEdit" class="form-control">
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

<div class="modal fade" id="tarifDel" tabindex="-1" role="dialog" aria-labelledby="tarifDelTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tarifDelTitle">Tagihan Nomor <span class="badge badge-info" id="tagihanno"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Hapus Tarif <span class="daya"></span>
            </div>
            <div class="modal-footer">
                <form id="hapustar" method="POST">
                    {{ csrf_field() }}
                    {{ method_field("DELETE") }}
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button> 
                </form>                
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@section('script')
<script type="text/javascript">
    $(document).ready(function () {
        $('.tarifedit').on('click', function () {
            var data = Object.values($(this).data());
            $('#tarifEditModal').modal('show');
            $('#dayaEdit').val(data[1]);
            $('#tarifperkwhEdit').val(data[0]);
            var id = data[2];
            $('#modalEdit').attr("action", "tarif/"+id);
        });
        $('.deltrf').on('click', function () {
            let id = $(this).data('id');
            $('#hapustar').attr("action", 'tarif/'+id);
            $('#tarifDel').modal('show');
            $('.daya').text($(this).data('daya'));
        })
    });
</script>
@endsection