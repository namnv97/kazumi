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
						<li><a href="{{route('client.account.index')}}">TÀI KHOẢN</a></li>
						<li class="search-btn-head"><a href="#">TÌM KIẾM</a></li>
						<li class="cart-btn"><a href="{{route('client.cart.index')}}">GIỎ HÀNG <span>({{$num}})</span></a></li>
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
							<a class="MegaMenu__PushLink" href="{{route('client.product.index',['slug' => $mage['slug']])}}">
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