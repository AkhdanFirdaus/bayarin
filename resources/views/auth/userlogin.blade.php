@extends('layouts.app')

@section('style')
<style type="text/css">
    body {
        background-image: url({{asset('img/bright-bulb-color-929661.jpg')}});
        -webkit-background-size: cover;
        background-size: cover;
        background-position: center center;
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="row" style="height: 100vh">
        <div class="d-flex align-items-center m-5">
            <div class="card border-0 shadow">                
                <form method="POST" action="{{ url('loginuser') }}">
                        {{ csrf_field() }}
                    <div class="card-body">
                        <div class="card-title text-center"><i class="fas fa-user fa-4x" data-fa-mask="fas fa-circle" data-fa-transform="shrink-5"></i></div>                    

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username">Username</label>
                            <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>
                            @if ($errors->has('username'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password">Password</label>
                            <input id="password" type="password" class="form-control" name="password" required>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-row">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>                                            
                    </div>
                    <div class="card-footer">                        
                        <div class="form-group">
                            <button class="btn btn-link" onclick="history.go(-1)"><i class="fas fa-chevron-left"></i></button>
                            <a href="{{ url('/') }}" class="btn btn-link text-decoration-none"><i class="fas fa-home"></i></a>
                            <a class="btn btn-link" href="{{ route('register') }}">
                                Belum Punya Akun?
                            </a>
                            <button type="submit" class="btn btn-primary">Login</button>
                            <br>
                            <a class="card-link" href="{{ route('login') }}">Admin</a>
                        </div>
                    </div>
                </form>                
            </div>
        </div>
    </div>
</div>
@endsection
