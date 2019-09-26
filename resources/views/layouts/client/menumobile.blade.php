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
						@if(!empty($menumobile))
						@php
						$menumobile = json_decode($menumobile->meta_value,true)
						@endphp
						@foreach($menumobile as $key => $menu)
						@if(isset($menu['children']))
						<li class="menu-item-has-children">
							<a href="{{$menu['url']}}">{{$menu['text']}} <span class="Collapsible__Plus"></span></a>
							<ul class="dropdowwn-menu">
								@foreach($menu['children'] as $item)
								<li><a href="{{$item['url']}}">{{$item['text']}}</a></li>
								@endforeach
							</ul>
						</li>
						@else
						<li><a href="{{$menu['url']}}">{{$menu['text']}}</a></li>
						@endif
						@endforeach
						@endif
					</ul>
					<div class="SidebarMenu__Nav--secondary">
						<ul>
							<li><a href="{{route('client.account.index')}}">Account</a></li>
							<li class="search-btn-head"><a href="#">Search</a></li>
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
		<a href="{{route('home')}}">
			<img src="{{asset($logo)}}" alt="{{config('app.name')}}">
		</a>
	</div>
	<div class="cart-xs">
		<span class="hidden-tablet-and-up">
			<svg class="Icon Icon--cart" role="presentation" viewBox="0 0 17 20">
				<path d="M0 20V4.995l1 .006v.015l4-.002V4c0-2.484 1.274-4 3.5-4C10.518 0 12 1.48 12 4v1.012l5-.003v.985H1V19h15V6.005h1V20H0zM11 4.49C11 2.267 10.507 1 8.5 1 6.5 1 6 2.27 6 4.49V5l5-.002V4.49z" fill="currentColor"></path>
			</svg>
		</span>
	</div>
</div>