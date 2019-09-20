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
	<script src="https://www.paypal.com/sdk/js?client-id={{config('app.client_id')}}"></script>
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
			margin: 15px 0;
		}
		
		.payment_method .item
		{
			border: thin #ddd solid;
		}

		.payment_method .item label
		{
			display: block;
			width: 100%;
			border-bottom: thin #ddd solid;
			padding: 5px;
			margin-bottom: 0;
		}

		.payment_method .item .payment-content
		{
			padding: 5px;
			display: none;
		}

		.payment_method .item .payment-content.active
		{
			display: block;
		}

		.vouchers
		{
			padding: 10px 0;
		}
		
		.voucher_list
		{
			display: flex;
			align-items: center;
		}

		.voucher_list select
		{
			width: 70%;
			height: 35px;
		}

		.voucher_list button
		{
			width: 27%;
			margin-left: 3%;
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
								<li class="shipping item"><a href="{{route('client.checkout',['step' => 'order_review'])}}">Giao hàng</a></li>
								<li class="payment item active">Thanh toán</li>
							</ul>
						</div>
					</div>
					<div class="info-content">
						<div class="list_info">
							<div class="item">
								<span>Liên hệ</span>
								<span id="eus"></span>
								<span class="edit_order">
									<a href="{{route('client.checkout')}}">Thay đổi</a>
								</span>
							</div>
							<div class="item">
								<span>Địa chỉ</span>
								<span id="address"></span>
								<span class="edit_order">
									<a href="{{route('client.checkout')}}">Thay đổi</a>
								</span>
							</div>
							<div class="item">
								<span>Giao hàng</span>
								<span>Giao hàng tiêu chuẩn (<strong>30.000VND</strong>)</span>
								<span></span>
							</div>
						</div>
						<div class="payment_method">
							<h3>Phương thức thanh toán</h3>
							<div class="item">
								<label for="online"><input type="radio" id="online" name="payment_method" value="online" checked> Thanh toán Online</label>
								<div class="payment-content active">
									<div class="alert alert-warning">
										Nếu bạn có mã giảm giá, vui lòng nhập mã giảm giá trước khi tiến hành thanh toán này.
									</div>
									<div id="button-paypal"></div>
								</div>
							</div>
							<div class="item">
								<label for="atm"><input type="radio" id="atm" name="payment_method" value="atm"> Chuyển khoản ngân hàng</label>
								<div class="payment-content">
									<p>Đơn hàng của bạn sẽ được lên đơn và tiến hành giao hàng sau khi bạn chuyển khoản thành công cho chúng tôi</p>
									<p>Vui lòng chuyển khoản theo các tài khoản sau :</p>
									<ul>
										<li>
											Ngân hàng Viectcombank | TK : 1616514651 | Chi nhánh : Hà Nội
										</li>
										<li>
											Ngân hàng Viettinbank | TK : 5695589985 | Chi nhánh : Hà Nội
										</li>
										<li>
											Ngân hàng Techcombank | TK : 95985959829 | Chi nhánh : Hà Nội
										</li>
									</ul>
								</div>
							</div>
							<div class="item">
								<label for="cod"><input type="radio" id="cod" name="payment_method" value="cod"> Thanh toán khi nhận hàng</label>
								<div class="payment-content">Quý khách hàng vui lòng thanh toán số tiền đơn hàng và phí ship cho shipper khi nhận hàng</div>
							</div>
						</div>
						<div class="pvs__action">
							<a href="{{route('client.checkout',['step'=>'order_review'])}}" class="back"><i class="fa fa-angle-left"></i> Quay về thông tin</a>
							<button class="btn-redirect btn-complete">Hoàn tất đơn hàng</button>
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
	<script type="text/javascript" src="{{asset('/assets/client/js/sweet.alert.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('/assets/client/js/custom.js')}}"></script>
	<script>
		var trade = '{{$trade}}';
		paypal.Buttons({
			createOrder: function(data, actions) {
				var total = jQuery('.payment-due__price').data('checkout-payment-due-target');
				var dolla = parseInt(total)/parseInt(trade);
				var amount = dolla.toFixed(2);
				return actions.order.create({
					purchase_units: [{
						amount: {
							value: amount
						}
					}]
				});
			},
			onApprove: function(data, actions) {
				return actions.order.capture().then(function(details) {
					localStorage.setItem('order_id',details.id);
					localStorage.setItem('status','complete');
					Swal.fire(
						'Thanh toán thành công',
						'',
						'success'
						);
				});
			},
			onError: function(error){
				console.log(error);
			}
		}).render('#button-paypal');
	</script>
	<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery('.payment_method .item label').click(function(){
				if(jQuery(this).next().is(':visible')) return false;
				jQuery('.payment_method .item').each(function(){
					if(jQuery(this).find('.payment-content').is(':visible')) jQuery(this).find('.payment-content').removeClass('active');
					jQuery(this).find('input[name=payment_method]').prop('checked',false);
				});
				jQuery(this).find('input').prop('checked',true);
				jQuery(this).next().addClass('active');
			});
		});

		jQuery('.btn-complete').on('click',function(){
			var err = check_form();
			if(err > 0){
				if(confirm("Vui lòng cung cấp thông tin của bạn trước khi tiến hành thanh toán"))
				{
					window.location.href = '{{route('client.checkout')}}';
				}
			}
			else
			{
				var pay = jQuery('input[name=payment_method]:checked').val();
				if(pay == 'online')
				{
					var check = localStorage.getItem('status');
					if(check == null || check != 'complete')
					{
						alert("Bạn đang chọn phương thức thanh toán Online. Vui lòng thanh toán ngay hoặc chọn phương thức thanh toán khác. Xin cảm ơn");
					}
					else
					{
						checkout();
					}
				}
				else
				{
					checkout();
				}
			}
			
		})


		jQuery('.discount button').on('click',function(){
			jQuery('#voucher').val('');
			var discount = jQuery(this).prev().val();
			if(discount.length > 0)
			{
				jQuery.ajax({
					url: '{{route('client.cart.discount')}}',
					type: 'get',
					dataType: 'json',
					data: {
						discount: discount
					},
					beforeSend: function(){
						jQuery('.info-right .errors').remove();
						jQuery('.field-discount-payment').remove();
						cal_discount();
					},
					success: function(res)
					{
						if(res.status == 'errors')
						{
							jQuery('.discount').after('<p class="errors">'+res.msg+'</p>');
						}
						else
						{
							jQuery('tr.total-line--shipping').after('<tr class="field-discount-payment"><td>Giảm giá</td><td style="font-weight: bold;"><span class="field_discount__value" data-value="'+res.value+'" data-type="'+res.type+'"> -'+numberWithCommas(res.value)+'</span>'+((res.type == 'percent')?'%':'VND')+'</td></tr>');
							cal_discount();
						}
					},
					errors: function(errors){
						console.log(errors);
					}
				});
			}
			else
			{
				alert("Vui lòng nhập mã giảm giá");
			}
		});

		jQuery('.vouchers .voucher_list button').on('click',function(){
			jQuery('.discount input').val('');
			var code = jQuery('#voucher').val();
			if(code.length > 0)
			{
				jQuery.ajax({
					url: '{{route('client.cart.voucher')}}',
					type: 'get',
					dataType: 'json',
					data: {
						code: code
					},
					beforeSend: function(){
						jQuery('.info-right .errors').remove();
						jQuery('.field-discount-payment').remove();
						cal_discount();
					},
					success: function(res)
					{
						if(res.status == 'errors')
						{
							jQuery('.discount').after('<p class="errors">'+res.msg+'</p>');
						}
						else
						{
							jQuery('tr.total-line--shipping').after('<tr class="field-discount-payment"><td>Giảm giá</td><td style="font-weight: bold;"><span class="field_discount__value" data-value="'+res.value+'" data-type="'+res.type+'"> -'+numberWithCommas(res.value)+'</span>'+((res.type == 'percent')?'%':'VND')+'</td></tr>');
							cal_discount();
						}
					},
					errors: function(errors){
						console.log(errors);
					}
				});
			}
			else
			{
				jQuery('.info-right .errors').remove();
				jQuery('.field-discount-payment').remove();
				cal_discount();
				alert("Vui lòng chọn Voucher giảm giá");
			}
		});






		function check_form()
		{
			var err = 0;
			var fname = localStorage.getItem('fname');
			if(fname == null) err ++;
			var lname = localStorage.getItem('lname');
			if(lname == null) err ++;
			var address1 = localStorage.getItem('address1');
			if(address1 == null) err ++;
			var address2 = localStorage.getItem('address2');
			if(address2 == null) err ++;
			var city = localStorage.getItem('city');
			if(city == null) err ++;
			
			return err;
		}




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

		function numberWithCommas(x) {
			return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
		}

		function cal_discount()
		{
			var subtotal = jQuery('.total-line--subtotal .order-summary__emphasis').data('checkout-subtotal-price-target');
			var ship = jQuery('.total-line--shipping .order-summary__emphasis').data('checkout-total-shipping-target');

			var total = 0;
			if(jQuery('*').find('.field-discount-payment').length > 0)
			{
				var type = jQuery('.field_discount__value').data('type');
				var value = jQuery('.field_discount__value').data('value');
				
				if(type == 'percent')
				{
					total = (parseInt(subtotal) + parseInt(ship))*(100-parseInt(value))/100;
				}
				else
				{
					total = parseInt(subtotal) + parseInt(ship) - parseInt(value);
				}
			}
			else
			{
				total = parseInt(subtotal) + parseInt(ship);
			}

			if(total < 0) total = 0;
			jQuery('.payment-due').html('<span class="payment-due__price" data-checkout-payment-due-target="'+total+'">'+numberWithCommas(total)+'VND</span>');
		}

		function checkout(){
			var data = {};
			data.first_name = localStorage.getItem('fname');
			data.last_name = localStorage.getItem('lname');
			data.company = localStorage.getItem('company');
			data.address1 = localStorage.getItem('address1');
			data.address2 = localStorage.getItem('address2');
			data.city = localStorage.getItem('city');
			data.phone = localStorage.getItem('phone');
			data.order_id = localStorage.getItem('order_id');
			data.discount = jQuery('.info-right input[name=discount]').val();
			data.payment_method = jQuery('input[name=payment_method]:checked').val();
			data.subtotal = jQuery('.total-line__price span').data('checkout-subtotal-price-target');
			data.voucher_code = jQuery('#voucher').val();
			data.total = jQuery('.payment-due__price').data('checkout-payment-due-target');
			jQuery.ajax({
				headers: {
					'X-CSRF-TOKEN': '{{ csrf_token() }}',
				},
				url: '{{route('client.checkout.order')}}',
				type: 'post',
				dataType: 'json',
				data: data,
				beforeSend: function(){

				},
				success: function(res){
					if(res.status == 'success')
					{
						window.location.href = '{{route('client.account.index')}}';
					}
					localStorage.removeItem('status');
					localStorage.removeItem('order_id');
				},
				errors: function(errors){
					console.log(errors);
				}
			});
		}
	</script>
</body>
</html>