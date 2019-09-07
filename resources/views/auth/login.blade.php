@extends('layouts.client')
@section('title')
Đăng nhập
@endsection
@section('css')

@endsection
@section('content')
<div class="login bg-grey contact">
        <div class="container">
            <div class="title-home">
                <h1 class="title-large">Đăng nhập</h1>
                <p>Vui lòng nhập Email và Mật khẩu:</p>
            </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                    @endif
                </div>
                <div class="SectionHeader__ButtonWrapper">
                    <div class="ButtonGroup ButtonGroup--spacingSmall "><button type="submit" class="ButtonGroup__Item Button">Login</button></div>
                </div>
            </form>
            <p>Don't have an account? <a href="#">Create one</a></p>
        </div>
    </div>
@endsection
@section('script')

@endsection