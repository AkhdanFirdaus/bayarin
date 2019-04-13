<div class="fltbtn">
	<button class="btn btn-danger btn-lg" onclick="history.go(-1)"><i class="fas fa-chevron-left"></i></button>
		

	@auth
    <a class="btn btn-danger btn-lg" href="{{ route('home') }}"><i class="fas fa-home"></i></a>
	<a class="btn btn-danger btn-lg" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
        <i class="fas fa-sign-out-alt"></i>
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
    @else
    <a class="btn btn-danger btn-lg" href="{{ url('/') }}"><i class="fas fa-home"></i></a>
    @endauth
</div>