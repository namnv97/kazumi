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
					<div class="shown-if-js">
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
					</div>
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
										<input type="text" name="" class="form-control" placeholder="Họ">
									</div>
								</div>
								<div class="col-md-6 col-xs-12 col-sm-6">
									<div class="form-group">
										<input type="text" name="" class="form-control" placeholder="Tên">
									</div>
									
								</div>
								<div class="col-md-12 col-xs-12 col-sm-12">
									<div class="form-group">
										<input type="text" name="" class="form-control" placeholder="Công ty (tùy chọn)">
									</div>
								</div>
								<div class="col-md-12 col-xs-12 col-sm-12">
									<div class="form-group">
										<input type="text" name="" class="form-control" placeholder="Địa chỉ">
									</div>
								</div>
								<div class="col-md-12 col-xs-12 col-sm-12">
									<div class="form-group">
										<input type="text" name="" class="form-control" placeholder="Số phòng, số nhà, ... (tùy chọn)">
									</div>
								</div>
								<div class="col-md-12 col-xs-12 col-sm-12">
									<div class="form-group">
										<input type="text" name="" class="form-control" placeholder="Tỉnh/Thành phố">
									</div>
								</div>
								<div class="col-md-12 col-xs-12 col-sm-12">
									<div class="form-group">
										<input type="text" name="" class="form-control" placeholder="Số điện thoại">
									</div>
								</div>
							</div>
							<div class="step__footer">
								<a href="{{route('client.cart.index')}}"><i class="fa fa-angle-left" aria-hidden="true"></i> Quay lại giỏ hàng</a>
								<button class="btn">Chuyển đến giao hàng</button>
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
				<div class="info-right">
					<ul>
					    <li>
					    	<table class="product-table">
						      	<tbody data-order-summary-section="line-items">
						        	<tr class="product">
						          		<td class="product__image">
						            		<div class="product-thumbnail ">
						  						<div class="product-thumbnail__wrapper">
						    						<img alt="Silhouette - 1-Pair / Regular" class="product-thumbnail__image" src="//cdn.shopify.com/s/files/1/0250/1519/products/esqido-mink-lashes-silhouette_2f9d1280-a613-4cf7-bfbb-de47f7e47d5b_small.jpg?16542">
						  						</div>
						    					<span class="product-thumbnail__quantity">2</span>
											</div>

						          		</td>
							          	<th class="product__description" scope="row">
							            	<span class="product__description__name order-summary__emphasis">Silhouette</span>
							            	<span class="product__description__variant order-summary__small-text">1-Pair / Regular</span>
							          	</th>
							          	<td class="product__price">
							            	<span class="order-summary__emphasis">$58.00</span>
							          	</td>
						        	</tr>
						      	</tbody>
						    </table>
					    </li>
					    <li>
					    	<form>
					    		<input type="text" name="" placeholder="Gift card or discount code" class="form-control">
					    		<button type="submit" class="btn">Apply</button>
					    	</form>
					    </li>
					    <li>
					    	<table class="total-line-table table">
								<tbody class="total-line-table__tbody">
								    <tr class="total-line total-line--subtotal">
								  		<th class="total-line__name" scope="row">Subtotal</th>
									  		<td class="total-line__price">
											    <span class="order-summary__emphasis" data-checkout-subtotal-price-target="5800">
											      $58.00
											    </span>
									  		</td>
									</tr>
									<tr class="total-line total-line--shipping">
										<th class="total-line__name" scope="row">
										    Shipping
										</th>
									  	<td class="total-line__price">
										    <span class="order-summary__emphasis" data-checkout-total-shipping-target="0">
										      Free
										    </span>
									  	</td>
									</tr>
									<tr class="total-line total-line--taxes hidden" data-checkout-taxes="">
									  	<th class="total-line__name" scope="row">Taxes</th>
									  	<td class="total-line__price">
									    	<span class="order-summary__emphasis" data-checkout-total-taxes-target="0">$0.00</span>
									  	</td>
									</tr>
								</tbody>
								<tfoot class="total-line-table__footer">
									<tr class="total-line">
									    <th class="total-line__name payment-due-label" scope="row">
									        <span class="payment-due-label__total">Total</span>
									    </th>
									    <td class="total-line__price payment-due">
									        <span class="payment-due__currency">USD</span>
									        <span class="payment-due__price" data-checkout-payment-due-target="5800">
									          $58.00
									        </span>
									    </td>
									</tr>
								</tfoot>
							</table>
					    </li>
					</ul>
				</div>
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
	<script>
	  paypal.Buttons({
	    createOrder: function(data, actions) {
	    	// var amount = document.getElementById('amount').value;
	    	// if(amount.length  == 0) amount = 1;
	    	var amount = '0.01';
	      return actions.order.create({
	        purchase_units: [{
	          amount: {
	            value: amount
	          }
	        }]
	      });
	    },
	    onApprove: function(data, actions) {
	      // Capture the funds from the transaction
	      return actions.order.capture().then(function(details) {
	        // Show a success message to your buyer
	        console.log(details);
	      });
	    }
	  }).render('#button-paypal');
	</script>
</body>
</html>