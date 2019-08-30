<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title','Kazumi')</title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap&subset=latin-ext,vietnamese" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&display=swap&subset=latin-ext,vietnamese" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('/assets/client/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('/assets/client/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('/assets/client/css/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{asset('/assets/client/css/owl.theme.default.min.css')}}">
	<link rel="stylesheet" href="{{asset('/assets/client/css/jquery.fancybox.min.css')}}">
	<link rel="stylesheet" href="{{asset('/assets/client/css/animate.css')}}">
	<link rel="stylesheet" href="{{asset('/assets/client/css/style.css')}}">
	<script src="{{asset('/assets/client/js/wow.min.js')}}"></script>
	<script type="text/javascript">
        new WOW().init();
    </script>
</head>
<body>
	@include('layouts.client.header')
	@yield('content')
	@include('layouts.client.footer')
	<div id="sidebar-cart">
		<div class="PageOverlay"></div>
		<div class="Drawer">
			<div class="Drawer__Header Drawer__Header--bordered Drawer__Container">
		      	<span class="Drawer__Title Heading u-h4">Cart</span>

		      	<button class="Drawer__Close Icon-Wrapper--clickable"><svg class="Icon Icon--close" role="presentation" viewBox="0 0 16 14">
		      	<path d="M15 0L1 14m14 0L1 0" stroke="currentColor" fill="none" fill-rule="evenodd"></path>
		    	</svg></button>
		  	</div>
		  	<form class="Cart Drawer__Content">
    			<div class="Drawer__Main">
    				<div class="Drawer__Container">

          				<div class="Cart__ItemList">
          					<div class="CartItemWrapper">
          						<div class="CartItem">
      								<div class="CartItem__ImageWrapper AspectRatio">
        								<div class="AspectRatio" style="--aspect-ratio: 1.0">
          									<img class="CartItem__Image" src="//cdn.shopify.com/s/files/1/0250/1519/products/esqido-mink-lashes-silhouette_2f9d1280-a613-4cf7-bfbb-de47f7e47d5b_240x.jpg?v=1551684692" alt="Silhouette">
        								</div>
      								</div>

      								<div class="CartItem__Info">
        								<h2 class="CartItem__Title Heading">
          									<a href="#">Silhouette
												<span class="booster-cart-item-success-notes"></span><span class="booster-cart-item-upsell-notes"></span>
											</a>
        								</h2>

        								<div class="CartItem__Meta Heading Text--subdued">
        									<p class="CartItem__Variant">1-Pair</p>
        									<div class="CartItem__PriceList wsg-item-price_14590764351537">
        										<span class="CartItem__Price Price">
        											<span class="Bold-theme-hook-DO-NOT-DELETE-comment-bold_cart_item_price_2" style="display:none !important;"></span>
        											<span class="money" data-original-value="2900" data-usd="$29.00 USD">$29.00 USD</span>
        										</span>
        									</div>
        								</div>
        								<div class="CartItem__Actions Heading Text--subdued" style="text-align: center">
            								<div class="CartItem__QuantitySelector">
              									<div class="QuantitySelector">
              										<a class="wsgReload QuantitySelector__Button Link Link--primary" title="Set quantity to 1" href="#"><svg class="Icon Icon--minus" role="presentation" viewBox="0 0 16 2">
      													<path d="M1,1 L15,1" stroke="currentColor" fill="none" fill-rule="evenodd" stroke-linecap="square"></path>
    													</svg>
    												</a>

                									<input type="text" name="" id="" class="QuantitySelector__CurrentQuantity" value="2">
                									<a class="wsgReload QuantitySelector__Button Link Link--primary" title="Set quantity to 3" href="#"><svg class="Icon Icon--plus" role="presentation" viewBox="0 0 16 16">
													      <g stroke="currentColor" fill="none" fill-rule="evenodd" stroke-linecap="square">
													        <path d="M8,1 L8,15"></path>
													        <path d="M1,8 L15,8"></path>
													      </g>
													    </svg>
													</a>
             									 </div>
            								</div>

            								<a href="#" class="CartItem__Remove Link Link--underline Link--underlineShort">Remove</a>
          								</div>
      								</div>
      							</div>
      						</div>
      					</div>
			        </div>
			    </div>
			    <div class="Drawer__Footer">
			    	<div class="SectionHeader__ButtonWrapper">
			    		<div class="ButtonGroup ButtonGroup--spacingSmall ">
			    			<button type="submit" name="checkout" class="Cart__Checkout Button ButtonGroup__Item">
					          	<span>Checkout</span>
					          	<span class="Button__SeparatorDot"></span>
					          	<span>
					          		<span class="wh-original-cart-total">
					          			<span class="wh-original-price">
					          				<span class="money">$58.00 USD</span>
					          			</span>
					          		</span>
					          		<span class="wh-cart-total"></span>
					          		<div class="additional-notes">
					          			<span class="wh-minimums-note"></span>
					          			<span class="wh-extra-note"></span>
					          		</div>
					          	</span>
					        </button>
			    		</div>
			    	</div>
			    	
			    </div>
			</form>
		</div>
	</div>
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
	    						<span class="Heading Text--subdued u-h7">37 results</span>
	    						<a class="Heading Link Link--secondary u-h7" href="#">View all</a>
	    					</div>
	    					<div class="Segment__Content">
	    						<div class="row">
	    							<div class="col-md-4 col-sm-4 col-xs-12">
	    								<div class="product-item">
											<div class="pro-img">
												<a href="#">
													<img src="https://cdn.shopify.com/s/files/1/0250/1519/products/esqido-accessories-eyelash-companion-glue-open_400x.jpg?v=1552317290" alt="">
													<div class="img-hide">
														<img src="https://cdn.shopify.com/s/files/1/0250/1519/products/esqido-accessories-eyelash-companion-glue_900x.jpg?v=1552317290" alt="">
													</div>
												</a>
											</div>
											<div class="info-product">
												<h3 class="title-pro"><a href="#">COMPANION EYELASH GLUE</a></h3>
												<span class="price">FROM <span>$22.00 USD</span></span>
											</div>
											<div class="tag-stt">
												<span>On sale</span>
											</div>
										</div>
	    							</div>
	    							<div class="col-md-4 col-sm-4 col-xs-12">
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
											<div class="tag-stt">
												<span>Sold out</span>
											</div>
										</div>
									</div>
									<div class="col-md-4 col-sm-4 col-xs-12">
	    								<div class="product-item">
											<div class="pro-img">
												<a href="#">
													<img src="https://cdn.shopify.com/s/files/1/0250/1519/products/esqido-accessories-eyelash-companion-glue-open_400x.jpg?v=1552317290" alt="">
													<div class="img-hide">
														<img src="https://cdn.shopify.com/s/files/1/0250/1519/products/esqido-accessories-eyelash-companion-glue_900x.jpg?v=1552317290" alt="">
													</div>
												</a>
											</div>
											<div class="info-product">
												<h3 class="title-pro"><a href="#">COMPANION EYELASH GLUE</a></h3>
												<span class="price">FROM <span>$22.00 USD</span></span>
											</div>
											<div class="tag-stt">
												<span>On sale</span>
											</div>
										</div>
	    							</div>
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
	<script type="text/javascript" src="{{asset('/assets/client/js/jquery-1.9.1.js')}}"></script>
	<script type="text/javascript" src="{{asset('/assets/client/js/jquery-ui.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('/assets/client/js/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('/assets/client/js/owl.carousel.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('/assets/client/js/jquery-scrolltofixed-min.js')}}"></script>
	<script type="text/javascript" src="{{asset('/assets/client/js/jquery.fancybox.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('/assets/client/js/custom.js')}}"></script>
	@yield('script')
</body>
</html>