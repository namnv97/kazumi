@extends('layouts.client')
@section('title')
Đăng ký thành viên
@endsection
@section('css')

@endsection
@section('content')
<div class="login bg-grey contact">
	<div class="container">
		<div class="title-home">
			<h1 class="title-large">KAZUMI</h1>
			<p>Đăng ký thành viên</p>
		</div>
		@if(session('errors'))
		<div class="alert alert-warning">
			@foreach(session('errors')->all() as $msg)
			<p>{{$msg}}</p>
			@endforeach
		</div>
		@endif
		

		<form action="" method="post">
			@csrf
			<div class="form-group">
				<input type="email" name="email" placeholder="Email" class="form-control">
			</div>
			<div class="form-group">
				<input type="password" name="password" placeholder="Mật khẩu" class="form-control">
				
			</div>
			<div class="form-group">
				<input type="password" name="repassword" placeholder="Nhập lại mật khẩu" class="form-control">
				
			</div>
			<div class="form-group">
				<input type="text" name="name" placeholder="Họ tên" class="form-control">
				
			</div>
			
			<div class="SectionHeader__ButtonWrapper">
	            <div class="ButtonGroup ButtonGroup--spacingSmall btn-submit"><button type="submit" class="ButtonGroup__Item Button">Đăng ký</button></div>
	        </div>
		</form>
		<p>Đã có tài khoản? <a href="{{route('client.account.login')}}">Đăng Nhập</a></p>
	</div>
</div>
@endsection
@section('script')
	
@endsection