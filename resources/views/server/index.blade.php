@extends('layouts.server')
@section('title')
Trang quản trị
@endsection
@section('css')
<style>
	.list_ad .row .col-lg-6:nth-child(2n+1)
	{
		clear: both;
	}

	.list_ad .item
	{
		background: #fff;
		margin-bottom: 15px;
		border-radius: 10px;
		overflow: hidden;
	}

	.list_ad .item h3
	{
		text-align: center;
		padding: 10px 0;
		background: lightblue;
		position: relative;
		cursor: pointer;
		margin: 0;
	}

	.list_ad .item h3:after
	{
		content: '\f0d7';
		position: absolute;
		top: 50%;
		right: 10px;
		transform: translateY(-50%);
		font-size: 20px;
		color: #000;
		font-family: 'FontAwesome';
	}

	.list_ad .item h3.active:after
	{
		content: '\f0d8' !important;
	}

	.list_ad .item .item_ct
	{
		padding: 15px;
	}

	.list_ad .item .item_ct ul
	{
		padding: 0;
	}

	.list_ad .item .item_ct ul li
	{
		list-style: inside;
		list-style-type: disc;
	}

	.list_ad .item .item_ct ul li a:hover
	{
		color: #000;
	}
</style>
@endsection

@section('content')

<div class="page-dashboard">
	<h1>Trang quản trị</h1>
	<div class="list_ad">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
				<div class="item">
					<h3>Sản phẩm (<span>{{$products->total()}}</span>)</h3>
					<div class="item_ct">
						@if($products->count() > 0)
						<ul>
							@foreach($products as $product)
							<li>
								<a href="{{route('client.product.index',['slug' => $product->slug])}}" target="_blank">{{$product->name}}</a>
							</li>
							@endforeach
						</ul>
						<a href="{{route('admin.products.index')}}">Xem tất cả</a>
						@else
						<li>Chưa có sản phẩm nào</li>
						@endif
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<div class="item">
					<h3>Bài viết (<span>{{$articles->total()}}</span>)</h3>
					<div class="item_ct">
						@if($articles->count() > 0)
						<ul>
							@foreach($articles as $article)
							<li>
								<a href="{{route('client.articles.single',['slug' => $article->slug])}}" target="_blank">{{$article->title}}</a>
							</li>
							@endforeach
						</ul>
						<a href="{{route('admin.articles.index')}}">Xem tất cả</a>
						@else
						<li>Chưa có bài viết nào</li>
						@endif
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<div class="item">
					<h3>Người dùng (<span>{{$users->total()}}</span>)</h3>
					<div class="item_ct">
						@if($users->count() > 0)
						<ul>
							@foreach($users as $user)
							<li>
								<a href="{{route('admin.user.index')}}" target="_blank">{{$user->name}} - {{$user->email}}</a>
							</li>
							@endforeach
						</ul>
						<a href="{{route('admin.user.index')}}">Xem tất cả</a>
						@endif
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<div class="item">
					<h3>Đơn hàng (<span>{{$carts->total()}}</span>)</h3>
					<div class="item_ct">
						@if($cart_pending > 0)
						<p>{{$cart_pending}} đơn hàng đang chờ duyệt</p>
						@endif
						@if($carts->count() > 0)
						<ul>
							@foreach($carts as $cart)
							<li>
								<a href="{{route('admin.orders.edit',['id' => $cart->id])}}" target="_blank">#{{$cart->id}} - {{$cart->user()->name}} - {{$cart->phone}}</a>
							</li>
							@endforeach
						</ul>
						<a href="{{route('admin.orders.index')}}">Xem tất cả</a>
						@endif
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<div class="item">
					<h3>Đại lý (<span>{{$retailers->total()}}</span>)</h3>
					<div class="item_ct">
						@if($retailers->count() > 0)
						<ul>
						@foreach($retailers as $retailer)
							<li>
								<a href="{{route('admin.retailers.edit',['id' => $retailer->id])}}" target="_blank">{{$retailer->name}}</a>
							</li>
						@endforeach
						<a href="{{route('admin.retailers.index')}}">Xem tất cả</a>
						</ul>
						@endif
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<div class="item">
					<h3>Đánh giá (<span>{{$rates->total()}}</span>)</h3>
					<div class="item_ct">
						@if($rates->count() > 0)
						<ul>
							@foreach($rates as $rate)
							<li>
								<a href="{{route('client.product.index',['slug' => $rate->product()->slug])}}" target="_blank">{{$rate->product()->name}} - {{$rate->comment}}</a>
							</li>
							@endforeach
						</ul>
						<a href="{{route('admin.rates.index')}}">Xem tất cả</a>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

@section('script')
<script type="text/javascript">
	jQuery(document).ready(function(){
		var act = true;
		jQuery('.list_ad .item h3').on('click',function(){
			if(act == false) return false;
			act = false;
			jQuery(this).toggleClass('active');
			jQuery(this).next().slideToggle(600);
			setTimeout(function(){
				act = true;
			},600)
		});
	});
</script>
@endsection