<div class="relate-pro">
	<div class="container">
		<div class="title-home">
			<h2 class="title-large">Sản phẩm liên quan</h2>
		</div>
		<div class="row">
			@if(count($relates) > 0)
			@foreach($relates as $relate)
			<div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
				<div class="product-item">
					<div class="pro-img">
						@php
							$relate_gallery = $relate->gallery;
							$imgf = $relate_gallery[0]->url;
							$imgs = (isset($relate_gallery[1]))?$relate_gallery[1]->url:$relate_gallery[0]->url;
						@endphp
						<a href="{{route('client.product.index',['slug' => $relate->slug])}}">
							<img src="{{asset(asset($imgf))}}" alt="{{$relate->name}}">
							<div class="img-hide">
								<img src="{{asset($imgs)}}" alt="{{$relate->name}}">
							</div>
						</a>
					</div>
					<div class="info-product">
						<h3 class="title-pro">
							<a href="{{route('client.product.index',['slug' => $relate->slug])}}">{{$relate->name}}</a>
						</h3>
						<div class="price">
							@if(!empty($relate->price()->sale))
							<span class="price-sale">{{number_format($relate->price()->sale)}}VND</span>
							<span class="old-price">{{number_format($relate->price()->price)}}VND</span>
							@else
							Chỉ từ <span>{{number_format($relate->price()->price)}}VND</span>
							@endif
						</div>
					</div>
				</div>
			</div>
			@endforeach
			@endif
		</div>
	</div>
</div>