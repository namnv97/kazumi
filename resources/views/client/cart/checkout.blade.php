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
								<a href="#" class="paypan"><img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTAwIiBoZWlnaHQ9IjMyIiB2aWV3Qm94PSIwIDAgMTAwIDMyIiB4bWxucz0iaHR0cDomI3gyRjsmI3gyRjt3d3cudzMub3JnJiN4MkY7MjAwMCYjeDJGO3N2ZyIgcHJlc2VydmVBc3BlY3RSYXRpbz0ieE1pbllNaW4gbWVldCI+PHBhdGggZmlsbD0iIzAwMzA4NyIgZD0iTSAxMiA0LjkxNyBMIDQuMiA0LjkxNyBDIDMuNyA0LjkxNyAzLjIgNS4zMTcgMy4xIDUuODE3IEwgMCAyNS44MTcgQyAtMC4xIDI2LjIxNyAwLjIgMjYuNTE3IDAuNiAyNi41MTcgTCA0LjMgMjYuNTE3IEMgNC44IDI2LjUxNyA1LjMgMjYuMTE3IDUuNCAyNS42MTcgTCA2LjIgMjAuMjE3IEMgNi4zIDE5LjcxNyA2LjcgMTkuMzE3IDcuMyAxOS4zMTcgTCA5LjggMTkuMzE3IEMgMTQuOSAxOS4zMTcgMTcuOSAxNi44MTcgMTguNyAxMS45MTcgQyAxOSA5LjgxNyAxOC43IDguMTE3IDE3LjcgNi45MTcgQyAxNi42IDUuNjE3IDE0LjYgNC45MTcgMTIgNC45MTcgWiBNIDEyLjkgMTIuMjE3IEMgMTIuNSAxNS4wMTcgMTAuMyAxNS4wMTcgOC4zIDE1LjAxNyBMIDcuMSAxNS4wMTcgTCA3LjkgOS44MTcgQyA3LjkgOS41MTcgOC4yIDkuMzE3IDguNSA5LjMxNyBMIDkgOS4zMTcgQyAxMC40IDkuMzE3IDExLjcgOS4zMTcgMTIuNCAxMC4xMTcgQyAxMi45IDEwLjUxNyAxMy4xIDExLjIxNyAxMi45IDEyLjIxNyBaIj48L3BhdGg+PHBhdGggZmlsbD0iIzAwMzA4NyIgZD0iTSAzNS4yIDEyLjExNyBMIDMxLjUgMTIuMTE3IEMgMzEuMiAxMi4xMTcgMzAuOSAxMi4zMTcgMzAuOSAxMi42MTcgTCAzMC43IDEzLjYxNyBMIDMwLjQgMTMuMjE3IEMgMjkuNiAxMi4wMTcgMjcuOCAxMS42MTcgMjYgMTEuNjE3IEMgMjEuOSAxMS42MTcgMTguNCAxNC43MTcgMTcuNyAxOS4xMTcgQyAxNy4zIDIxLjMxNyAxNy44IDIzLjQxNyAxOS4xIDI0LjgxNyBDIDIwLjIgMjYuMTE3IDIxLjkgMjYuNzE3IDIzLjggMjYuNzE3IEMgMjcuMSAyNi43MTcgMjkgMjQuNjE3IDI5IDI0LjYxNyBMIDI4LjggMjUuNjE3IEMgMjguNyAyNi4wMTcgMjkgMjYuNDE3IDI5LjQgMjYuNDE3IEwgMzIuOCAyNi40MTcgQyAzMy4zIDI2LjQxNyAzMy44IDI2LjAxNyAzMy45IDI1LjUxNyBMIDM1LjkgMTIuNzE3IEMgMzYgMTIuNTE3IDM1LjYgMTIuMTE3IDM1LjIgMTIuMTE3IFogTSAzMC4xIDE5LjMxNyBDIDI5LjcgMjEuNDE3IDI4LjEgMjIuOTE3IDI1LjkgMjIuOTE3IEMgMjQuOCAyMi45MTcgMjQgMjIuNjE3IDIzLjQgMjEuOTE3IEMgMjIuOCAyMS4yMTcgMjIuNiAyMC4zMTcgMjIuOCAxOS4zMTcgQyAyMy4xIDE3LjIxNyAyNC45IDE1LjcxNyAyNyAxNS43MTcgQyAyOC4xIDE1LjcxNyAyOC45IDE2LjExNyAyOS41IDE2LjcxNyBDIDMwIDE3LjQxNyAzMC4yIDE4LjMxNyAzMC4xIDE5LjMxNyBaIj48L3BhdGg+PHBhdGggZmlsbD0iIzAwMzA4NyIgZD0iTSA1NS4xIDEyLjExNyBMIDUxLjQgMTIuMTE3IEMgNTEgMTIuMTE3IDUwLjcgMTIuMzE3IDUwLjUgMTIuNjE3IEwgNDUuMyAyMC4yMTcgTCA0My4xIDEyLjkxNyBDIDQzIDEyLjQxNyA0Mi41IDEyLjExNyA0Mi4xIDEyLjExNyBMIDM4LjQgMTIuMTE3IEMgMzggMTIuMTE3IDM3LjYgMTIuNTE3IDM3LjggMTMuMDE3IEwgNDEuOSAyNS4xMTcgTCAzOCAzMC41MTcgQyAzNy43IDMwLjkxNyAzOCAzMS41MTcgMzguNSAzMS41MTcgTCA0Mi4yIDMxLjUxNyBDIDQyLjYgMzEuNTE3IDQyLjkgMzEuMzE3IDQzLjEgMzEuMDE3IEwgNTUuNiAxMy4wMTcgQyA1NS45IDEyLjcxNyA1NS42IDEyLjExNyA1NS4xIDEyLjExNyBaIj48L3BhdGg+PHBhdGggZmlsbD0iIzAwOWNkZSIgZD0iTSA2Ny41IDQuOTE3IEwgNTkuNyA0LjkxNyBDIDU5LjIgNC45MTcgNTguNyA1LjMxNyA1OC42IDUuODE3IEwgNTUuNSAyNS43MTcgQyA1NS40IDI2LjExNyA1NS43IDI2LjQxNyA1Ni4xIDI2LjQxNyBMIDYwLjEgMjYuNDE3IEMgNjAuNSAyNi40MTcgNjAuOCAyNi4xMTcgNjAuOCAyNS44MTcgTCA2MS43IDIwLjExNyBDIDYxLjggMTkuNjE3IDYyLjIgMTkuMjE3IDYyLjggMTkuMjE3IEwgNjUuMyAxOS4yMTcgQyA3MC40IDE5LjIxNyA3My40IDE2LjcxNyA3NC4yIDExLjgxNyBDIDc0LjUgOS43MTcgNzQuMiA4LjAxNyA3My4yIDYuODE3IEMgNzIgNS42MTcgNzAuMSA0LjkxNyA2Ny41IDQuOTE3IFogTSA2OC40IDEyLjIxNyBDIDY4IDE1LjAxNyA2NS44IDE1LjAxNyA2My44IDE1LjAxNyBMIDYyLjYgMTUuMDE3IEwgNjMuNCA5LjgxNyBDIDYzLjQgOS41MTcgNjMuNyA5LjMxNyA2NCA5LjMxNyBMIDY0LjUgOS4zMTcgQyA2NS45IDkuMzE3IDY3LjIgOS4zMTcgNjcuOSAxMC4xMTcgQyA2OC40IDEwLjUxNyA2OC41IDExLjIxNyA2OC40IDEyLjIxNyBaIj48L3BhdGg+PHBhdGggZmlsbD0iIzAwOWNkZSIgZD0iTSA5MC43IDEyLjExNyBMIDg3IDEyLjExNyBDIDg2LjcgMTIuMTE3IDg2LjQgMTIuMzE3IDg2LjQgMTIuNjE3IEwgODYuMiAxMy42MTcgTCA4NS45IDEzLjIxNyBDIDg1LjEgMTIuMDE3IDgzLjMgMTEuNjE3IDgxLjUgMTEuNjE3IEMgNzcuNCAxMS42MTcgNzMuOSAxNC43MTcgNzMuMiAxOS4xMTcgQyA3Mi44IDIxLjMxNyA3My4zIDIzLjQxNyA3NC42IDI0LjgxNyBDIDc1LjcgMjYuMTE3IDc3LjQgMjYuNzE3IDc5LjMgMjYuNzE3IEMgODIuNiAyNi43MTcgODQuNSAyNC42MTcgODQuNSAyNC42MTcgTCA4NC4zIDI1LjYxNyBDIDg0LjIgMjYuMDE3IDg0LjUgMjYuNDE3IDg0LjkgMjYuNDE3IEwgODguMyAyNi40MTcgQyA4OC44IDI2LjQxNyA4OS4zIDI2LjAxNyA4OS40IDI1LjUxNyBMIDkxLjQgMTIuNzE3IEMgOTEuNCAxMi41MTcgOTEuMSAxMi4xMTcgOTAuNyAxMi4xMTcgWiBNIDg1LjUgMTkuMzE3IEMgODUuMSAyMS40MTcgODMuNSAyMi45MTcgODEuMyAyMi45MTcgQyA4MC4yIDIyLjkxNyA3OS40IDIyLjYxNyA3OC44IDIxLjkxNyBDIDc4LjIgMjEuMjE3IDc4IDIwLjMxNyA3OC4yIDE5LjMxNyBDIDc4LjUgMTcuMjE3IDgwLjMgMTUuNzE3IDgyLjQgMTUuNzE3IEMgODMuNSAxNS43MTcgODQuMyAxNi4xMTcgODQuOSAxNi43MTcgQyA4NS41IDE3LjQxNyA4NS43IDE4LjMxNyA4NS41IDE5LjMxNyBaIj48L3BhdGg+PHBhdGggZmlsbD0iIzAwOWNkZSIgZD0iTSA5NS4xIDUuNDE3IEwgOTEuOSAyNS43MTcgQyA5MS44IDI2LjExNyA5Mi4xIDI2LjQxNyA5Mi41IDI2LjQxNyBMIDk1LjcgMjYuNDE3IEMgOTYuMiAyNi40MTcgOTYuNyAyNi4wMTcgOTYuOCAyNS41MTcgTCAxMDAgNS42MTcgQyAxMDAuMSA1LjIxNyA5OS44IDQuOTE3IDk5LjQgNC45MTcgTCA5NS44IDQuOTE3IEMgOTUuNCA0LjkxNyA5NS4yIDUuMTE3IDk1LjEgNS40MTcgWiI+PC9wYXRoPjwvc3ZnPg==" alt=""></a>
								<a href="#" class="gpay"><svg id="shopify-svg__payments-google-pay-light" viewBox="0 0 41 17"><path fill="rgba(255, 255, 255, 1)" d="M19.526 2.635v4.083h2.518c.6 0 1.096-.202 1.488-.605.403-.402.605-.882.605-1.437 0-.544-.202-1.018-.605-1.422-.392-.413-.888-.62-1.488-.62h-2.518zm0 5.52v4.736h-1.504V1.198h3.99c1.013 0 1.873.337 2.582 1.012.72.675 1.08 1.497 1.08 2.466 0 .991-.36 1.819-1.08 2.482-.697.665-1.559.996-2.583.996h-2.485v.001zM27.194 10.442c0 .392.166.718.499.98.332.26.722.391 1.168.391.633 0 1.196-.234 1.692-.701.497-.469.744-1.019.744-1.65-.469-.37-1.123-.555-1.962-.555-.61 0-1.12.148-1.528.442-.409.294-.613.657-.613 1.093m1.946-5.815c1.112 0 1.989.297 2.633.89.642.594.964 1.408.964 2.442v4.932h-1.439v-1.11h-.065c-.622.914-1.45 1.372-2.486 1.372-.882 0-1.621-.262-2.215-.784-.594-.523-.891-1.176-.891-1.96 0-.828.313-1.486.94-1.976s1.463-.735 2.51-.735c.892 0 1.629.163 2.206.49v-.344c0-.522-.207-.966-.621-1.33a2.132 2.132 0 0 0-1.455-.547c-.84 0-1.504.353-1.995 1.062l-1.324-.834c.73-1.045 1.81-1.568 3.238-1.568M40.993 4.889l-5.02 11.53H34.42l1.864-4.034-3.302-7.496h1.635l2.387 5.749h.032l2.322-5.75z"></path><path fill="#4285F4" d="M13.448 7.134c0-.473-.04-.93-.116-1.366H6.988v2.588h3.634a3.11 3.11 0 0 1-1.344 2.042v1.68h2.169c1.27-1.17 2.001-2.9 2.001-4.944"></path><path fill="#34A853" d="M6.988 13.7c1.816 0 3.344-.595 4.459-1.621l-2.169-1.681c-.603.406-1.38.643-2.29.643-1.754 0-3.244-1.182-3.776-2.774H.978v1.731a6.728 6.728 0 0 0 6.01 3.703"></path><path fill="#FBBC05" d="M3.212 8.267a4.034 4.034 0 0 1 0-2.572V3.964H.978A6.678 6.678 0 0 0 .261 6.98c0 1.085.26 2.11.717 3.017l2.234-1.731z"></path><path fill="#EA4335" d="M6.988 2.921c.992 0 1.88.34 2.58 1.008v.001l1.92-1.918C10.324.928 8.804.262 6.989.262a6.728 6.728 0 0 0-6.01 3.702l2.234 1.731c.532-1.592 2.022-2.774 3.776-2.774"></path></svg></a>
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
											<a href="{{route('client.account.logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Đăng xuất</a>
											<form action="{{route('client.account.logout')}}" method="post" id="logout-form" style="display: none;">
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
</body>
</html>