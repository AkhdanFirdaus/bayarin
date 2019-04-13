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
    });
</script>
@endsection