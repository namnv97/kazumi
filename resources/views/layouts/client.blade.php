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
    @yield('css')
</head>
<body>
	@include('layouts.client.header')
	@yield('content')
	@include('layouts.client.footer')
	@include('layouts.client.cart')
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