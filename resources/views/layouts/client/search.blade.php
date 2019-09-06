<div class="search bg-grey">
	<div class="Search__SearchBar">
		<form class="Search__Form">
			<input type="search" class="Search__Input Heading" placeholder="Search...">
		</form>

		<button class="Search__Close Link Link--primary" data-action="close-modal"><svg class="Icon Icon--close" role="presentation" viewBox="0 0 16 14">
			<path d="M15 0L1 14m14 0L1 0" stroke="currentColor" fill="none" fill-rule="evenodd"></path>
		</svg></button>
	</div>
	<div class="Search__Results">
		<div class="row">
			<div class="col-md-8 col-xs-12 col-sm-12">
				<div class="PageLayout__Section">
					<div class="Segment">
						<div class="Segment__Title Segment__Title--flexed">
							<span class="Heading Text--subdued u-h7 total_result_search">{{count($pros)}} kết quả</span>
							<a class="Heading Link Link--secondary u-h7" href="#">Xem tất cả</a>
						</div>
						<div class="Segment__Content">
							<div class="row result_search" >
								@foreach($pros as $key => $value)
								<div class="col-md-4 col-sm-4 col-xs-12">
									<div class="product-item">
										<div class="pro-img">
											<a href="#">
												<img src="{{$value->gallery[0]->url}}" alt="">
												<div class="img-hide">
													<?php $a = 0; ?>
													<img src="{{$a}}" alt="">
												</div>
											</a>
										</div>
										<div class="info-product">
											<h3 class="title-pro"><a href="#">{{$value->name}}</a></h3>
											<?php $sale = $value->price()->sale ? $value->price()->sale : ""; ?>
											@if($sale != "")
											<span class="price"><span class="price-sale">${{$value->price()->sale}} VND</span> 
											<span class="old-price"> ${{$value->price()->price}} VND</span></span>
											@else
											<span class="price">FROM <span>${{$value->price()->price}} VND</span></span>
											
											@endif
										</div>
										@if($sale != "")
										<div class="tag-stt">
											<span>On sale</span>
										</div>
										@endif
									</div>
								</div>
								@endforeach
								
							</div>
						</div>
					</div>
					
				</div>
			</div>
			<div class="col-md-4 col-xs-12 col-sm-4">
				<div class="PageLayout__Section PageLayout__Section--secondary">
					<div class="Segment">
						<div class="Segment__Title Segment__Title--flexed">
							<span class="Heading Text--subdued u-h7">Pages &amp; Journal</span>
							<a class="Heading Link Link--secondary u-h7" href="#">View all</a>
						</div>
						<div class="Segment__Content">
							<ul class="Linklist">
								<li class="Linklist__Item">
									<a href="#" class="Link Link--secondary">3 Reasons to Attend IMATS With ESQIDO</a>
								</li>
								<li class="Linklist__Item">
									<a href="#" class="Link Link--secondary">ESQIDO officially launches in Holt Renfrew + Launch event recap</a>
								</li>
								<li class="Linklist__Item">
									<a href="#" class="Link Link--secondary">This Winter, Embrace Self-Care</a>
								</li>
								<li class="Linklist__Item">
									<a href="#" class="Link Link--secondary">Terms and Conditions</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
</div>