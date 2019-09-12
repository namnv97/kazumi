@extends('layouts.client')
@section('title')
Giỏ hàng
@endsection
@section('css')
<style>
	.page-carts .CartItem__Remove
	{
		cursor: pointer;
	}

	.pcart_bar{
		position: fixed;
		top: 0;
		left: 0;
		height: 3px;
		background: red;
		z-index: 10000;
		width: 0;
	}

	.cart_table .head-cart
	{
		display: table;
		width: 100%;
		padding: 15px 0;
		text-transform: uppercase;
		border-bottom: 1px #ddd solid;
	}

	.cart_table .head-cart .product
	{
		display: table-cell;
		width: 15%;
	}
	.cart_table .head-cart .info
	{
		display: table;
		width: 100%;
	}

	.cart_table .head-cart .info .left
	{
		display: table-cell;
		width: 60%;
	}

	.cart_table .head-cart .info .right
	{
		display: table-cell;
		width: 40%;
		text-align: center;
	}

	.cart_table .head-cart .calt
	{
		width: 20%;
		display: table-cell;
		text-align: right;
	}

	.cart_table .body-cart .CartItem
	{
		display: flex;
		align-items: center;
	} 

	.cart_table .body-cart .CartItem .image
	{
		width: 15%;
	}

	.cart_table .body-cart .CartItem .image img
	{
		max-width: 100%;
	}

	.cart_table .body-cart .CartItem .info_detail
	{
		width: 65%;
		display: table;
	}

	.cart_table .body-cart .CartItem .info_detail .left
	{
		display: table-cell;
		width: 60%;
		padding-left: 15px;
		padding-right: 15px;
	}

	.cart_table .body-cart .CartItem .info_detail .right
	{
		display: table-cell;
		width: 40%;
		vertical-align: bottom;
	}

	.cart_table .body-cart .CartItem .sgtotal
	{
		width: 20%;
		text-align: right;
	}


	.quantity
	{
		width: 50%;
		margin: 0 auto;
		position: relative;
	}

	.quantity input
	{
		width: 100%;
		height: 35px;
		text-align: center;
		background: transparent;
		border:thin #dedede solid;
		outline: none;
	}

	.quantity span.minus
	{
		position: absolute;
		top: 0;
		left: 0;
	}
	
	.quantity span.plus
	{
		position: absolute;
		top: 0;
		right: 0;
	}

	.btn-remove-cart
	{
		display: inline-block;
		margin: 5px 0;
		cursor: pointer;
	}

	.btn-remove-cart:hover
	{
		text-decoration: underline;
	}
	
	.cart_table .body-cart .CartItem .sale-price
	{
		color: #f94c43;
	}
	
	.cart_table .footer-cart
	{
		padding: 10px 0;
		border-top: thin #dedede solid;
		margin-top: 15px;
	}

	.cart_table .footer-cart .total
	{
		text-transform: uppercase;
	}

	.action_checkout
	{
		text-align: right;
	}

	.action_checkout .btn-checkout
	{
		font-family: 'Montserrat', sans-serif;
		color: #ffffff;
		border: 1px solid transparent;
		border-radius: 0;
		text-transform: uppercase;
		font-size: 12px;
		text-align: center;
		letter-spacing: 0.2em;
		border-color: #000000;
		display: inline-block;
		padding: 14px 28px;
		font-weight: 600;
		position: relative;
		z-index: 9;
		margin-top: 20px;
		background-color: #fff;
	}

	.action_checkout .btn-checkout:before{
		content: '';
		display: block;
		left: 0;
		top: 0;
		right: 0;
		bottom: 0;
		width: 100%;
		height: 100%;
		-webkit-transform: scale(1, 1);
		transform: scale(1, 1);
		-webkit-transform-origin: left center;
		transform-origin: left center;
		z-index: -1;
		background-color: #000000;
		-webkit-transition: -webkit-transform 0.45s cubic-bezier(0.785, 0.135, 0.15, 0.86);
		transition: -webkit-transform 0.45s cubic-bezier(0.785, 0.135, 0.15, 0.86);
		transition: transform 0.45s cubic-bezier(0.785, 0.135, 0.15, 0.86);
		transition: transform 0.45s cubic-bezier(0.785, 0.135, 0.15, 0.86),-webkit-transform 0.45s cubic-bezier(0.785, 0.135, 0.15, 0.86);
		position: absolute;
	}

	.action_checkout .btn-checkout:hover:before
	{
		-webkit-transform-origin: right center;
		transform-origin: right center;
		-webkit-transform: scale(0, 1);
		transform: scale(0, 1);
	}

	.action_checkout .btn-checkout:hover
	{
		color: #000;
	}

	@media(max-width: 991px){
		.cart_table .head-cart, .cart_table .body-cart .CartItem .sgtotal
		{
			display: none;
		}

		.cart_table .body-cart .CartItem .image
		{
			width: 40% !important;
		}

		.cart_table .body-cart .CartItem .info_detail
		{
			width: 60% !important;
		}

		.cart_table .body-cart .CartItem .info_detail .left
		{
			display: block !important;
			width: 100% !important
		}
		.cart_table .body-cart .CartItem .info_detail .right
		{
			display: block !important;
			width: 100% !important;
		}

		.quantity
		{
			display: inline-block;
			margin: 0 15px;
		}

		.cart_table .body-cart .CartItem .info_detail .right p
		{
			display: inline-block;
		}

		.cart_table .body-cart .CartItem
		{
			align-items: flex-start;
		}
	}

</style>
@endsection
@section('content')
<div class="page-carts cart bg-grey">
	<div class="pcart_bar"></div>
	<div class="container-learn">
		<div class="title-home">
			<h1 class="title-large">Giỏ hàng</h1>
		</div>
		<div class="cart-content">
			@if(count($cart_item) > 0)
			<div class="cart_table">
				<div class="head-cart">
					<div class="product">Sản phẩm</div>
					<div class="info">
						<div class="left"></div>
						<div class="right">Số lượng</div>
					</div>
					<div class="calt">Tổng</div>
				</div>
				<div class="body-cart">
					@php
					$total = 0;
					@endphp
					@foreach($cart_item as $item)
					<div class="CartItem">
						<div class="image">
							<a href="{{route('client.product.index',['slug' => $item['slug']])}}">
								<img src="{{asset($item['image'])}}" alt="{{$item['product']}}">
							</a>
						</div>
						<div class="info_detail">
							<div class="left">
								<p class="title">{{$item['product']}}</p>
								<p class="pack_color">{{$item['pack_name']}} {{(isset($item['color']) && !empty($item['color']))?'/ '.$item['color']:FALSE}}</p>
								@php
								$price = $item['price'];
								if(!empty($item['sale'])):
								$price = $item['sale'];
								$oldprice = $item['price'];
								endif;
								@endphp
								<p class="price">
									<span class="sale-price">{{number_format($price)}}VND</span>
								@if(isset($oldprice))
								&ensp;<span class="old-price">{{number_format($oldprice)}}VND</span>
								@endif
								</p>
								@php
								unset($oldprice);
								@endphp
								
							</div>
							<div class="right">
								<div class="quantity">
									<span class="wsgReload QuantitySelector__Button Link Link--primary minus">
										<svg class="Icon Icon--minus" role="presentation" viewBox="0 0 16 2">
											<path d="M1,1 L15,1" stroke="currentColor" fill="none" fill-rule="evenodd" stroke-linecap="square"></path>
										</svg>
									</span>
									<input type="text" name="quantity" value="{{$item['quantity']}}" data-pack="{{$item['pack_id']}}" data-color="{{(isset($item['color_id']))?$item['color_id']:FALSE}}" data-price="{{$price}}">
									<span class="wsgReload QuantitySelector__Button Link Link--primary plus">
										<svg class="Icon Icon--plus" role="presentation" viewBox="0 0 16 16">
											<g stroke="currentColor" fill="none" fill-rule="evenodd" stroke-linecap="square">
												<path d="M8,1 L8,15"></path>
												<path d="M1,8 L15,8"></path>
											</g>
										</svg>
									</span>
								</div>
								<p class="text-center">
									<span class="btn-remove-cart" data-pack="{{$item['pack_id']}}" data-color="{{(isset($item['color_id']))?$item['color_id']:FALSE}}">Xóa</span>
								</p>
							</div>
						</div>
						<div class="sgtotal">
							<span class="single_total">{{number_format($price)}}VND</span>
						</div>
					</div>
					@php
					$total += $price*$item['quantity'];
					@endphp
					@endforeach
				</div>
				<div class="footer-cart">
					<div class="text-right">
						<p class="total">Tổng cộng : <span class="total_price">{{number_format($total)}}VND</span></p>
						<p>Phí vận chuyển và thuế sẽ được tính khi thanh toán</p>
					</div>
					<div class="action_checkout">
						<a href="{{route('client.checkout')}}" class="btn-checkout" title="{{(Auth::check())?'Thanh toán đơn hàng':'Vui lòng đăng nhập trước khi thanh toán'}}">THANH TOÁN</a>
					</div>
				</div>
			</div>
			@else
			<div class="alert alert-info">
				Bạn chưa có sản phẩm nào trong giỏ hàng
			</div>
			@endif
		</div>
		<div class="estimate-shipping">
			<h2 class="Heading">Báo giá vận chuyển</h2>
			<div class="estimate-shipping-form">
				<form>
					<select>
						<option value="volvo">United States</option>
						<option value="saab">Saab</option>
						<option value="mercedes">Mercedes</option>
						<option value="audi">Audi</option>
					</select>
					<select>
						<option value="volvo">Alabama</option>
						<option value="saab">Alaska</option>
						<option value="mercedes">Mercedes</option>
						<option value="audi">Audi</option>
					</select>
					<input type="text" name="" placeholder="Zip code">
					<button type="button" class="ShippingEstimator__Submit Button Button--primary">Estimate</button>
				</form>
			</div>
		</div>
	</div>
	@include('client.recent_view')
</div>
@endsection
@section('script')
<script type="text/javascript">
	jQuery(document).ready(function(){
		sgcalculator();

		jQuery('.quantity span').on('click',function(){
			var val = jQuery(this).parent().find('input').val();
			if(jQuery(this).hasClass('minus'))
			{
				val = val - 1;
			}
			else
			{
				val = parseInt(val) + 1;
			}

			jQuery(this).parents('.CartItem').first().find('input[name=quantity]').val(val);
			jQuery(this).parent().find('input').trigger('change');
		});
 
		jQuery('.CartItem input[name=quantity]').on('change',function(){
			jQuery('.CartItem input[name=quantity]').each(function(){
				if(parseInt(jQuery(this).val()) < 1) jQuery(this).val('1');
			})

			var pack_id = jQuery(this).data('pack');
			var color_id = jQuery(this).data('color');
			var quantity = jQuery(this).val();

			jQuery.ajax({
				url: '{{route('client.cart.update')}}',
				type: 'get',
				dataType: 'text',
				data: {
					pack_id: pack_id,
					color_id: color_id,
					quantity: quantity
				},
				beforeSend: function(){
					jQuery('.pcart_bar').css('opacity',1);
					var i = 0;
					xd = setInterval(function(){
						jQuery('.pcart_bar').css('width',parseInt(i)+'%');
						i++;
						if(i > 90) clearInterval(xd);
					},10);
				},
				success: function(res){
					console.log(res);
					sgcalculator();
					clearInterval(xd);
					jQuery('.pcart_bar').css('width','100%');
					setTimeout(function(){
						jQuery('.pcart_bar').css('width','0');
						jQuery('.pcart_bar').css('opacity',0);
					},300);
				},
				errors: function(errors){
					console.log(errors);
				}
			})

		})

		jQuery('.btn-remove-cart').on('click',function(){
			var $this = jQuery(this);
			if(confirm("Bạn muốn xóa sản phẩm này?"))
			{
				var pack_id = jQuery(this).data('pack');
				var color_id = jQuery(this).data('color');
				jQuery.ajax({
					headers: {
						'X-CSRF-TOKEN': '{{ csrf_token() }}',
					},
					url: '{{route('client.cart.remove')}}',
					type: 'post',
					dataType: 'text',
					data: {
						pack_id: pack_id,
						color_id: color_id,
						_method: 'DELETE'
					},
					beforeSend: function(){

					},
					success: function(res){
						console.log(res);
						$this.parents('.CartItem').remove();
						check_cart();
						sgcalculator();

					},
					errors: function(errors){
						console.log(errors);
					}
				});
			}
		});
	});

	function check_cart(){
		var i = 0;
		jQuery('.cart_table .CartItem').each(function(){
			i ++;
		});

		if(i == 0) window.location.href = '';
	}

	function sgcalculator(){
		var total = 0;
		var all = 0;
		jQuery('.page-carts .CartItem').each(function(){
			var num = jQuery(this).find('input[name=quantity]').first().val();
			var price = jQuery(this).find('input[name=quantity]').first().data('price');

			total += parseInt(num) * parseInt(price);
			all += parseInt(num);

			jQuery(this).find('.single_total').text(numberWithCommas(parseInt(num)*parseInt(price))+'VND');
		});

		jQuery('.cart-btn span').text('('+all+')');

		jQuery('.total_price').text(numberWithCommas(total)+'VND');
	}
</script>
@endsection