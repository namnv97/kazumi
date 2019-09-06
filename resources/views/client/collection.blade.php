@extends('layouts.client')
@section('title')
Danh Mục
@endsection
@section('css')

@endsection
@section('content')

	<div class="shop-page bg-grey">
		<div class="bn-shop" style="background-image: url('https://cdn.shopify.com/s/files/1/0250/1519/collections/esqido-my-account-xl_1400x.jpg?v=1551682441')">
			<div class="bn-shop-content">
				<h1 class="title-large">BEST SELLERS</h1>
				<p>First time here? Try our best sellers.</p>
			</div>
		</div>
		<div class="shop-content">
			<div class="col-product">
				<div class="list-pro p-35">
					<div class="container-fluid">
						<div class="row">
							@foreach($products as $key => $value)
							<div class="col-md-4 col-lg-4 col-sm-12 col-xs-12 col-pro">
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
										<h3 class="title-pro"><a href="#">{{$value->name}}</a></h3>
										
										<?php $sale = $value->price()->sale ? $value->price()->sale : ""; ?>
										@if($sale != "")
										<span class="price"><span class="price-sale">${{$value->price()->sale}} USD</span> 
										<span class="old-price"> ${{$value->price()->price}} USD</span></span>
										@else
										<span class="price">FROM <span>${{$value->price()->price}} USD</span></span>
										
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
				<div class="CollectionToolbar">
					<div class="CollectionToolbar__Group">
						<button class="CollectionToolbar__Item CollectionToolbar__Item--filter">Filter </button>
              			<button class="CollectionToolbar__Item CollectionToolbar__Item--sort" >Sort <i class="fa fa-angle-down" aria-hidden="true"></i></button>
              		</div>
              		<div class="CollectionToolbar__Item--layout">
            			<div class="CollectionToolbar__LayoutSwitch hidden-md hidden-lg">
              				<button><svg class="Icon Icon--wall-1" role="presentation" viewBox="0 0 36 36">
						      <rect fill="currentColor" width="36" height="36"></rect>
						    </svg></button>
              				<button><svg class="Icon Icon--wall-2" role="presentation" viewBox="0 0 36 36">
						      <path fill="currentColor" d="M21 36V21h15v15H21zm0-36h15v15H21V0zM0 21h15v15H0V21zM0 0h15v15H0V0z"></path>
						    </svg></button>
            			</div>

            			<div class="CollectionToolbar__LayoutSwitch hidden-sm hidden-xs">
             				<button class="CollectionToolbar__LayoutType two"><svg class="Icon Icon--wall-2" role="presentation" viewBox="0 0 36 36">
						      <path fill="currentColor" d="M21 36V21h15v15H21zm0-36h15v15H21V0zM0 21h15v15H0V21zM0 0h15v15H0V0z"></path>
						    </svg></button>
              				<button class="CollectionToolbar__LayoutType four is-active"><svg class="Icon Icon--wall-4" role="presentation" viewBox="0 0 36 36">
						      <path fill="currentColor" d="M28 36v-8h8v8h-8zm0-22h8v8h-8v-8zm0-14h8v8h-8V0zM14 28h8v8h-8v-8zm0-14h8v8h-8v-8zm0-14h8v8h-8V0zM0 28h8v8H0v-8zm0-14h8v8H0v-8zM0 0h8v8H0V0z"></path>
						    </svg></button>
            			</div>
          			</div>
          			<div id="collection-sort-popover" class="Popover Popover--alignRight Popover--positionTop">
          				<div class="Popover__Content">
          					<div class="Popover__ValueList">
          						
          						<a href="{{url()->current().'?sort_by=best-selling'}}" class="Popover__Value  Heading Link Link--primary u-h6">Best selling</a>
          						<a href="{{url()->current().'?sort_by=name_asc'}}" class="Popover__Value  Heading Link Link--primary u-h6">Alphabetically, A-Z</a>
          						<a href="{{url()->current().'?sort_by=name_desc'}}" class="Popover__Value  Heading Link Link--primary u-h6">Alphabetically, Z-A</a>
          						<a href="{{url()->current().'?sort_by=price_asc'}}" class="Popover__Value  Heading Link Link--primary u-h6">Price, low to high</a>
          						<a href="{{url()->current().'?sort_by=price_desc'}}" class="Popover__Value  Heading Link Link--primary u-h6">Price, high to low</a>
          						<a href="{{url()->current().'?sort_by=date_asc'}}" class="Popover__Value  Heading Link Link--primary u-h6">Date, old to new</a>
          						<a href="{{url()->current().'?sort_by=date_desc'}}" class="Popover__Value  Heading Link Link--primary u-h6">Date, new to old</a>
          					</div>
          				</div>
          			</div>
				</div>
			</div>
			<div class="recently-viewed p-35">
				<div class="container-fluid">
					<div class="title-home">
						<h2 class="title-large">RECENTLY VIEWED</h2>
					</div>
					<div class="owl-carousel owl-theme slide-pro-recently">
					    <div class="item">
					    	<div class="product-item">
								<div class="pro-img">
									<a href="#">
										<img src="https://cdn.shopify.com/s/files/1/0250/1519/products/esqido-unisyn-lashes-peace_love_400x.jpg?v=1551684701" alt="">
										<div class="img-hide">
											<img src="https://cdn.shopify.com/s/files/1/0250/1519/products/esq-unisyn-false-eyelashes-peace-and-love_61716f75-d011-421a-94ff-fb9bab042d0f_300x.jpg?v=1551684702" alt="">
										</div>
									</a>
								</div>
								<div class="info-product">
									<h3 class="title-pro"><a href="#">COMPANION EYELASH GLUE</a></h3>
									<span class="price">FROM <span>$22.00 USD</span></span>
								</div>
							</div>
					    </div>
					    <div class="item">
					    	<div class="product-item">
								<div class="pro-img">
									<a href="#">
										<img src="https://cdn.shopify.com/s/files/1/0250/1519/products/esqido-eyeliner-black_36951340-4df7-4968-9fb0-941831b2e154_400x.jpg?v=1552317334" alt="">
										<div class="img-hide">
											<img src="https://cdn.shopify.com/s/files/1/0250/1519/products/esq-gel-liner-arm-example-black-notext_600x.jpg?v=1552317334" alt="">
										</div>
									</a>
								</div>
								<div class="info-product">
									<h3 class="title-pro"><a href="#">COMPANION EYELASH GLUE</a></h3>
									<span class="price"><span class="price-sale">$14.00 USD</span> <span class="old-price">$16.00 USD</span></span>
								</div>
								<div class="tag-stt">
									<span>On sale</span>
								</div>
							</div>
					    </div>
					    <div class="item">
					    	<div class="product-item">
								<div class="pro-img">
									<a href="#">
										<img src="https://cdn.shopify.com/s/files/1/0250/1519/products/esqido-unisyn-lashes-peace_love_400x.jpg?v=1551684701" alt="">
										<div class="img-hide">
											<img src="https://cdn.shopify.com/s/files/1/0250/1519/products/esq-unisyn-false-eyelashes-peace-and-love_61716f75-d011-421a-94ff-fb9bab042d0f_300x.jpg?v=1551684702" alt="">
										</div>
									</a>
								</div>
								<div class="info-product">
									<h3 class="title-pro"><a href="#">COMPANION EYELASH GLUE</a></h3>
									<span class="price">FROM <span>$22.00 USD</span></span>
								</div>

							</div>
					    </div>
					    <div class="item">
					    	<div class="product-item">
								<div class="pro-img">
									<a href="#">
										<img src="https://cdn.shopify.com/s/files/1/0250/1519/products/esqido-eyeliner-black_36951340-4df7-4968-9fb0-941831b2e154_400x.jpg?v=1552317334" alt="">
										<div class="img-hide">
											<img src="https://cdn.shopify.com/s/files/1/0250/1519/products/esq-gel-liner-arm-example-black-notext_600x.jpg?v=1552317334" alt="">
										</div>
									</a>
								</div>
								<div class="info-product">
									<h3 class="title-pro"><a href="#">COMPANION EYELASH GLUE</a></h3>
									<span class="price"><span class="price-sale">$14.00 USD</span> <span class="old-price">$16.00 USD</span></span>
								</div>
								<div class="tag-stt">
									<span>On sale</span>
								</div>
							</div>
					    </div>
					    <div class="item">
					    	<div class="product-item">
								<div class="pro-img">
									<a href="#">
										<img src="https://cdn.shopify.com/s/files/1/0250/1519/products/esqido-eyeliner-black_36951340-4df7-4968-9fb0-941831b2e154_400x.jpg?v=1552317334" alt="">
										<div class="img-hide">
											<img src="https://cdn.shopify.com/s/files/1/0250/1519/products/esq-gel-liner-arm-example-black-notext_600x.jpg?v=1552317334" alt="">
										</div>
									</a>
								</div>
								<div class="info-product">
									<h3 class="title-pro"><a href="#">COMPANION EYELASH GLUE</a></h3>
									<span class="price"><span class="price-sale">$14.00 USD</span> <span class="old-price">$16.00 USD</span></span>
								</div>
							</div>
					    </div>
					</div>
				</div>
			</div>
		</div>
		<div class="bn-shop bn-bottom" style="background-image: url('https://cdn.shopify.com/s/files/1/0250/1519/files/esqido-mink-lashes-lash-guide-banner_1500x_70c2c35f-9a0e-46c4-a9c7-e13e3b51b207_1500x.jpg?v=1551671204')">
			<div class="bn-shop-content">
				<h2 class="title-large">CAN'T DECIDE?</h2>
				<p>Try our <a href="#">Interactive Lash Guide</a> to find the perfect pair.</p>
			</div>
		</div>
	</div>
	<div id="filter">
		<div class="PageOverlay"></div>
		<div class="Drawer">
			<div class="Drawer__Header Drawer__Header--bordered Drawer__Container">
		      	<span class="Drawer__Title Heading u-h4">FILTERS</span>

		      	<button class="Drawer__Close Icon-Wrapper--clickable"><svg class="Icon Icon--close" role="presentation" viewBox="0 0 16 14">
		      	<path d="M15 0L1 14m14 0L1 0" stroke="currentColor" fill="none" fill-rule="evenodd"></path>
		    	</svg></button>
		  	</div>
		  	<form class="Cart Drawer__Content">
    			<div class="Drawer__Main">
    				<div class="Drawer__Container">
    					<p class="Heading">FILTERS</p>
						<div class="Collapsible__Inner">
		                  	<div class="Collapsible__Content">
		                    	<ul class="Linklist">
		                    		<li class="Linklist__Item">
		                          		<button type="button" class="Link Link--primary Text--subdued">anastasia</button>
		                        	</li>
		                        	<li class="Linklist__Item">
		                          		<button type="button" class="Link Link--primary Text--subdued">Clusters</button>
		                        	</li>
		                        	<li class="Linklist__Item">
		                          		<button type="button" class="Link Link--primary Text--subdued" >companion-eyelash-glue|14590783881265</button>
		                        	</li>
		                        	<li class="Linklist__Item">
		                          		<button type="button" class="Link Link--primary Text--subdued">Criss-Crossed</button>
		                        	</li>
		                        	<li class="Linklist__Item">
		                          		<button type="button" class="Link Link--primary Text--subdued">Maximum Volume</button>
		                        	</li>
		                        	<li class="Linklist__Item">
		                          		<button type="button" class="Link Link--primary Text--subdued">Medium Volume</button>
		                        	</li>
		                        	<li class="Linklist__Item">
		                          		<button type="button" class="Link Link--primary Text--subdued">New</button>
		                        	</li>
		                        	<li class="Linklist__Item">
		                          		<button type="button" class="Link Link--primary Text--subdued">Straight Strands</button>
		                        	</li>
		                        	<li class="Linklist__Item">
		                          		<button type="button" class="Link Link--primary Text--subdued">Upper Lashes</button>
		                        	</li>
		                        	<li class="Linklist__Item">
		                          		<button type="button" class="Link Link--primary Text--subdued">Winged Out</button>
		                        	</li>
		                        </ul>
		                  	</div>
		                </div>
          			
			        </div>
			    </div>
			    <div class="Drawer__Footer">
			    	<div class="SectionHeader__ButtonWrapper">
			    		<div class="ButtonGroup ButtonGroup--spacingSmall ">
			    			<button type="button" class="ButtonGroup__Item ButtonGroup__Item--expand Button Button--primary" data-action="apply-tags">Apply</button>
			    		</div>
			    	</div>
			    	
			    </div>
			</form>
		</div>
	</div>

@endsection
@section('script')

@endsection