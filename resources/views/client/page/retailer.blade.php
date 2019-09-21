@extends('layouts.client')
@section('title')
{{$page->name}}
@endsection
@section('css')
<style>
	.program .jdgm-form-wrapper .form-program .col-md-6:nth-child(2n)
	{
		clear: both;
	}

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

<div class="apply-care program retailers">
	<div class="bn-learn" style="background-image: url('{{asset($banner->meta_value)}}')">
		<div class="bn-learn-content">
			<h1 class="title-large">{{$page_title->meta_value}}</h1>
			<p>{{$page_description->meta_value}}</p>
		</div>
	</div>
	<div class="apply-care-content retailers-content">
		<div class="container">
			<ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#search_retailer">Tìm nhà bán lẻ</a></li>
				<li><a data-toggle="tab" href="#reg_retailer">Đăng ký trở thành nhà bán lẻ</a></li>
			</ul>

			<div class="tab-content">
				<div id="search_retailer" class="tab-pane fade in active">
					<div class="row">
						@if(count($retailers) > 0)
						@foreach($retailers as $retailer)
						<div class="col-md-4 col-sm-4 col-xs-12">
							<div class="retailers-logo">
								<img src="{{asset($retailer->meta_value)}}" alt="Nhà bán lẻ">
							</div>
						</div>
						@endforeach
						@endif
					</div>
					
				</div>
				<div id="reg_retailer" class="tab-pane fade in">
					<div class="program-content">
						<div class="title-home">
							<h2 class="title-large">{{$become_title->meta_value}}</h2>
							<p>{{$become_description->meta_value}}</p>
						</div>
						<div class="form-program jdgm-form-wrapper">
							<div class="form-program ">
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
											<span>SỐ ĐIỆN THOẠI *</span>
											<input type="text" name="phone" class="form-control" placeholder="Số điện thoại">
										</div>
									</div>
									<div class="col-xs-12 col-md-6 col-sm-6">
										<div class="form-group">
											<span>WEBSITE/PORTFOLIO*</span>
											<input type="text" name="website" class="form-control" placeholder="Website/Portfolio">
										</div>
									</div>
									<div class="col-xs-12 col-md-6 col-sm-6">
										<div class="form-group">
											<span>Năm hoạt động*</span>
											<input type="number" name="year" min="1" class="form-control" placeholder="Số năm hoạt động">
										</div>
									</div>
									<div class="col-xs-12 col-md-12 col-sm-12">
										<p><strong>Địa chỉ doanh nghiệp*</strong></p>
									</div>
									<div class="col-xs-12 col-md-12 col-sm-12">
										<div class="form-group">
											<span>Địa chỉ dòng 1</span>
											<input type="text" name="address1" class="form-control" placeholder="Địa chỉ dòng 1">
										</div>
									</div>
									<div class="col-xs-12 col-md-12 col-sm-12">
										<div class="form-group">
											<span>Địa chỉ dòng 2</span>
											<input type="text" name="address2" class="form-control" placeholder="Địa chỉ dòng 2">
										</div>
									</div>
									<div class="col-xs-12 col-md-12 col-sm-12">
										<div class="form-group">
											<span>Tỉnh/Thành phố</span>
											<input type="text" name="city" class="form-control" placeholder="Tỉnh/Thành phố">
										</div>
									</div>
									@if(1 == 0)
									<div class="col-xs-12 col-md-6 col-sm-6">
										<div class="form-group">
											<span>Quốc gia</span>
											<select class="form-control">
												<option value="">- Quốc gia -</option>
												@if(count($regions) > 0)
												@foreach($regions as $reg)
												<option value="{{$reg->country_code}}">{{$reg->country_name}}</option>
												@endforeach
												@endif
											</select>
										</div>
									</div>
									@endif
								</div>
								<div class="capcha"></div>
								<button class="btn">Gửi</button>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
	<div class="retailers-location bg-grey">
		<div class="container">
			<h2 class="title-large">STORE LOCATOR</h2>
			<div class="form-search-location">
				<form>
					<input type="text" name="" class="form-control" placeholder="Type a postcode or address...">
					<button type="button" class="btn"><i class="fa fa-search" aria-hidden="true"></i></button>
				</form>
			</div>
			<div class="row">
				<div class="col-md-9 col-xs-12 col-sm-8">
					<div class="location">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d953718.708129574!2d105.09215784260897!3d20.97404152711355!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135008e13800a29%3A0x2987e416210b90d!2zSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1566382065633!5m2!1svi!2s" width="100%" height="580" frameborder="0" style="border:0" allowfullscreen class="maps"></iframe>
					</div>
				</div>
				<div class="col-md-3 col-xs-12 col-sm-4">
					<div class="info-location">
						<ul>
							<li>
								<span><i class="fa fa-map-marker" aria-hidden="true"></i></span>
								<div class="stockist-result-name">
									<p><strong>Coiffure LA BROSSE</strong></p>
									<p>United States</p>
									<p>003 526 9127-0592</p>
									<p>makeupbytessy.com</p>
								</div>
							</li>
							<li>
								<span><i class="fa fa-map-marker" aria-hidden="true"></i></span>
								<div class="stockist-result-name">
									<p><strong>Coiffure LA BROSSE</strong></p>
									<p>United States</p>
									<p>003 526 9127-0592</p>
									<p>makeupbytessy.com</p>
								</div>
							</li>
						</ul>
					</div>
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
			jQuery('.program .jdgm-form-wrapper .form-program .form-response').remove();
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
				if(!ValidateEmail(email))
				{
					jQuery('.program .jdgm-form-wrapper .form-program input[name=email]').after('<p class="errors">Email sai định dạng. Vui lòng kiểm tra lại</p>');
					err ++;
				}
			}

			var phone = jQuery('.program .jdgm-form-wrapper .form-program input[name=phone]').val();
			if(phone.length == 0)
			{
				jQuery('.program .jdgm-form-wrapper .form-program input[name=phone]').after('<p class="errors">Số điện thoại không được để trống</p>');
				err ++;
			}

			var website = jQuery('.program .jdgm-form-wrapper .form-program input[name=website]').val();
			if(website.length == 0)
			{
				jQuery('.program .jdgm-form-wrapper .form-program input[name=website]').after('<p class="errors">Website/Portfolio không được để trống</p>');
				err ++;
			}

			var year = jQuery('.program .jdgm-form-wrapper .form-program input[name=year]').val();
			if(year.length == 0)
			{
				jQuery('.program .jdgm-form-wrapper .form-program input[name=year]').after('<p class="errors">Năm hoạt động không được để trống</p>');
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
				formData.append('phone',phone);
				formData.append('website',website);
				formData.append('year',year);
				formData.append('address1',jQuery('.program .jdgm-form-wrapper .form-program input[name=address1]').val());
				formData.append('address2',jQuery('.program .jdgm-form-wrapper .form-program input[name=address2]').val());
				formData.append('city',jQuery('.program .jdgm-form-wrapper .form-program input[name=city]').val());
				formData.append('form_name','retail');
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
						if(res.status == 'success')
						{
							jQuery('.program .jdgm-form-wrapper .form-program button').after('<div class="form-response"><p>'+res.msg+'</p><i class="fa fa-times"></i></div>');
							jQuery('.program .jdgm-form-wrapper .form-program input').val('');
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
		// jQuery('input[name=phone]').on('keydown',function(e){
		// 	console.log(e.keyCode);
		// 	if(e.keyCode != 8 || e.keyCode != 46)
		// 	{
		// 		if(parseInt(jQuery(this).val().length) > 10) return false;
		// 	}
			
		// });
		jQuery('input[name=phone]').on('keypress',function(e){
			if(e.keyCode < 48 || e.keyCode > 57) return false;
		});
	});

	function ValidateEmail(email)
	{
		pattern =/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/
		return pattern.test(email);
	}
</script>
@endsection