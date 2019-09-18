@extends('layouts.client')
@section('title')
Thông Tin Tài Khoản
@endsection
@section('css')
	<style type="text/css">
		.gallery .img
		{
			display: none;
			width: 50%;
			padding: 5px;
			margin-bottom: 10px;
			float: left;
			position: relative;
		}

		.gallery .img.active
		{
			display: block;
		}

		.gallery .img i
		{
			position: absolute;
			top: 0;
			right: 0;
			display: inline-block;
			padding: 3px;
			background: #fff;
			color: #000;
			font-weight: bold;
			cursor: pointer;
			border-radius: 100%;
		}

		.gallery .img img
		{
			max-width: 100%;
			width: 100%;
		}

		.gallery::after
		{
			content: '';
			clear: both;
			display: table;
		}
	</style>
@endsection
@section('content')
<div class="rewards bg-grey">
	<div class="container">
		
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
		<h3>THÔNG TIN CÁ NHÂN</h3>
		<p>Chào mừng quay trở lại, {{Auth::user()->name}} !</p>
		<div class="row" style="padding-top: 50px;">
			<form action="" method="post">
				@csrf
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Tài khoản (Email)</label>
							<input type="email" disabled="disabled" value="{{$user->email}}" name="email" placeholder="Email" class="form-control">
						</div>
						<div class="form-group">
							<label>Mật khẩu (để trống nếu không muốn thay đổi)</label>
							<input type="password" name="password" placeholder="Mật khẩu" class="form-control">
						</div>
						<div class="form-group">
							<label>Họ tên</label>
							<input type="text" name="name" value="{{$user->name}}" placeholder="Mật khẩu" class="form-control">
							
						</div>
						<div class="form-group">
							<label>Ngày Sinh</label>
							<input type="date" name="birth_day" value="{{$user->birthday}}" placeholder="Password" class="form-control">
							
						</div>
						<div class="form-group">
							<label>Điểm thưởng</label>
							<input type="number" disabled="disabled" value="{{$user->point_reward}}" name="point_reward" placeholder="Password" class="form-control">
							
						</div>
						<div class="form-group">
							<label>Mã Giới thiệu</label>
							<input type="text" readonly value="{{$user->refferal_code}}" name="refferal_code"  placeholder="Password" class="form-control">
							
						</div>
						
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label>Ảnh đại diện</label>
							<div class="gallery">
								<div class="img {{(!empty($user->avatar))?'active':FALSE}}">
									<img src="{{$user->avatar}}" alt="image">
									<input type="hidden" name="avatar" value="{{$user->avatar}}">
									<i class="fa fa-times delete"></i>
								</div>
							</div>
							<span class="choose_gallery btn btn-sm btn-success">Chọn ảnh</span>
						</div>
					</div>
				</div>
				<div class="SectionHeader__ButtonWrapper">
		            <div class="ButtonGroup ButtonGroup--spacingSmall "><button type="submit" class="ButtonGroup__Item Button">Cập nhật</button></div>
		        </div>
				
				
			</form>
		</div>
	</div>
</div>
@endsection
@section('script')
	<script src="{{asset('assets/ckeditor/ckeditor.js')}}"></script>
	<script src="{{asset('assets/ckfinder/ckfinder.js')}}"></script>
	<script src="{{asset('assets/admin/js/config_ck.js')}}"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.delete').on('click',function(){
				
				
				if(confirm('Chắc chắc muốn xóa ?'))
				{
					jQuery(this).parent().removeClass('active');
					jQuery(this).parent().find('img').removeAttr('src');
					jQuery(this).parent().find('input').val('');
				}
			});


			jQuery('body').on('click','.choose_gallery',function(){
				CKFinder.popup( {
					chooseFiles: true,
					onInit: function( finder ) {
						finder.on( 'files:choose', function( evt ) {
							var file = evt.data.files;
							file.forEach(function(e){
								var url = e.getUrl();
								jQuery('.gallery .img img').attr('src',url);
								jQuery('.gallery .img').addClass('active');
								jQuery('.gallery .img input').val(url);
							});
						} );
					}
				} );
			
		});
		})
	</script>
@endsection