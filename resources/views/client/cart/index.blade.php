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
	}

	.cart_table .head-cart .product
	{
		display: table-cell;
		width: 20%;
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
	}

	.cart_table .body-cart .Cartitem
	{
		display: table;
		width: 100%;
	} 

	.cart_table .body-cart .CartItem .image
	{
		display: table-cell;
		width: 20%;
	}

	.cart_table .body-cart .CartItem .image img
	{
		max-width: 100%;
	}

	.cart_table .body-cart .CartItem .info_detail
	{
		display: table;
		width: 100%;
	}

	.cart_table .body-cart .CartItem .info_detail .left
	{
		display: table-cell;
		width: 60%;
	}

	.cart_table .body-cart .CartItem .info_detail .right
	{
		display: table-cell;
		width: 40%;
	}

	.cart_table .body-cart .CartItem .sgtotal
	{
		display: table-cell;
		width: 20%;
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
					<div class="CartItem">
						<div class="image">
							<a href="#">
								<img src="http://localhost:8000/assets/uploads/images/products/keo-dan-tao-mat-2-mi-848x900.jpg" alt="">
							</a>
						</div>
						<div class="info_detail">
							<div class="left">
								<p class="title">KEO GẮN MI 5 GRAM</p>
								<p class="pack_color">1 sản phẩm / Đỏ</p>
								<p class="price">
									<span class="sale-price">55.000VND</span>
									&ensp;
									<span class="old-price">60.000VND</span>
								</p>
							</div>
							<div class="right">
								<div class="quantity">
									<span class="wsgReload QuantitySelector__Button Link Link--primary minus">
												<svg class="Icon Icon--minus" role="presentation" viewBox="0 0 16 2">
													<path d="M1,1 L15,1" stroke="currentColor" fill="none" fill-rule="evenodd" stroke-linecap="square"></path>
												</svg>
											</span>
									<input type="text" name="quantity" value="1">
									<span class="wsgReload QuantitySelector__Button Link Link--primary">
												<svg class="Icon Icon--plus" role="presentation" viewBox="0 0 16 16">
													<g stroke="currentColor" fill="none" fill-rule="evenodd" stroke-linecap="square">
														<path d="M8,1 L8,15"></path>
														<path d="M1,8 L15,8"></path>
													</g>
												</svg>
											</span>
								</div>
								<p class="text-center">
									<span>Xóa</span>
								</p>
							</div>
						</div>
						<div class="sgtotal">
							<span class="single_total">55.000VND</span>
						</div>
					</div>
				</div>
			</div>
			<div class="table-cart">
				<form class="Cart--expanded">
					<div class="table-cart-item">
						<div class="Cart__Head hidden-xs hidden-sm">
							<span class="Cart__HeadItem Heading Text--subdued u-h7">Sản phẩm</span>
							<span class="Cart__HeadItem"> </span>
							<span class="Cart__HeadItem Heading Text--subdued u-h7" style="text-align: center">Số lượng</span>
							<span class="Cart__HeadItem Heading Text--subdued u-h7" style="text-align: right">Tổng</span>
						</div>
						@if(!empty($cart_item))
						@foreach($cart_item as $item)
						<div class="CartItem">
							<div class="CartItem__ImageWrapper AspectRatio">
								<div class="AspectRatio" style="--aspect-ratio: 1.0">
									<img class="CartItem__Image" src="{{asset($item['image'])}}" alt="{{$item['product']}}">
								</div>
							</div>

							<div class="CartItem__Info hidden-xs hidden-sm">
								<h2 class="CartItem__Title Heading">
									<a href="{{route('client.product.index',['slug' => $item['slug']])}}">{{$item['product']}}<span class="booster-cart-item-success-notes"></span><span class="booster-cart-item-upsell-notes"></span>
									</a>
								</h2>

								<div class="CartItem__Meta Heading Text--subdued">
									<p class="CartItem__Variant">{{$item['pack_name']}} 
											@if(isset($item['color']))
												/ {{$item['color']}}
											@endif</p>
									<div class="CartItem__PriceList wsg-item-price_14590764351537">
										<span class="CartItem__Price Price">
											@php
												$price = $item['price'];
												if(!empty($item['sale'])):
													$price = $item['sale'];
													$oldprice = $item['price'];
												endif;
												@endphp
												<span class="money">{{number_format($price)}}VND</span>
												@if(isset($oldprice))
												&ensp;<span class="old-price">{{number_format($oldprice)}}VND</span>
												@endif
												@php
												unset($oldprice);
												@endphp
										</span>
									</div>
								</div>
							</div>
							<div class="CartItem__Info hidden-md hidden-lg">
								<h2 class="CartItem__Title Heading">
									<a href="{{route('client.product.index',['slug' => $item['slug']])}}">{{$item['product']}}
										<span class="booster-cart-item-success-notes"></span><span class="booster-cart-item-upsell-notes"></span>
									</a>
								</h2>

								<div class="CartItem__Meta Heading Text--subdued">
									<p class="CartItem__Variant">{{$item['pack_name']}} 
											@if(isset($item['color']))
												/ {{$item['color']}}
											@endif</p>
									<div class="CartItem__PriceList wsg-item-price_14590764351537">
										<span class="CartItem__Price Price">
											@php
												$price = $item['price'];
												if(!empty($item['sale'])):
													$price = $item['sale'];
													$oldprice = $item['price'];
												endif;
												@endphp
												<span class="money">{{number_format($price)}}VND</span>
												@if(isset($oldprice))
												&ensp;<span class="old-price">{{number_format($oldprice)}}VND</span>
												@endif
												
										</span>
									</div>
								</div>
								<div class="CartItem__Actions Heading Text--subdued" style="text-align: center">
									<div class="CartItem__QuantitySelector">
										<div class="QuantitySelector">
											<span class="wsgReload QuantitySelector__Button Link Link--primary minus">
												<svg class="Icon Icon--minus" role="presentation" viewBox="0 0 16 2">
													<path d="M1,1 L15,1" stroke="currentColor" fill="none" fill-rule="evenodd" stroke-linecap="square"></path>
												</svg>
											</span>

											<input type="text" name="quantity" data-pack="{{$item['pack_id']}}" data-color="{{empty($item['color_id'])?FALSE:$item['color_id']}}" data-price="{{$price}}" class="QuantitySelector__CurrentQuantity plus" value="{{$item['quantity']}}">
											<span class="wsgReload QuantitySelector__Button Link Link--primary">
												<svg class="Icon Icon--plus" role="presentation" viewBox="0 0 16 16">
													<g stroke="currentColor" fill="none" fill-rule="evenodd" stroke-linecap="square">
														<path d="M8,1 L8,15"></path>
														<path d="M1,8 L15,8"></path>
													</g>
												</svg>
											</span>
										</div>
									</div>

									<span class="CartItem__Remove Link Link--underline Link--underlineShort">Xóa</span>
								</div>
							</div>
							<div class="CartItem__Actions Heading Text--subdued hidden-xs hidden-sm" style="text-align: center">
								<div class="CartItem__QuantitySelector">
									<div class="QuantitySelector">
										<span class="wsgReload QuantitySelector__Button Link Link--primary minus" >
											<svg class="Icon Icon--minus" role="presentation" viewBox="0 0 16 2">
												<path d="M1,1 L15,1" stroke="currentColor" fill="none" fill-rule="evenodd" stroke-linecap="square"></path>
											</svg>
										</span>

										<input type="text" name="quantity" data-pack="{{$item['pack_id']}}" data-color="{{empty($item['color_id'])?FALSE:$item['color_id']}}" data-price="{{$price}}" class="QuantitySelector__CurrentQuantity" value="{{$item['quantity']}}">
										<span class="wsgReload QuantitySelector__Button Link Link--primary plus">
											<svg class="Icon Icon--plus" role="presentation" viewBox="0 0 16 16">
												<g stroke="currentColor" fill="none" fill-rule="evenodd" stroke-linecap="square">
													<path d="M8,1 L8,15"></path>
													<path d="M1,8 L15,8"></path>
												</g>
											</svg>
										</span>
									</div>
								</div>

								<span class="CartItem__Remove Link Link--underline Link--underlineShort">Xóa</span>
							</div>
							<span class= "CartItem__LinePrice Price Heading Text--subdued u-h7 hidden-xs hidden-sm"style="text-align: right">
								<span class="money single_total">{{number_format($price * $item['quantity'])}}VND</span>
								@php
								unset($oldprice);
								@endphp
							</span>
						</div>
						@endforeach
						@endif
					</div>
					<div class="Cart__Footer">
						<div class="Cart__Recap">
							<span class="Cart__Total Heading u-h6">
								Tổng cộng: <span class="wh-original-price total_price"></span>

							</span>
							<span class="Cart__Taxes Text--subdued">Phí vận chuyển và thuế tính khi thanh toán</span>
							<button type="submit" name="checkout" class="Cart__Checkout Button Button--primary Button--full">THANH TOÁN</button>
						</div>
					</div>
				</form>
			</div>
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

		jQuery('.QuantitySelector span').on('click',function(){
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
	});

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