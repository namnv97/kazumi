@if(count($essentials) > 0)
<div class="essentials">
	<p class="product-addons-heading">Sản phẩm đi kèm</p>
	<ul>
		@foreach($essentials as $essential)
		@php
		$es_pro = $essential->product();
		@endphp
		<li>
			<label class="check-box">
				<input type="checkbox" value="{{$es_pro->price()->id}}">
				<span class="checkmark"></span>
			</label>
			<div class="pro-item-essentials">
				<a href="{{route('client.product.index',['slug' => $es_pro->slug])}}">
					<img src="{{asset($es_pro->gallery[0]->url)}}" alt="{{$es_pro->name}}">
					<p>{{$es_pro->name}}</p>
					<span class="price">
						@if(!empty($es_pro->price()->sale))
						<span class="price-sale">{{number_format($es_pro->price()->sale)}}VND</span>
						&ensp;
						<span class="old-price">{{number_format($es_pro->price()->price)}}VND</span>
						@else
						<span>{{number_format($es_pro->price()->price)}}VND</span>
						@endif
					</span>
				</a>
			</div>
		</li>
		@endforeach
	</ul>
</div>
@endif