@extends('layouts.app')

@section('style')
<style type="text/css">
    body {
        background-image: url({{asset('img/bright-bulb-color-929661.jpg')}});
        -webkit-background-size: cover;
        background-size: cover;
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="d-flex align-items-center justify-content-center" style="height: 100vh;">
        <div class="card" style="width: 25rem;">
            <div class="text-center">
                <img src="{{ asset('img/logo/logo.png') }}" alt="Logo" class="img-fluid img-thumbnail rounded-circle mx-auto" width="98px" style="margin-top: -48px;">    
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                        <label for="nama">Nama</label>
                        <input id="nama" type="text" class="form-control" name="nama" value="{{ old('nama') }}" required autofocus>

                        @if ($errors->has('nama'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nama') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                        <label for="username">Username</label>
                        <input id="username" type="username" class="form-control" name="username" value="{{ old('username') }}" required>

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

                    <div class="form-group">
                        <label for="password-confirm">Confirm Password</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>

                </form>
            </div>
            <div class="card-footer">                
                <div class="form-group">
                    <button class="btn btn-link" onclick="history.go(-1)"><i class="fas fa-chevron-left"></i></button>
                    <a href="{{ url('/') }}" class="btn btn-link text-decoration-none"><i class="fas fa-home"></i></a>
                    <a href="{{route('login')}}" class="btn btn-link text-decoration-none">Sudah Punya Akun?</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
