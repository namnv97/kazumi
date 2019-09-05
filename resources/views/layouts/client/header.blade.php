<header>
		<div class="header-pc hidden-xs hidden-sm">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-5 col-lg-5">
						<div class="menu-left menu">
							<ul>
								@if(!empty($menus))
								@php
								$menus = json_decode($menus->meta_value,true)
								@endphp
								@foreach($menus as $key => $menu)
							    <li class="{{isset($menu['children'])?'menu-item-has-children':FALSE}} {{($key == 0)?'menu-item-has-mega':FALSE}}"><a href="{{$menu['url']}}">{{$menu['text']}}</a>
							    	@if(isset($menu['children']))
							    	<ul class="sub-menu">
							    		@foreach($menu['children'] as $item)
							    	    <li class="Linklist__Item"><a href="{{$item['url']}}">{{$item['text']}}</a></li>
							    	    @endforeach
							    	</ul>
							    	@endif
							    </li>
							    @endforeach
							    @endif
							</ul>
						</div>
					</div>
					<div class="col-md-2 col-lg-2">
						<div class="logo">
							<a href="{{route('home')}}"><img src="{{asset($logo)}}" alt="Kazumi"></a>
						</div>
					</div>
					<div class="col-md-5 col-lg-5">
						<div class="menu-right menu">
							<ul>
							    <li><a href="#">TÀI KHOẢN</a></li>
							    <li class="search-btn-head"><a href="#">TÌM KIẾM</a></li>
							    <li class="cart-btn"><a href="#">GIỎ HÀNG <span>({{$num}})</span></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="MegaMenu">
	    		<div class="row">
	    			<div class="col-md-6 col-sm-6 col-lg-6">
	    				<div class="row">
	    					@if(count($mega_menu) > 0)
	    					@foreach($mega_menu as $menus)
	    					@php
							$menu = json_decode($menus->meta_value,true);
	    					@endphp
	    					<div class="col-md-4 col-lg-4">
	    						<div class="MegaMenu__Item MegaMenu__Item--fit">
		                            <a href="{{$menu['link']}}" class="MegaMenu__Title Heading Text--subdued u-h7">{{$menu['title']}}</a>
		                            {!! $menu['content'] !!}
		                        </div>
	    					</div>
	    					@endforeach
	    					@endif
	    				</div>
	    			</div>
	    			<div class="col-md-6 col-sm-6 col-lg-6">
	    				<div class="row">
	    					@if(count($mega_product) > 0)
	    					@foreach($mega_product as $mage)
	    					<div class="col-lg-6 col-md-6">
	    						<div class="MegaMenu__Push MegaMenu__Push--shrink">
	    							<a class="MegaMenu__PushLink" href="{{$mage['slug']}}">
	    								<div class="MegaMenu__PushImageWrapper AspectRatio">
          									<img class="Image--fadeIn Image--lazyLoaded" alt="" src="{{asset($mage['image'])}}">
        								</div>
        								<p class="MegaMenu__PushHeading Heading u-h6">{{$mage['title']}}</p><p class="MegaMenu__PushSubHeading Heading Text--subdued u-h7">{{$mage['note']}}</p>
        							</a>
        						</div>
	    					</div>
	    					@endforeach
	    					@endif
	    				</div>
	    			</div>
	    		</div>
	    	</div>
		</div>
		<div class="header-mobile hidden-md hidden-lg">
			<div class="menu-site">
                <button class="btn btn-show-menu hidden-md hidden-lg"><svg class="Icon Icon--nav" role="presentation" viewBox="0 0 20 14">
			      <path d="M0 14v-1h20v1H0zm0-7.5h20v1H0v-1zM0 0h20v1H0V0z" fill="currentColor"></path>
			    </svg></button>
                <div class="menu-box">
                    <div class="bg-menu hidden-md hidden-lg"></div>
                    <div class="menu-bg-left">
                    	<div class="Drawer__Container">
                    		<ul class="main-menu">
		                        <li class="current-menu-item"><a href="#">Shop <span class="Collapsible__Plus"></span></a></li>
		                        <li><a href="#">Lash Guide</a></li>
		                        <li><a href="#">Rewards</a></li>
		                        <li>
		                            <a href="#">Press</a>
		                        </li>
		                        <li class="menu-item-has-children"><a href="#">More <span class="Collapsible__Plus"></span></a>
									<ul class="dropdowwn-menu">
									    <li><a href="#">Apply & Care</a></li>
									    <li><a href="#">Pro Program</a></li>
									    <li><a href="#">Faq</a></li>
									    <li><a href="#">Contact us</a></li>
									</ul>
		                        </li>
		                    </ul>
		                    <div class="SidebarMenu__Nav--secondary">
	                        	<ul>
	                        	    <li><a href="#">Account</a></li>
	                        	    <li><a href="#">Search</a></li>
	                        	</ul>
	                        </div>
                    	</div>
                        <div class="social-menu-xs">
                        	<a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
							<a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
							<a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
							<a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    
                    <button class="btn btn-hide-menu hidden-md hidden-lg"><svg class="Icon Icon--close" role="presentation" viewBox="0 0 16 14">
				      <path d="M15 0L1 14m14 0L1 0" stroke="currentColor" fill="none" fill-rule="evenodd"></path>
				    </svg></button>
                </div>
            </div>
            <div class="logo">
				<a href="#"><img src="https://cdn.shopify.com/s/files/1/0250/1519/files/esqido-logo-black_3x_e6533adb-5a4f-4ed4-8e51-726a6ef7b7a2_140x.png?v=1551670519" alt=""></a>
			</div>
			<div class="cart-xs">
				<span class="hidden-tablet-and-up"><svg class="Icon Icon--cart" role="presentation" viewBox="0 0 17 20">
			      <path d="M0 20V4.995l1 .006v.015l4-.002V4c0-2.484 1.274-4 3.5-4C10.518 0 12 1.48 12 4v1.012l5-.003v.985H1V19h15V6.005h1V20H0zM11 4.49C11 2.267 10.507 1 8.5 1 6.5 1 6 2.27 6 4.49V5l5-.002V4.49z" fill="currentColor"></path>
			    </svg></span>
			</div>
		</div>
	</header>