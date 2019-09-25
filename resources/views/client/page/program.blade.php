@extends('layouts.client')
@section('title')
{{$page->name}}
@endsection
@section('css')
<style>
	.form-response
	{
		padding: 15px;
		background: #5fea3c;
		color: #fff;
		position: relative;
		font-weight: bold;
	}

	.form-response p
	{
		text-align: center;
		font-size: 16px;
	}

	.form-response i
	{
		position: absolute;
		top: 0;
		right: 0;
		padding: 5px;
		border-radius: 100%;
		background: #fff;
		color: #000;
		cursor: pointer;
	}
</style>
@endsection

@section('content')

<div class="apply-care program bg-grey">
	<div class="bn-learn" style="background-image: url('{{asset($banner->meta_value)}}')">
		<div class="bn-learn-content">
			<h1 class="title-large">{{$page_title->meta_value}}</h1>
			<p>{{$page_description->meta_value}}</p>
		</div>
	</div>
	<div class="program-content">
		<div class="container-learn">
			<div class="title-home">
				<h2 class="title-large">{{$pro_title->meta_value}}</h2>
				<p>{{$pro_description->meta_value}}</p>
			</div>
			<div class="row">
				@if(count($programs) > 0)
				@foreach($programs as $program)
				<div class="col-md-4 col-sm-4 col-xs-12">
					@php
					$item = json_decode($program->meta_value,true);
					@endphp
					<div class="program-info">
						<img src="{{asset($item['image'])}}" alt="{{$item['name']}}">
						<p><strong>{{$item['name']}}</strong></p>
					</div>
				</div>
				@endforeach
				@endif
			</div>
			<div class="form-program jdgm-form-wrapper">
				<div class="form-program">
					<div class="row">
						<div class="col-xs-12 col-md-12 col-sm-12">
							<div class="form-group">
								<span>HỌ TÊN*</span>
								<input type="text" name="fullname" class="form-control" placeholder="Họ tên">
							</div>
						</div>
						<div class="col-xs-12 col-md-6 col-sm-6">
							<div class="form-group">
								<span>EMAIL *</span>
								<input type="email" name="email" class="form-control" placeholder="Email">
							</div>
						</div>
						<div class="col-xs-12 col-md-6 col-sm-6">
							<div class="form-group">
								<span>WEBSITE/PORTFOLIO *</span>
								<input type="text" name="website" class="form-control" placeholder="Website/Portfolio">
							</div>
						</div>
						<div class="col-xs-12 col-md-12 col-sm-12">
							<div class="form-group">
								<span>Địa chỉ dòng 1</span>
								<input type="text" name="address1" class="form-control" placeholder="Địa chỉ">
							</div>
						</div>
						<div class="col-xs-12 col-md-12 col-sm-12">
							<div class="form-group">
								<span>Địa chỉ dòng 2</span>
								<input type="text" name="address2" class="form-control" placeholder="Địa chỉ">
							</div>
						</div>
						<div class="col-xs-12 col-md-12 col-sm-12">
							<div class="form-group">
								<span>Tỉnh / Thành phố</span>
								<input type="text" name="city" class="form-control" placeholder="Tỉnh/Thành phố">
							</div>
						</div>
						<div class="col-xs-12 col-md-12 col-sm-12">
							<div class="form-group">
								<span>Số năm kinh nghiệm*</span>
								<select name="experience" class="form-control">
									<option value=""> Chọn năm kinh nghiệm </option>
									<option value="1-3 năm"> 1-3 năm </option>
									<option value="3-5 năm"> 3-5 năm </option>
									<option value="5-10 năm"> 5-10 năm </option>
									<option value="Trên 10 năm"> Trên 10 năm </option>
								</select>
							</div>
						</div>
						<div class="col-xs-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label>Upload chứng chỉ (nếu có)</label>
								<input type="file" name="certificate" id="certificate">
							</div>
						</div>
					</div>
					<button class="btn">GỬI</button>
				</div>
			</div>
		</div>
	</div>

</div>

@endsection
@section('script')
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('.program .jdgm-form-wrapper .form-program button').on('click',function(){
			jQuery('.program .jdgm-form-wrapper .form-program .errors').remove();
			jQuery('.program .jdgm-form-wrapper .form-program button').removeClass('err');
			var err = 0;

			var fullname = jQuery('.program .jdgm-form-wrapper .form-program input[name=fullname]').val();
			if(fullname.length == 0)
			{
				jQuery('.program .jdgm-form-wrapper .form-program input[name=fullname]').after('<p class="errors">Họ tên không được để trống</p>');
				err ++;
			}

			var email = jQuery('.program .jdgm-form-wrapper .form-program input[name=email]').val();
			if(email.length == 0)
			{
				jQuery('.program .jdgm-form-wrapper .form-program input[name=email]').after('<p class="errors">Email không được để trống</p>');
				err ++;
			}
			else
			{
				if(!ValidateEmail(email)){
					jQuery('.program .jdgm-form-wrapper .form-program input[name=email]').after('<p class="errors">Email sai định dạng. Vui lòng kiểm tra lại.</p>');
					err ++;
				}
			}

			var website = jQuery('.program .jdgm-form-wrapper .form-program input[name=website]').val();
			if(fullname.length == 0)
			{
				jQuery('.program .jdgm-form-wrapper .form-program input[name=website]').after('<p class="errors">Website/Portfolio không được để trống</p>');
				err ++;
			}

			var experience = jQuery('.program .jdgm-form-wrapper .form-program select[name=experience]').val();
			if(experience.length == 0)
			{
				jQuery('.program .jdgm-form-wrapper .form-program select[name=experience]').after('<p class="errors">Vui lòng chọn số năm kinh nghiệm</p>');
				err ++;
			}

			if(err > 0)
			{
				jQuery('.program .jdgm-form-wrapper .form-program button').addClass('err');
				return false;
			}
			else
			{
				var formData = new FormData();
				formData.append('fullname',fullname);
				formData.append('email',email);
				formData.append('website',website);
				formData.append('address1',jQuery('.program .jdgm-form-wrapper .form-program input[name=address1]').val());
				formData.append('address2',jQuery('.program .jdgm-form-wrapper .form-program input[name=address2]').val());
				formData.append('city',jQuery('.program .jdgm-form-wrapper .form-program input[name=city]').val());
				formData.append('experience',experience);
				formData.append('certificate',jQuery('#certificate')[0].files[0]);
				formData.append('form_name','program');


				jQuery.ajax({
					headers: {
						'X-CSRF-TOKEN': '{{ csrf_token() }}',
					},
					url: '{{route('client.form.data')}}',
					type: 'post',
					dataType: 'json',
					processData: false,
					contentType: false,
					data: formData,
					beforeSend: function(){

					},
					success: function(res){
						console.log(res);
						if(res.status == 'error')
						{
							jQuery('.program .jdgm-form-wrapper .form-program button').before('<p class="errors">'+res.msg+'</p>');
						}
						else
						{
							jQuery('.program .jdgm-form-wrapper .form-program button').after('<div class="form-response"><p>'+res.msg+'</p><i class="fa fa-times"></i></div>');
							jQuery('.program .jdgm-form-wrapper .form-program input').val('');
							jQuery('.program .jdgm-form-wrapper .form-program select').val('');
						}
					},
					errors: function(errors){
						console.log(errors);
					}
				});

			}
		});

		jQuery('body').on('click','.form-response i',function(){
			jQuery(this).parent().remove();
		});
	})

	function ValidateEmail(email)
	{
		pattern =/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/
		return pattern.test(email);
	}
</script>
@endsection