<div aria-live="polite" aria-atomic="true" style="position: fixed; z-index: 200;">
  <div class="toast" data-autohide="false" style="position: fixed; bottom:0; left: 0; margin-bottom: 30px; margin-left: 30px">
    <div class="toast-header">
      <img src="{{ asset('img/logo/favicon.png') }}" class="rounded mr-2" alt="...">
      <strong class="mr-auto">Bayarin</strong>
      <small>Baru Saja</small>
      <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="toast-body">
      {{ session('msg') }} - AkhdanFirdaus
    </div>
  </div>
</div>