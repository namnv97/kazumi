<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Thanh toán</title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap&subset=latin-ext,vietnamese" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&display=swap&subset=latin-ext,vietnamese" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('/assets/client/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('/assets/client/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('/assets/client/css/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{asset('/assets/client/css/owl.theme.default.min.css')}}">
	<link rel="stylesheet" href="{{asset('/assets/client/css/jquery.fancybox.min.css')}}">
	<link rel="stylesheet" href="{{asset('/assets/client/css/style.css')}}">
	<!-- <script src="https://www.paypal.com/sdk/js?client-id=AdSoBNfX-5wUvvAv_RnzNas95-5cjHrBZs0WO-OLPICHEEEgJ82sR2PqyfsShM5RXAGxC3Gbna0o89Tn"></script> -->
	<style>
		.info_acc
		{
			display: flex;
			align-items: center;
		}

		.info_acc .img
		{
			width: 10%;
			padding: 2px;
			border-radius: 10px;
			background: #7ed6f382;
		}

		.info_acc .text
		{
			width: 90%;
			padding:  0 10px;
		}

		.info_acc .text p
		{
			margin-bottom: 5px;
		}

		.breadcrum-cart li.item
		{
			cursor: pointer;
		}

		.breadcrum-cart li.item.non-active
		{
			cursor: text;
		}
	
		.form-info .errors
		{
			color: red;
			padding-left: 10px;
		}

	</style>
</head>
<body>
	<div class="info-cart">
		<div class="row">
			<div class="col-md-7 col-xs-12 col-sm-12">
				<div class="info-left">
					<div class="info-head">
						<div class="logo-info">
							<a href="{{route('home')}}"><img src="{{asset($logo->meta_value)}}" alt="Trang chủ"></a>
						</div>
						<div class="breadcrum-cart">
							<ul>
							    <li><a href="{{route('client.cart.index')}}">Giỏ hàng</a></li>
							    <li class="infomation item active">Thông tin</li>
							    <li class="shipping item">Giao hàng</li>
							    <li class="payment item non-active">Thanh toán</li>
							</ul>
						</div>
					</div>
					<!-- <div class="shown-if-js">
						<div class="dynamic-checkout">
							<h2 class="dynamic-checkout__title">Thanh toán ngay</h2>
							<div class="dynamic-checkout__content">
								<div id="button-paypal"></div>
							</div>
						</div>
						<div class="alternative-payment-separator" data-alternative-payment-separator="">
					      <span class="alternative-payment-separator__content">
					        OR
					      </span>
					    </div>
					</div> -->
					<div class="info-content">
						<div class="form-info">
							<div class="info-content-head">
								<h2 class="section__title">Thông tin liên hệ</h2>
								<div class="info_acc">
									<div class="img">
										<img src="{{asset('/assets/client/img/default-user.png')}}" alt="{{Auth::user()->name}}">
									</div>
									<div class="text">
										<p><span>{{Auth::user()->name}}</span> ({{Auth::user()->email}})</p>
										<p>
											<a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Đăng xuất</a>
											<form action="{{route('logout')}}" method="post" id="logout-form" style="display: none;">
												@csrf
											</form>
										</p>
									</div>
								</div>
							</div>
							<h2 class="section__title">Thông tin giao hàng</h2>
							<div class="row">
								<div class="col-md-6 col-xs-12 col-sm-6">
									<div class="form-group">
										<input type="text" name="first_name" class="form-control" placeholder="Họ">
									</div>
								</div>
								<div class="col-md-6 col-xs-12 col-sm-6">
									<div class="form-group">
										<input type="text" name="last_name" class="form-control" placeholder="Tên">
									</div>
									
								</div>
								<div class="col-md-12 col-xs-12 col-sm-12">
									<div class="form-group">
										<input type="text" name="company" class="form-control" placeholder="Công ty (tùy chọn)">
									</div>
								</div>
								<div class="col-md-12 col-xs-12 col-sm-12">
									<div class="form-group">
										<input type="text" name="address1" class="form-control" placeholder="Địa chỉ">
									</div>
								</div>
								<div class="col-md-12 col-xs-12 col-sm-12">
									<div class="form-group">
										<input type="text" name="address2" class="form-control" placeholder="Số phòng, số nhà, ... (tùy chọn)">
									</div>
								</div>
								<div class="col-md-12 col-xs-12 col-sm-12">
									<div class="form-group">
										<input type="text" name="city" class="form-control" placeholder="Tỉnh/Thành phố">
									</div>
								</div>
								<div class="col-md-12 col-xs-12 col-sm-12">
									<div class="form-group">
										<input type="text" name="phone" class="form-control" placeholder="Số điện thoại">
									</div>
								</div>
							</div>
							<input type="hidden" value="{{Auth::user()->email}}" id="eus">
							<div class="step__footer">
								<a href="{{route('client.cart.index')}}"><i class="fa fa-angle-left" aria-hidden="true"></i> Quay lại giỏ hàng</a>
								<button class="btn btn-shipping">Chuyển đến giao hàng</button>
							</div>
						</div>
					</div>
					<div class="info-ft">
						<ul>
						    <li><a href="#">Refund policy</a></li>
						    <li><a href="#">Privacy policy</a></li>
						    <li><a href="#">Terms of service</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-5 col-xs-12 col-sm-12 bg-grey">
				@include('client.cart.product_checkout')
			</div>
		</div>
	</div>





	<script type="text/javascript" src="{{asset('/assets/client/js/jquery-1.9.1.js')}}"></script>
	<script type="text/javascript" src="{{asset('/assets/client/js/jquery-ui.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('/assets/client/js/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('/assets/client/js/owl.carousel.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('/assets/client/js/jquery-scrolltofixed-min.js')}}"></script>
	<script type="text/javascript" src="{{asset('/assets/client/js/jquery.fancybox.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('/assets/client/js/custom.js')}}"></script>
	<script type="text/javascript">
		jQuery(document).ready(function(){
			load_info();
			jQuery('.btn-shipping').on('click',function(){
				jQuery('.form-info .errors').remove();
				var err = 0;
				var fname = jQuery('.form-info input[name=first_name]').val();
				if(fname.length == 0)
				{
					jQuery('.form-info input[name=first_name]').after('<p class="errors">Họ không được để trống</p>');
					err ++;
				}

				var lname = jQuery('.form-info input[name=last_name]').val();
				if(lname.length == 0)
				{
					jQuery('.form-info input[name=last_name]').after('<p class="errors">Tên không được để trống</p>');
					err ++;
				}

				var address1 = jQuery('.form-info input[name=address1]').val();
				if(address1.length == 0)
				{
					jQuery('.form-info input[name=address1]').after('<p class="errors">Địa chỉ không được để trống</p>');
					err ++;
				}

				var address2 = jQuery('.form-info input[name=address2]').val();
				if(address2.length == 0)
				{
					jQuery('.form-info input[name=address2]').after('<p class="errors">Địa chỉ không được để trống</p>');
					err ++;
				}

				var city = jQuery('.form-info input[name=city]').val();
				if(city.length == 0)
				{
					jQuery('.form-info input[name=city]').after('<p class="errors">Thành phố không được để trống</p>');
					err ++;
				}

				var phone = jQuery('.form-info input[name=phone]').val();
				if(phone.length == 0)
				{
					jQuery('.form-info input[name=phone]').after('<p class="errors">Số điện thoại không được để trống</p>');
					err ++;
				}

				var company = jQuery('.form-info input[name=company]').val();

				if(err > 0)
				{
					alert("Vui lòng kiểm tra các thông tin");
				}
				else
				{
					localStorage.setItem('fname',fname);
					localStorage.setItem('lname',lname);
					localStorage.setItem('company',company);
					localStorage.setItem('address1',address1);
					localStorage.setItem('address2',address2);
					localStorage.setItem('city',city);
					localStorage.setItem('phone',phone);
					localStorage.setItem('email',jQuery('#eus').val());
					window.location.href = '{{route('client.checkout',['step' => 'order_review'])}}';
				}

			});
		});

		function load_info()
		{
			var fname = localStorage.getItem('fname');
			if(fname != null)
			{
				jQuery('.form-info input[name=first_name]').val(fname);
			}

			var lname = localStorage.getItem('lname');
			if(lname != null)
			{
				jQuery('.form-info input[name=last_name]').val(lname);
			}

			var company = localStorage.getItem('company');

			if(company != null)
			{
				jQuery('.form-info input[name=company]').val(company);
			}

			var address1 = localStorage.getItem('address1');
			if(address1 != null)
			{
				jQuery('.form-info input[name=address1]').val(address1);
			}

			var address2 = localStorage.getItem('address2');
			if(address2 != null)
			{
				jQuery('.form-info input[name=address2]').val(address2);
			}

			var city = localStorage.getItem('city');
			if(city != null)
			{
				jQuery('.form-info input[name=city]').val(city);
			}

			var phone = localStorage.getItem('phone');
			if(phone != null)
			{
				jQuery('.form-info input[name=phone]').val(phone);
			}
		}
	</script>
</body>
</html>