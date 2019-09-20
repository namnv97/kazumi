<div class="row">
	<div class="col-md-8 col-xs-12 col-sm-12">
		<div class="PageLayout__Section">
			<div class="Segment">
				<div class="Segment__Title Segment__Title--flexed">
					<span class="Heading Text--subdued u-h7 total_result_search">{{count($products)}} kết quả</span>
					<a class="Heading Link Link--secondary u-h7" href="{{route('client.search',['s' => $s,'type' => 'product'])}}" target="_blank">Xem tất cả</a>
				</div>
				<div class="Segment__Content">
					<div class="row result_search">
						@if(count($products) > 0)
						@foreach($products as $product)
						<div class="col-md-4 col-sm-4 col-xs-12">
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
						@endif
					</div>
				</div>
			</div>

		</div>
	</div>
	<div class="col-md-4 col-xs-12 col-sm-4">
		<div class="PageLayout__Section PageLayout__Section--secondary">
			<div class="Segment">
				<div class="Segment__Title Segment__Title--flexed">
					<span class="Heading Text--subdued u-h7">Bài viết &amp; Trang</span>
					<a class="Heading Link Link--secondary u-h7" href="{{route('client.search',['s' => $s,'type' => 'post'])}}" target="_blank">Xem tất cả</a>
				</div>
				<div class="Segment__Content">

					<ul class="Linklist result_search_ul">
						@if(count($pages))
						@foreach($pages as $page)
						<li class="Linklist__Item">
							<a href="{{route('client.page.index',['slug' => $page->slug])}}" class="Link Link--secondary">{{$page->name}}</a>
						</li>
						@endforeach
						@endif
						@if(count($articles)))
						@foreach($articles as $article)
						<li class="Linklist__Item">
							<a href="{{route('client.articles.single',['slug' => $article->slug])}}" class="Link Link--secondary">{{$article->title}}</a>
						</li>
						@endforeach
						@endif
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>