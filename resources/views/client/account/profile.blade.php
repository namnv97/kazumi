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

	form#profile button[type=submit].err
	{
		border: 1px solid red !important;
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
			<form action="{{route('client.account.profile')}}" method="post" id="profile" enctype="multipart/form-data">
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
							<input type="date" name="birthday" value="{{$user->birthday}}" placeholder="Password" class="form-control">
							
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
								<div class="img {{(!empty($user->avatar))?'is-current active':FALSE}}">
									<img src="{{$user->avatar}}" alt="image">
									<input type="file" name="avatar" style="opacity: 0; position: absolute;top: -9999px;left: -99999px;">
									<i class="fa fa-times delete"></i>
								</div>
							</div>
							<span class="btn-add-avatar btn btn-sm btn-success">Chọn ảnh</span>
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
				jQuery(this).parent().removeClass('is-current');
				jQuery(this).parent().find('img').removeAttr('src');
				jQuery(this).parent().find('input').val('');
			}
		});

		jQuery('form#profile .btn-add-avatar').on('click',function(){
			jQuery('form#profile input[name=avatar]').trigger('click');
		})

		jQuery('form#profile input[type=file]').on('change',function(e){
			jQuery('.gallery .img').removeClass('is-current');
			var input = e.target;

			var reader = new FileReader();
			reader.onload = function(){
				var dataURL = reader.result;
				jQuery('.gallery .img img').attr('src',dataURL);
				jQuery('.gallery .img').addClass('active');
			};
			reader.readAsDataURL(input.files[0]);
		});

		jQuery('form#profile').on('submit',function(){
			jQuery('form#profile .errors').remove();
			jQuery('form#profile button[type=submit]').removeClass('err');
			var err = 0;
			var password = jQuery('form#profile input[name=password]').val();
			if(password.length > 0)
			{
				if(password.length < 8)
				{
					jQuery('form#profile input[name=password]').after('<p class="errors">Mật khẩu tối thiểu 8 ký tự</p>');
					err ++;
				}
			}

			var name = jQuery('form#profile input[name=name]').val();
			if(name.length == 0)
			{
				jQuery('form#profile input[name=name]').after('<p class="errors">Họ tên không được để trống</p>');
				err ++;
			}

			var birthday = jQuery('form#profile input[name=birthday]').val();
			if(birthday.length == 0)
			{
				jQuery('form#profile input[name=birthday]').after('<p class="errors">Ngày sinh không được để trống</p>');
				err ++;
			}

			if(!jQuery('.gallery .img').hasClass('is-current'))
			{
				var avatar = jQuery('form#profile input[name=avatar]').val();
				if(avatar.length == 0)
				{
					jQuery('form#profile .gallery').after('<p class="errors">Ảnh đại diện không được để trống</p>');
					err ++;
				}
			}
			


			if(err > 0)
			{
				jQuery('form#profile button[type=submit]').addClass('err');
				return false;
			}

		})
	})
</script>
@endsection