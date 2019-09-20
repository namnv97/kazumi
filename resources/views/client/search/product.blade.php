@extends('layouts.client')
@section('title')
Kết quả tìm kiếm cho {{request()->s}}
@endsection
@section('css')
<style>
	.page-search
	{
		margin-top: 80px;
		background: #ddd;
		padding-bottom: 20px;
	}

	.page-search>.container>.row>.col-md-3:nth-child(4n+1)
	{
		clear: both;
	}

	.page-search .count_result
	{
		display: inline-block;
		padding: 10px;
		font-size: 18px;
		font-weight: bold;
		color: #b56a28;
	}
</style>
@endsection
@section('content')
<div class="page-search">
	<div class="container">
		<h1>Kết quả tìm kiếm: {{request()->s}}</h1>
		@if(count($products) > 0)
		<span class="count_result">Có {{count($products)}} kết quả cho "{{request()->s}}"</span>
		<div class="row">
			@foreach($products as $product)
			<div class="col-md-3 col-sm-12 col-xs-12">
				<div class="product-item">
					<div class="pro-img">
						<a href="{{route('client.product.index',['slug' => $product->slug])}}">
							<img src="{{asset($product->gallery[0]->url)}}" alt="{{$product->name}}">
							<div class="img-hide">
								<img src="{{asset($product->gallery[1]->url?$product->gallery[1]->url:$product->gallery[0]->url)}}" alt="{{$product->name}}">
							</div>
						</a>
					</div>

					<div class="info-product">
						<h3 class="title-pro">
							<a href="{{route('client.product.index',['slug' => $product->slug])}}">{{$product->name}}</a>
						</h3>
						<span class="price">
							@if(!empty($product->price()->sale))
							<span class="price-sale">{{number_format(intval($product->price()->sale))}} VNĐ</span> 
							<span class="old-price">{{number_format(intval($product->price()->price))}} VNĐ</span>
							@else
							<span class="price-sale">Từ {{number_format(intval($product->price()->price))}} VNĐ</span>
							@endif
						</span>
					</div>
					@if(!empty($product->price()->sale))
					<div class="tag-stt">
						<span>Giảm giá</span>
					</div>
					@endif
				</div>
			</div>
			@endforeach
		</div>
		@else
		<div class="alert alert-warning">
			<p>Không có kết quả phù hợp. Vui lòng thử lại.</p>
		</div>
		@endif
	</div>
</div>
@endsection
@section('script')

@endsection