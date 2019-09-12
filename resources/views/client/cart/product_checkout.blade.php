<div class="info-right">
	<ul>
		@php
		$subtotal = 0;
		@endphp
		@foreach($arr as $item)
		<li>
			<table class="product-table">
				<tbody data-order-summary-section="line-items">
					<tr class="product">
						<td class="product__image">
							<div class="product-thumbnail ">
								<div class="product-thumbnail__wrapper">
									<img alt="{{$item['product']}}" class="product-thumbnail__image" src="{{asset($item['image'])}}">
								</div>
								<span class="product-thumbnail__quantity">{{$item['quantity']}}</span>
							</div>

						</td>
						<th class="product__description" scope="row">
							<span class="product__description__name order-summary__emphasis">{{$item['product']}}</span>
							<span class="product__description__variant order-summary__small-text">{{$item['pack_name']}} {{(isset($item['color']))?'/ '.$item['color']:FALSE}}</span>
						</th>
						<td class="product__price">
							@php
								if(!empty($item['sale'])):
									$price = $item['sale'];
								else:
									$price = $item['price'];
								endif;
								$subtotal += $price*$item['quantity'];
							@endphp
							<span class="order-summary__emphasis" data-price="{{$price}}">{{number_format($price)}}VND</span>
						</td>
					</tr>
				</tbody>
			</table>
		</li>
		@endforeach
		<li class="discount">
			<input type="text" name="discount" placeholder="Mã giảm giá" class="form-control">
			<button class="btn">Sử dụng</button>
		</li>
		<li>
			<table class="total-line-table table">
				<tbody class="total-line-table__tbody">
					<tr class="total-line total-line--subtotal">
						<th class="total-line__name" scope="row">Tạm tính</th>
						<td class="total-line__price">
							<span class="order-summary__emphasis" data-checkout-subtotal-price-target="{{$subtotal}}">{{number_format($subtotal)}}VND</span>
						</td>
					</tr>
					<tr class="total-line total-line--shipping">
						<th class="total-line__name" scope="row">
							Giao hàng
						</th>
						<td class="total-line__price">
							<span class="order-summary__emphasis" data-checkout-total-shipping-target="30000">
								30.000VND
							</span>
						</td>
					</tr>
				</tbody>
				<tfoot class="total-line-table__footer">
					<tr class="total-line">
						<th class="total-line__name payment-due-label" scope="row">
							<span class="payment-due-label__total">Tổng cộng</span>
						</th>
						<td class="total-line__price payment-due">
							<span class="payment-due__price" data-checkout-payment-due-target="{{$subtotal + 30000}}">
								{{number_format($subtotal + 30000)}}VND
							</span>
						</td>
					</tr>
				</tfoot>
			</table>
		</li>
	</ul>
</div>