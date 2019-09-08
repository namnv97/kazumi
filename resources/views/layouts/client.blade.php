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
	@include('layouts.client.search')
	<script type="text/javascript" src="{{asset('/assets/client/js/jquery-1.9.1.js')}}"></script>
	<script type="text/javascript" src="{{asset('/assets/client/js/jquery-ui.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('/assets/client/js/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('/assets/client/js/owl.carousel.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('/assets/client/js/jquery-scrolltofixed-min.js')}}"></script>
	<script type="text/javascript" src="{{asset('/assets/client/js/jquery.fancybox.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('/assets/client/js/custom.js')}}"></script>
	<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery('body').on('change','#sidebar-cart input[name=quantity]',function(){
				var quantity = jQuery(this).val();
				if(parseInt(quantity) < 1)
				{
					quantity = 1;
					jQuery(this).val('1');
				}

				var pack_id = jQuery(this).data('pack');
				var color_id = jQuery(this).data('color');

				jQuery.ajax({
					url: '{{route('client.cart.update')}}',
					type: 'get',
					dataType: 'text',
					data: {
						pack_id: pack_id,
						color_id: color_id,
						quantity: quantity
					},
					beforeSend: function(){
						jQuery('.cart_bar').css('opacity',1);
						var i = 0;
						xd = setInterval(function(){
							jQuery('.cart_bar').css('width',parseInt(i)+'%');
							console.log(i);
							i++;
							if(i > 90) clearInterval(xd);
						},10);
					},
					success: function(res){
						console.log(res);
						calculator();
						clearInterval(xd);
						jQuery('.cart_bar').css('width','100%');
						setTimeout(function(){
							jQuery('.cart_bar').css('width','0');
							jQuery('.cart_bar').css('opacity',0);
						},300);
					},
					errors: function(errors){
						console.log(errors);
					}
				})
			})

			jQuery('body').on('click','#sidebar-cart .CartItem__Remove',function(){
				if(confirm("Bạn muốn xóa sản phẩm này ?"))
				{
					var pack_id = jQuery(this).data('pack');
					var color_id = jQuery(this).data('color');
					jQuery(this).parents('.CartItem').remove();
					calculator();

					if(check_cart() == 0)
					{
						jQuery('#sidebar-cart .CartItemWrapper').html('<p class="cart_empty">Giỏ hàng trống</p>');
					}

					jQuery.ajax({
						headers: {
							'X-CSRF-TOKEN': '{{ csrf_token() }}',
						},
						url: '{{route('client.cart.remove')}}',
						type: 'post',
						dataType: 'text',
						data: {
							pack_id: pack_id,
							color_id: color_id,
							_method: 'DELETE'
						},
						beforeSend: function(){

						},
						success: function(res){
							console.log(res);
						},
						errors: function(errors){
							console.log(errors);
						}
					})
				}
			})

			jQuery('.header-pc .menu ul li.cart-btn ,.header-mobile .cart-xs').click(function(e) {
				if(parseInt({{request()->is('gio-hang')}}) != 1)
				{
					e.preventDefault();
					jQuery('body').css('overflow-y','hidden');
					jQuery('#sidebar-cart .PageOverlay').css({
						visibility: 'visible',
						opacity: '.5'
					});
					jQuery('#sidebar-cart .Drawer').css({
						transform: 'translateX(0)',
						visibility: 'visible'
					});
				}
			});
			jQuery('.CollectionToolbar__Item--filter').click(function() {
				jQuery('#filter .PageOverlay').css({
					visibility: 'visible',
					opacity: '.5'
				});
				jQuery('#filter .Drawer').css({
					transform: 'translateX(0)',
					visibility: 'visible'
				});

			});
			jQuery('body').on('click','.PageOverlay',function() {
				jQuery(this).css({
					visibility: 'hidden',
					opacity: '0'
				});
				jQuery('.Drawer').css('transform', 'translateX(calc(100vw - 65px))');
				jQuery('body').css('overflow-y','auto');
			});
			jQuery('body').on('click','.Drawer .Drawer__Close',function() {
				jQuery(this).parents('.Drawer').css({
					transform: 'translateX(calc(100vw - 65px))',
					visibility: 'hidden'
				});

				jQuery('.PageOverlay').css({
					visibility: 'hidden',
					opacity: '0'
				});
				jQuery('body').css('overflow-y','auto');
			});

			var timeout = null;
			jQuery('body').on('keyup','.Search__Input',function(){
				$('.result_search').html('Searching...')
				$('.Linklist').html('Searching...')
				clearTimeout(timeout);

				timeout = setTimeout(function (){
					$.ajax({
						url : "{{route('client.search')}}",
						method : 'get',
						dataType : 'json',
						cache: false,
						data :  {key : jQuery('.Search__Input').val()},
						success(results){
							let html = ``;
							let html1 = ``;
							$.each(results.data, function(key,val) { 
								var p = 0;
								if(val.sale == 0)
								{
									p = val.price;
								}
								else
									p = val.sale;            
					            html += `<div class="col-md-4 col-sm-4 col-xs-12">
		    								<div class="product-item">
												<div class="pro-img">
													<a href="#">
														<img src="`+val.img+`" alt="">
														<div class="img-hide">
															<img src="`+val.img1+`" alt="">
														</div>
													</a>
												</div>
												
												`

								if(val.sale != 0)
									html += `<div class="info-product">
													<h3 class="title-pro"><a href="#">`+val.name+`</a></h3>
													<span class="price"><span class="price-sale">$`+val.sale+` USD</span> 
													<span class="old-price"> $`+val.price+` USD</span></span>
												</div>
												<div class="tag-stt">
													<span>On sale</span>
												</div>
											</div>
		    							</div>`
		    					else
		    						html += `<div class="info-product">
													<h3 class="title-pro"><a href="#">`+val.name+`</a></h3>
													<span class="price">FROM <span>$`+val.price+` USD</span></span>
												</div>
											</div>
		    							</div>`
					        });  
					        $.each(results.articles, function(key,val) { 

								html1 += `<li class="Linklist__Item">
									<a href="#" class="Link Link--secondary">`+val.title+`</a>
								</li>`;
							});
							$.each(results.pages, function(key,val) { 

								html1 += `<li class="Linklist__Item">
									<a href="#" class="Link Link--secondary">`+val.name+`</a>
								</li>`;
							});
							

							$('.Linklist').html(html1);

					        $('.result_search').html(html) 
							$('.total_result_search').html(results.total+ ' results')
							
							
						}

					})
				},1000);
			})

			jQuery('body').on('keydown','.Search__Input',function(){
				$('.result_search').html('Searching...')
				$('.Linklist').html('Searching...')
				clearTimeout(timeout);

				timeout = setTimeout(function (){
					$.ajax({
						url : "{{route('client.search')}}",
						method : 'get',
						dataType : 'json',
						cache: false,
						data :  {key : jQuery('.Search__Input').val()},
						success(results){
							let html = ``;
							let html1 = ``;
							$.each(results.data, function(key,val) { 
								var p = 0;
								if(val.sale == 0)
								{
									p = val.price;
								}
								else
									p = val.sale;            
					            html += `<div class="col-md-4 col-sm-4 col-xs-12">
		    								<div class="product-item">
												<div class="pro-img">
													<a href="#">
														<img src="`+val.img+`" alt="">
														<div class="img-hide">
															<img src="`+val.img1+`" alt="">
														</div>
													</a>
												</div>
												
												`

								if(val.sale != 0)
									html += `<div class="info-product">
													<h3 class="title-pro"><a href="#">`+val.name+`</a></h3>
													<span class="price"><span class="price-sale">$`+val.sale+` USD</span> 
													<span class="old-price"> $`+val.price+` USD</span></span>
												</div>
												<div class="tag-stt">
													<span>On sale</span>
												</div>
											</div>
		    							</div>`
		    					else
		    						html += `<div class="info-product">
													<h3 class="title-pro"><a href="#">`+val.name+`</a></h3>
													<span class="price">FROM <span>$`+val.price+` USD</span></span>
												</div>
											</div>
		    							</div>`


		    					
					        });  
							$.each(results.articles, function(key,val) { 

								html1 += `<li class="Linklist__Item">
									<a href="#" class="Link Link--secondary">`+val.title+`</a>
								</li>`;
							});
							$.each(results.pages, function(key,val) { 

								html1 += `<li class="Linklist__Item">
									<a href="#" class="Link Link--secondary">`+val.name+`</a>
								</li>`;
							});
							

							$('.Linklist').html(html1);
					        $('.result_search').html(html) 
							$('.total_result_search').html(results.total+ ' sản phẩm')
							


							
						}

					})
				},1000);
			})

		});
		jQuery('.form-register button').on('click',function(){
			jQuery(this).parent().find('.errors').remove();
			var email = jQuery(this).prev().val();
			var err = 0;
			if(email.length == 0)
			{
				jQuery(this).before('<p class="errors">Vui lòng nhập Email của bạn</p>');
				err ++;
			}
			else
			{
				var regexEmail = /\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/;
				if(!regexEmail.test(email))
				{
					jQuery(this).before('<p class="errors">Vui lòng kiểm tra định dạng Email</p>');
					err ++;
				}
			}

			if(err == 0)
			{
				var xd;
				jQuery.ajax({
					headers: {
						'X-CSRF-TOKEN': '{{ csrf_token() }}',
					},
					url: '{{route('client.form.data')}}',
					type: 'post',
					dataType: 'json',
					data: {
						email: email,
						form_name: 'register'
					},
					beforeSend: function(){
						jQuery('.form-register .ajax-loaded').css('opacity',1);
						var i = 0;
						xd = setInterval(function(){
							jQuery('.form-register .ajax-loaded').css('width',parseInt(i)+'%');
							i++;
							if(i > 90) clearInterval(xd);
						},10);
					},
					success: function(res){
						console.log(res);
						clearInterval(xd);
						jQuery('.form-register .ajax-loaded').css('width','100%');
						setTimeout(function(){
							jQuery('.form-register .ajax-loaded').css('width','0');
							jQuery('.form-register .ajax-loaded').css('opacity',0);
						},300);

						jQuery('.form-register .response .text').text(res.msg);
						jQuery('.form-register .response').addClass(res.status);
						jQuery('.form-register .response').addClass('active');
					},
					errors: function(errors){
						console.log(errors);
					}
				})
			}
		});

		jQuery('.form-register .response i').on('click',function(){
			jQuery('.form-register .response').removeClass('success').removeClass('errors').removeClass('active');
			jQuery('.form-register .response .text').html('');
		});
	</script>
	@yield('script')
</body>
</html>