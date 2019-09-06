@extends('layouts.client')
@section('title')
Liên hệ
@endsection
@section('css')
<style>
	p.errors
	{
		color: red;
		padding-left: 10px;
	}

	.ajax-loaded
	{
		height: 2px;
		margin: 5px 0;
		background: red;
		width: 0;
	}

	.form-contact .response
	{
		text-align: center;
		padding: 10px 0;
		color: #fff;
		background: #44c333;
		border: 2px solid #98e88d;
		font-size: 16px;
		display: none;
		font-weight: bold;
		position: relative;
	}

	.form-contact .response i
	{
		position: absolute;
		top: 0;
		right: 0;
		width: 20px;
		height: 20px;
		font-weight: bold;
		color: #000;
		cursor: pointer;
		border-radius: 100%;
		background: #fff;
		text-align: center;
		line-height: 1.3;
	}

	.form-contact .response.active
	{
		display: block;
	}




</style>
@endsection
@section('content')
<div class="contact bg-grey">
	<div class="container">
		<div class="contact-form">
			<div class="title-home">
				<h1 class="title-large">LIÊN HỆ</h1>
			</div>
			<div class="form-contact">
				<div class="row">
					<div class="col-md-6 col-xs-12 col-sm-6">
						<div class="form-group">
							<input type="text" name="fullname" class="form-control" placeholder="Họ tên">
						</div>
					</div>
					<div class="col-md-6 col-xs-12 col-sm-6">
						<div class="form-group">
							<input type="email" name="email" class="form-control" placeholder="Email">
						</div>
					</div>
					<div class="col-md-12 col-xs-12 col-sm-12">
						<div class="form-group">
							<input type="text" name="phone" class="form-control" placeholder="Số điện thoại">
						</div>
					</div>
					<div class="col-md-12 col-xs-12 col-sm-12">
						<div class="form-group">
							<textarea name="message" placeholder="Lời nhắn" class="form-control"></textarea>
						</div>
					</div>
				</div>
				<div class="SectionHeader__ButtonWrapper">
	                <div class="ButtonGroup ButtonGroup--spacingSmall ">
	                	<button type="submit" class="ButtonGroup__Item Button">GỬI LỜI NHẮN</button>
	                	<div class="ajax-loaded"></div>
	                </div>
	                <div class="response">
	                	<div class="text"></div>
	                	<i class="fa fa-times" title="Ẩn thông báo"></i>
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
		jQuery('.SectionHeader__ButtonWrapper button').on('click',function(){
			jQuery('.form-contact .errors').remove();
			jQuery('.form-contact .response').removeClass('active');
			jQuery('.form-contact .response .text').html('');
			var name = jQuery('.form-contact input[name=fullname]').val();
			var phone = jQuery('.form-contact input[name=phone]').val();
			var email = jQuery('.form-contact input[name=email]').val();
			var message = jQuery('.form-contact textarea[name=message]').val();
			var err = 0;
			if(name.length == 0)
			{
				jQuery('.form-contact input[name=fullname]').after('<p class="errors">Họ tên không được để trống</p>');
				err ++;
			}

			if(phone.length == 0)
			{
				jQuery('.form-contact input[name=phone]').after('<p class="errors">Số điện thoại không được để trống</p>');
				err ++;
			}

			if(email.length == 0)
			{
				jQuery('.form-contact input[name=email]').after('<p class="errors">Email không được để trống</p>');
				err ++;
			}

			if(err > 0)
			{
				alert("Vui lòng kiểm tra các thông tin lỗi");
				jQuery('body,html').animate({
					scrollTop: 0
				},500);
			}
			else
			{
				var xd;
				jQuery.ajax({
					headers: {
						'X-CSRF-TOKEN': '{{ csrf_token() }}',
					},
					url: '{{route('client.form.data')}}',
					type: 'post',
					dataType: 'json',
					data: {
						name: name,
						phone: phone,
						email: email,
						message: message,
						form_name: 'contact'
					},
					beforeSend: function(){
						jQuery('.form-contact .ajax-loaded').css('opacity',1);
						var i = 0;
						xd = setInterval(function(){
							jQuery('.form-contact .ajax-loaded').css('width',parseInt(i)+'%');
							console.log(i);
							i++;
							if(i > 90) clearInterval(xd);
						},10);
					},
					success: function(res){
						console.log(res);
						clearInterval(xd);
						jQuery('.form-contact .ajax-loaded').css('width','100%');
						setTimeout(function(){
							jQuery('.form-contact .ajax-loaded').css('width','0');
							jQuery('.form-contact .ajax-loaded').css('opacity',0);
						},300);

						jQuery('.form-contact .response .text').text(res.msg);
						jQuery('.form-contact .response').addClass('active');
					},
					errors: function(errors){
						console.log(errors);
					}
				})
			}


		});

		jQuery('form.form-contact input[name=phone]').on('keypress',function(e){
			if(e.keyCode < 48 || e.keyCode > 57) return false;
		})

		jQuery('.form-contact .response i').click(function(){
			jQuery(this).parent().removeClass('active');
			jQuery(this).prev().html('');
		});
	});
</script>
@endsection