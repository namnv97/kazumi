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
	<script src="https://www.paypal.com/sdk/js?client-id=AdSoBNfX-5wUvvAv_RnzNas95-5cjHrBZs0WO-OLPICHEEEgJ82sR2PqyfsShM5RXAGxC3Gbna0o89Tn"></script>
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

		.shipping_content
		{
			display: none;
		}

		.list_info
		{
			padding: 15px;
			border-radius: 15px;
			border: thin #ddd solid;
		}

		.list_info .item
		{
			display: flex;
			align-items: flex-start;
			padding: 5px 0;
			border-bottom: thin #ddd solid;
		}

		.list_info .item:last-child
		{
			border-bottom: none;
		}

		.list_info .item span:first-child
		{
			width: 20%;
		}
		
		.list_info .item span:nth-child(2)
		{
			width: 65%;
		}

		.list_info .item span:last-child
		{
			width: 15%;
			text-align: right;
			cursor: pointer;
		}

		.pvs__action .btn-redirect
		{
			background-color: #000;
			border: none;
			box-shadow: none;
			color: #fff;
			font-weight: bold;
			padding: 18px 30px;
			display: inline-block;
			float: right;
		}

		.pvs__action
		{
			display: flex;
			align-items: center;
			justify-content: space-between;
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
							    <li class="infomation item"><a href="{{route('client.checkout')}}">Thông tin</a></li>
							    <li class="shipping item active">Giao hàng</li>
							    <li class="payment item non-active">Thanh toán</li>
							</ul>
						</div>
					</div>
					<div class="info-content">
						<div class="list_info">
							<div class="item">
								<span>Liên hệ</span>
								<span id="eus"></span>
								<span class="edit_info">
									<a href="{{route('client.checkout')}}">Thay đổi</a>
								</span>
							</div>
							<div class="item">
								<span>Giao hàng đến</span>
								<span id="address"></span>
								<span class="edit_info">
									<a href="{{route('client.checkout')}}">Thay đổi</a>
								</span>
							</div>
						</div>
						<div class="shipping_method">
							<h3>Phương thức giao hàng</h3>
							<div class="item">
								<label class="form-control"><input type="radio" name="shipping_method" value="standar" checked> Giao hàng tiêu chuẩn (<strong>30.000VND</strong>)</label>
							</div>
						</div>
						<div class="pvs__action">
							<a href="{{route('client.checkout',['step'=>'order_review'])}}" class="back"><i class="fa fa-angle-left"></i> Quay về thông tin</a>
							<a class="btn-redirect" href="{{route('client.checkout',['step'=>'payment'])}}">Chuyển đến thanh toán</a>
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
		load_inf();
		function load_inf()
		{
			var email = localStorage.getItem('email');
			if(email != null)
			{
				jQuery('#eus').text(email);
			}

			var address1 = localStorage.getItem('address1');
			var address2 = localStorage.getItem('address2');
			var city = localStorage.getItem('city');

			if(address1 != null && address2 != null && city != null)
			{
				jQuery('#address').text(address1+', '+address2+', '+city);
			}
		}
	</script>
</body>
</html>