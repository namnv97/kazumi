<div id="sidebar-cart">
	<div class="PageOverlay"></div>
	<div class="Drawer">
		<div class="Drawer__Header Drawer__Header--bordered Drawer__Container">
			<span class="Drawer__Title Heading u-h4">Giỏ hàng</span>

			<button class="Drawer__Close Icon-Wrapper--clickable"><svg class="Icon Icon--close" role="presentation" viewBox="0 0 16 14">
				<path d="M15 0L1 14m14 0L1 0" stroke="currentColor" fill="none" fill-rule="evenodd"></path>
			</svg></button>
		</div>
		<form class="Cart Drawer__Content">
			<div class="Drawer__Main">
				<div class="Drawer__Container">

					<div class="Cart__ItemList">
						<div class="CartItemWrapper">
							@if(!empty($cart_item))
							@foreach($cart_item as $item)
							<div class="CartItem">
								<div class="CartItem__ImageWrapper AspectRatio">
									<div class="AspectRatio" style="--aspect-ratio: 1.0">
										<img class="CartItem__Image" src="{{asset($item['image'])}}" alt="{{$item['product']}}">
									</div>
								</div>

								<div class="CartItem__Info">
									<h2 class="CartItem__Title Heading">
										<a href="{{route('client.product.index',['slug' => $item['slug']])}}">{{$item['product']}}
											<span class="booster-cart-item-success-notes"></span><span class="booster-cart-item-upsell-notes"></span>
										</a>
									</h2>

									<div class="CartItem__Meta Heading Text--subdued">
										<p class="CartItem__Variant">{{$item['pack_name']}} 
											@if(isset($item['color']))
												/ {{$item['color']}}
											@endif
										</p>
										<div class="CartItem__PriceList wsg-item-price_14590764351537">
											<span class="CartItem__Price Price">
												<span class="Bold-theme-hook-DO-NOT-DELETE-comment-bold_cart_item_price_2" style="display:none !important;"></span>
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
									<div class="CartItem__Actions Heading Text--subdued" style="text-align: center">
										<div class="CartItem__QuantitySelector">
											<div class="QuantitySelector">
												<span class="wsgReload QuantitySelector__Button Link Link--primary minus">
													<svg class="Icon Icon--minus" role="presentation" viewBox="0 0 16 2">
														<path d="M1,1 L15,1" stroke="currentColor" fill="none" fill-rule="evenodd" stroke-linecap="square"></path>
													</svg>
												</span>

												<input type="text" name="quantity" data-price="{{$price}}" class="QuantitySelector__CurrentQuantity" value="{{$item['quantity']}}">
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

										<a href="#" class="CartItem__Remove Link Link--underline Link--underlineShort">Xóa</a>
									</div>
								</div>
							</div>
							@endforeach
							@else
							<p class="cart_empty">Giỏ hàng trống</p>
							@endif
						</div>
					</div>
				</div>
			</div>
			<div class="Drawer__Footer">
				<div class="SectionHeader__ButtonWrapper">
					<div class="ButtonGroup ButtonGroup--spacingSmall ">
						<button type="submit" name="checkout" class="Cart__Checkout Button ButtonGroup__Item">
							<span>Thanh toán</span>
							<span class="Button__SeparatorDot"></span>
							<span>
								<span class="wh-original-cart-total">
									<span class="wh-original-price">
										<span class="money cart_total"></span>
									</span>
								</span>
								<span class="wh-cart-total"></span>
								<div class="additional-notes">
									<span class="wh-minimums-note"></span>
									<span class="wh-extra-note"></span>
								</div>
							</span>
						</button>
					</div>
				</div>

			</div>
		</form>
	</div>
</div>