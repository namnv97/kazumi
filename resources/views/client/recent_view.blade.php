@if(count($recents) > 0)
<div class="recently-viewed">
	<div class="container">
		<div class="title-home">
			<h2 class="title-large">Xem gần đây</h2>
		</div>
		<div class="owl-carousel owl-theme slide-pro-recently">
			@foreach($recents as $recent)
			<div class="item">
				<div class="product-item">
					<div class="pro-img">
						@php
							$relate_gallery = $recent->gallery;
							$imgf = $relate_gallery[0]->url;
							$imgs = (isset($relate_gallery[1]))?$relate_gallery[1]->url:$relate_gallery[0]->url;
						@endphp
						<a href="{{route('client.product.index',['slug' => $recent->slug])}}">
							<img src="{{asset(asset($imgf))}}" alt="{{$recent->name}}">
							<div class="img-hide">
								<img src="{{asset($imgs)}}" alt="{{$recent->name}}">
							</div>
						</a>
					</div>
					<div class="info-product">
						<h3 class="title-pro">
							<a href="{{route('client.product.index',['slug' => $recent->slug])}}">{{$recent->name}}</a>
						</h3>
						<div class="price">
							@if(!empty($recent->price()->sale))
							<span class="price-sale">{{number_format($recent->price()->sale)}}VND</span>
							<span class="old-price">{{number_format($recent->price()->price)}}VND</span>
							@else
							Chỉ từ <span>{{number_format($recent->price()->price)}}VND</span>
							@endif
						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>
@endif