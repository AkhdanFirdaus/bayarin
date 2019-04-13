<!-- Modal -->
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
		            	<span class="d-block yellow p-2">{{ $random['randomkwh'] }}</span>
		                <input id="no_kwh" type="hidden" class="form-control" name="no_kwh" value="{{ $random['randomkwh'] }}">
		            </div>
	            	<div class="form-group">
		                <label for="username">Username</label>
		                <span class="d-block yellow p-2">{{ $random['randomusername'] }}</span>
		                <input id="username" type="hidden" class="form-control" name="username" value="{{ $random['randomusername'] }}">
		            </div>
		            <div class="form-group">
		                <label for="password">Password</label>
		                <span class="d-block yellow p-2">{{ $random['randompass'] }}</span>
		                <input id="password" type="hidden" class="form-control" name="password" value="{{ $random['randompass'] }}">
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