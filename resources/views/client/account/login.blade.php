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
			<h1 class="title-large">KAZUMI</h1>
			<p>Đăng nhập hệ thống</p>
		</div>
		@if(session('errors'))
		<div class="alert alert-warning">
			@foreach(session('errors')->all() as $msg)
			<p>{{$msg}}</p>
			@endforeach
		</div>
		@endif
		@if(session('success'))
		<div class="alert alert-success">
			
			<p>{{session('success')}}</p>
			
		</div>
		@endif
		<form action="{{route('login')}}" method="post">
			@csrf
			<div class="form-group">
				<input type="email" name="email" placeholder="Email" class="form-control" value="{{old('email')}}">
			</div>
			<div class="form-group">
				<input type="password" name="password" placeholder="Password" class="form-control" value="{{old('password')}}">
				<a href="{{route('forgot_password')}}">Quên mật khẩu?</a>
			</div>
			<div class="SectionHeader__ButtonWrapper">
	            <div class="ButtonGroup ButtonGroup--spacingSmall "><button type="submit" class="ButtonGroup__Item Button">Đăng nhập</button></div>
	        </div>
		</form>
		<p>Chưa có tài khoản? <a href="{{route('register')}}">Đăng ký</a></p>
	</div>
</div>
@endsection
@section('script')

@endsection