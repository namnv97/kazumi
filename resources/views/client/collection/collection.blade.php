@extends('layouts.client')
@section('title')
Bộ Sưu Tập | {{$collection->name}}
@endsection
@section('css')

@endsection
@section('content')

	<div class="shop-page bg-grey">
		<div class="bn-shop" style="background-image: url({{(!empty($collection->banner))?asset($collection->banner):'https://cdn.shopify.com/s/files/1/0250/1519/collections/esqido-my-account-xl_1400x.jpg?v=1551682441'}})">
			<div class="bn-shop-content">
				<h1 class="title-large">{{$collection->name}}</h1>
				<p>{{$collection->description}}</p>
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
										<span>Giảm giá</span>
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
						<button class="CollectionToolbar__Item CollectionToolbar__Item--filter">Lọc </button>
              			<button class="CollectionToolbar__Item CollectionToolbar__Item--sort" >Sắp xếp theo <i class="fa fa-angle-down" aria-hidden="true"></i></button>
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
          						
          						<a href="{{url()->current().'?sort_by=best-selling'}}" class="Popover__Value  Heading Link Link--primary u-h6">Bán chạy nhất</a>
          						<a href="{{url()->current().'?sort_by=name_asc'}}" class="Popover__Value  Heading Link Link--primary u-h6">Từ A-Z</a>
          						<a href="{{url()->current().'?sort_by=name_desc'}}" class="Popover__Value  Heading Link Link--primary u-h6">Từ Z-A</a>
          						<a href="{{url()->current().'?sort_by=price_asc'}}" class="Popover__Value  Heading Link Link--primary u-h6">Giá từ thấp đến cao</a>
          						<a href="{{url()->current().'?sort_by=price_desc'}}" class="Popover__Value  Heading Link Link--primary u-h6">Giá từ cao đến thấp</a>
          						<a href="{{url()->current().'?sort_by=date_asc'}}" class="Popover__Value  Heading Link Link--primary u-h6">Mới nhất</a>
          						<a href="{{url()->current().'?sort_by=date_desc'}}" class="Popover__Value  Heading Link Link--primary u-h6">Cũ nhất</a>
          					</div>
          				</div>
          			</div>
				</div>
			</div>
			@include('client.recent_view')
		</div>
		@include('client.collection.decide')
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