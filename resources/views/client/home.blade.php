@extends('layouts.client')
@section('title')
Trang chủ
@endsection
@section('css')

@endsection
@section('content')

<div class="home bg-grey">
	<div class="bn-home">
		<div class="owl-carousel owl-theme slide-bn-home">
			@if(!empty($slides))
			@foreach($slides as $slide)
			<div class="item">

				<div class="slide-home-item" style="background-image: url({{$slide->meta_value}})">
					
				</div>
			</div>
			@endforeach
			@endif
			
		</div>
	</div>
	<div class="best-sellers p-35">
		<div class="container-fluid">
			<div class="title-home">
				<h3 class="title-small">FEATURING</h3>
				<h2 class="title-large">OUR BEST SELLERS</h2>
			</div>
			@if(count($products) > 0)
			<div class="row">
				@if(!empty($products))
				@foreach($products as $value)
				<div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
					<div class="product-item wow fadeInUp">
						<div class="pro-img">
							<a href="#">
								<img src="{{$value->gallery[0]->url}}" alt="">
								<div class="img-hide">
									<?php $a = isset($value->gallery[1]->url)?$value->gallery[1]->url:$value->gallery[0]->url; ?>
									<img src="{{$a}}" alt="">
								</div>
							</a>
						</div>
						<div class="info-product">
							<?php $price = $value->price()->price; ?>
							<h3 class="title-pro"><a href="#">{{$value->name}}</a></h3>
							<span class="price">FROM <span>${{$price}} USD</span></span>
						</div>
					</div>
				</div>
				@endforeach
				@endif
				
			</div>
			@endif
			<div class="SectionHeader__ButtonWrapper">
				<div class="ButtonGroup ButtonGroup--spacingSmall "><a href="#" class="ButtonGroup__Item Button">SHOP ALL BEST SELLERS</a></div>
			</div>
		</div>
	</div>
	<div class="product-type p-35">
		<div class="container-fluid">
			<div class="row">
				@if(!empty($collections))
				@foreach($collections as $key => $value)
				<div class="col-md-4 col-sm-6 col-xs-12">
					<div class="product-type-item">
						<div class="bg-pro-item">
							<img src="{{$collection_gallery[$key]->meta_value}}" alt="">
						</div>
						<div class="product-type-info">
							<h3 class="title-small">{{$collection_title[$key]->meta_value}}</h3>
							<h2 class="title-large">{{$value->name}}</h2>
							<div class="SectionHeader__ButtonWrapper">
								<div class="ButtonGroup ButtonGroup--spacingSmall "><a href="#" class="ButtonGroup__Item Button">Detail</a></div>
							</div>
						</div>
					</div>
				</div>
				@endforeach
				@endif
				
			</div>
		</div>
	</div>
	<div class="home-about">
		<div class="row">
			@if(!empty($about_title1))
			@foreach($about_title1 as $key => $value)
			@if($key%2 == 0)
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<div class="home-about-info">
					@if(!empty($about_title1))
					<h3 class="title-small">{{$about_title1[$key]->meta_value}}</h3>
					@endif
					@if(!empty($about_title2))
					<h2 class="title-large">{{$about_title2[$key]->meta_value}}</h2>
					@endif
					@if(!empty($about_content))
					<p>{{$about_content[$key]->meta_value}}</p>
					@endif
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<div class="home-about-img wow fadeInRight">
					@if(!empty($about_gallery))
					<img src="{{$about_gallery[$key]->meta_value}}" alt="">
					@endif
				</div>
			</div>
			@else

			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<div class="home-about-img wow fadeInRight">
					
					<img src="{{$about_gallery[$key]->meta_value}}" alt="">

				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<div class="home-about-info">
					<h3 class="title-small">{{$about_title1[$key]->meta_value}}</h3>
					<h2 class="title-large">{{$about_title2[$key]->meta_value}}</h2>
					<p>{{$about_content[$key]->meta_value}}</p>
				</div>
			</div>
			@endif
			@endforeach
			@endif
			
		</div>
	</div>
	<div class="home-video" @if(!empty($video_gallery)) style="background-image: url('{{$video_gallery->meta_value}}')" @endif >
		<div class="title-home">
			@if(!empty($video_title1))
			<h3 class="title-small">{{$video_title1->meta_value}}</h3>
			@endif
			@if(!empty($video_title2))
			<h2 class="title-large">{{$video_title2->meta_value}}</h2>
			@endif
		</div>
		<div class="SectionHeader__IconHolder">
			@if(!empty($video))
			<a data-fancybox href="{{$video->meta_value}}">
				<svg class="Icon--play" role="presentation" viewBox="0 0 24 24">
					<path d="M12 0C5.383 0 0 5.383 0 12s5.383 12 12 12 12-5.383 12-12S18.617 0 12 0zm-2 15.5V9l4.5 3.25L10 15.5z" fill="currentColor"></path>
				</svg>
			</a>
			@endif
		</div>
	</div>
	<div class="home-discover p-35">
		<div class="container-fluid">
			<div class="title-home">
				@if(!empty($look_title1))
				<h3 class="title-small">{{$look_title1->meta_value}}</h3>
				@endif
				@if(!empty($look_title2))
				<h2 class="title-large">{{$look_title2->meta_value}}</h2>
				@endif
			</div>
			@if(count($products_look) > 0)
			<div class="owl-carousel owl-theme slide-discover">
				@if(!empty($products_look))
				@foreach($products_look as $key => $value)
				<div class="item">
					<div class="row">
						<div class="col-md-7 col-lg-7 col-sm-6 col-xs-12">
							<div class="home-discover-img">
								<img src="{{$products_look_gallery[$key]->meta_value}}" alt="">
							</div>
						</div>
						<div class="col-md-5 col-lg-5 col-sm-6 col-xs-12">
							<div class="home-discove-pro">
								<div class="product-item">
									<div class="pro-img">
										<?php $a = isset($value->gallery[1]->url)?$value->gallery[1]->url:$value->gallery[0]->url; ?>
										<a href="#">
											<img src="{{$value->gallery[0]->url}}" alt="">
											<div class="img-hide">
												<img src="{{$a}}" alt="">
											</div>
										</a>
									</div>
									<div class="info-product">
										<h3 class="title-pro"><a href="#">{{$value->name}}</a></h3>
										<?php $sale = $value->price()->sale ? $value->price()->sale : ""; ?>
										@if($sale != "")
										<span class="price"><span class="price-sale">${{$value->price()->sale}} USD</span> 
										<span class="old-price">${{$value->price()->price}} USD</span></span>
										@else
										<span class="old-price" style="text-decoration: none!important;">${{$value->price()->price}} USD</span></span>
										@endif
									</div>
									<div class="SectionHeader__ButtonWrapper">
										<div class="ButtonGroup ButtonGroup--spacingSmall "><a href="#" class="ButtonGroup__Item Button">VIEW THIS PRODUCT</a></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				@endforeach
				@endif
			</div>
			@endif
		</div>
	</div>
	
	
</div>

@endsection
@section('script')

@endsection