@if($products->count() > 0)
@foreach($products as $product)
<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
	<div class="item">
		<a href="{{route('client.product.index',['slug' => $product->slug])}}">
			<img src="{{$product->gallery[0]->url}}" alt="{{$product->name}}">
		</a>
		<p class="title_product">{{$product->name}}</p>
		<a href="{{route('client.product.index',['slug' => $product->slug])}}" class="shop_style">Xem ngay</a>
	</div>
</div>
@endforeach
@endif