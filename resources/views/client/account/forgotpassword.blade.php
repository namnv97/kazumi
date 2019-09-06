@extends('layouts.client')
@section('title')
Lấy lại mật khẩu
@endsection
@section('css')

@endsection
@section('content')
<div class="login bg-grey contact">
	<div class="container">
		<div class="title-home">
			<h1 class="title-large">KAZUMI</h1>
			<p>Lấy lại mật khẩu</p>
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
		<form action="" method="post" class="forgot">
			@csrf

			<div class="form-group">
				<label>Email đăng ký tài khoản</label>
				<input type="email" name="email" placeholder="Email" class="form-control">
			</div>
			<p>Đã có tài khoản? <a href="{{route('client.account.login')}}">Đăng Nhập</a></p>
			
			<div class="SectionHeader__ButtonWrapper">
	            <div class="ButtonGroup ButtonGroup--spacingSmall"><button type="submit" class="ButtonGroup__Item Button btn-submit ">Gửi</button></div>
	        </div>
		</form>
		
	</div>
</div>
@endsection
@section('script')
	<script type="text/javascript">
		$(document).ready(function(){
			
			$('.forgot').on('submit',function(){
				$('.btn-submit').text('Đang gửi ...');
			})
		
		})
	</script>
@endsection