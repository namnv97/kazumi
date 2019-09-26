@extends('layouts.client')
@section('title')
{{$product->name}}
@endsection
@section('css')
<style>
	#sync2 .owl-item
	{
		cursor: pointer;
	}


	#sync2 .owl-item.current .item
	{
		border: thin #000 solid;
	}

	.paginate
	{
		padding-top: 40px;
		text-align: center;
	}

	.paginate span
	{
		display: inline-block;
		border: 1px solid #d2d2d2;
		padding: 0;
		line-height: 35px;
		width: 35px;
		height: 35px;
		margin: 0 4px;
		font-weight: 500;
		cursor: pointer;
	}

	.paginate span.current
	{
		border: 1px #000 solid;
		cursor: text;
	}

	.accordion-pro-content table
	{
		width: 100%;
	}

	#sync1 img
	{
		cursor: url('{{asset('/assets/uploads/images/cursor.svg')}}') 18 18,-webkit-zoom-in;
		cursor: url('{{asset('/assets/uploads/images/cursor.svg')}}') 18 18,zoom-in;
		cursor: -webkit-image-set(url('{{asset('/assets/uploads/images/cursor.svg')}}') 1x, url('{{asset('/assets/uploads/images/cursor.svg')}}') 1x),-webkit-zoom-in;
		cursor: -webkit-image-set(url('{{asset('/assets/uploads/images/cursor.svg')}}') 1x, url('{{asset('/assets/uploads/images/cursor.svg')}}') 1x),zoom-in;
	}

	.pack li.active
	{
		background: #fff;
	}

	.pack_color
	{
		display: none;
		margin-bottom: 20px;
	}

	.pack_color.active
	{
		display: block;
	}

	.pack_color ul li
	{
		display: inline-block;
		width: calc(100%/9);
		margin: 0 5px;
		cursor: pointer;
		padding: 2px;
		border: thin solid transparent;
	}

	.pack_color ul li.active
	{
		
		border: thin #000 solid;
	}
	.progress_bar {
		background: red;
		display: block;
		height: 5px;
		text-align: center;
		transition: width .3s;
		width: 0;
		position: fixed;
		top: 0;
		right: 0;
		left: 0;
		z-index: 100000;
	}

	.progress_bar.hide {
		opacity: 0;
		transition: opacity 1.3s;
	}

	.jdgm-form-wrapper .form-program button.err
	{
		border: 2px solid red;
	}
</style>
@endsection
@section('content')
<div class="progress_bar"></div>
<div class="single-product bg-grey">
	<div class="container-fluid">
		<div class="content-pro-detail p-35">
			<div class="pro-detail-box">
				<div class="row">
					<div class="col-md-7 col-sm-12 col-xs-12">
						<div class="slide-pro-detail">
							<div id="sync1" class="owl-carousel owl-theme">
								@if(count($product->gallery) > 0)
								@foreach($product->gallery as $gallery)
								<div class="item">
									<a href="{{asset($gallery->url)}}" data-fancybox="gallery_product">
										<img src="{{asset($gallery->url)}}" alt="{{$product->name}}">
									</a>

								</div>
								@endforeach
								@endif
							</div>

							<div id="sync2" class="owl-carousel owl-theme">
								@if(count($product->gallery) > 0)
								@foreach($product->gallery as $gallery)
								<div class="item">
									<a href="{{asset($gallery->url)}}">
										<img src="{{asset($gallery->url)}}" alt="{{$product->name}}">
									</a>
								</div>
								@endforeach
								@endif
							</div>
						</div>
						<div class="accordion-pro" id="accordion">
							<div class="accordion-pro-item">
								<h3>CHI TIẾT <span class="Collapsible__Plus"></span></h3>
								<div class="accordion-pro-content">
									{!! $product->product_content !!}
								</div>
							</div>
							<div class="accordion-pro-item">
								<h3>GIAO HÀNG VÀ HOÀN LẠI <span class="Collapsible__Plus"></span></h3>
								<div class="accordion-pro-content" style="display: none;">
									{!! $product_shipping->meta_value !!}
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-5 col-sm-12 col-xs-12">
						<div class="ProductMeta">
							<h1 class="tit-product">{{$product->name}}</h1>
							<div class="title-views">
								<div>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
								</div>
								<span>111 đánh giá</span>
							</div>
							<div>
								<div class="pack">
									<ul>
										@foreach($product->pack as $key => $pack)
										<li data-product="{{$product->id}}" data-pack="{{$pack->id}}" data-href="pack_{{$key}}">
											<p>{{$pack->name}}</p>
											<span class="price">
												@if(!empty($pack->sale))
												<span class="old-price">{{number_format($pack->price)}}VND</span>&ensp;
												<span class="price-sale">{{number_format($pack->sale)}}VND</span>
												@else
												<span>{{number_format($pack->price)}}VND</span>
												@endif
											</span>
										</li>
										@endforeach
									</ul>
								</div>
								@foreach($product->pack as $key => $pack)
								@if(count($pack->color()) > 0)
								<div class="pack_color pack_{{$key}}">
									<h3 class="top">Màu : <span></span></h3>
									<ul>
										@foreach($pack->color() as $ft => $color)
										<li data-name="{{$color->name}}" data-id="{{$color->id}}">
											<img src="{{asset($color->image)}}" alt="{{$color->name}}">
										</li>
										@endforeach
									</ul>
								</div>
								@endif
								@endforeach
								@include('client.product.essential')
								<div class="SectionHeader__ButtonWrapper">
									<input type="hidden" id="pack_id">
									<div class="ButtonGroup ButtonGroup--spacingSmall "><button class="ButtonGroup__Item Button add-to-cart">THÊM VÀO GIỎ</button></div>
								</div>
							</div>
							@include('client.product.after_product')
						</div>
					</div>
				</div>
			</div>
			@include('client.product.description')
			<div class="comment">
				@include('client.product.comment')
			</div>
		</div>
	</div>
	@include('client.product.relate')
	@include('client.product.recent_view')
</div>
@endsection
@section('script')
<script type="text/javascript">
	var pagi = 0;

	jQuery(function($){
		jQuery('.paginate .page').each(function(){
			if(!(jQuery(this).hasClass('prev') || jQuery(this).hasClass('next'))) pagi ++;
		});
		if(pagi < 5)
		{
			jQuery('.paginate .page.next, .paginate .page.prev').remove();
		}
		else
		{
			jQuery('.paginate .page').each(function(){
				if(!(jQuery(this).hasClass('prev') || jQuery(this).hasClass('next')))
				{
					if(parseInt(jQuery(this).text()) > 5) jQuery(this).addClass('hide');
				}
			});
		}
	});

	jQuery('body').on('click','.paginate span.page',function(e){
		e.preventDefault();
		if(jQuery(this).hasClass('current')) return false;
		if(jQuery(this).hasClass('prev') || jQuery(this).hasClass('next')) return false;
		if(jQuery(this).text() <= 3)
		{
			jQuery('.paginate span.page.current').removeClass('current');
			jQuery('.paginate .page').removeClass('hide');
			jQuery('.paginate .page').each(function(){
				if(!(jQuery(this).hasClass('prev') || jQuery(this).hasClass('next')))
				{
					if(parseInt(jQuery(this).text()) > 5) jQuery(this).addClass('hide');
				}
			});
			jQuery(this).addClass('current');
		}
		else{
			if(jQuery(this).text() > pagi-3)
			{
				jQuery('.paginate span.page.current').removeClass('current');
				jQuery('.paginate .page').removeClass('hide');
				jQuery('.paginate .page').each(function(){
					if(!(jQuery(this).hasClass('prev') || jQuery(this).hasClass('next')))
					{
						if(parseInt(jQuery(this).text()) <= pagi-5) jQuery(this).addClass('hide');
					}
				});
				jQuery(this).addClass('current');
			}
			else
			{
				jQuery('.paginate span.page.current').removeClass('current');
				jQuery('.paginate .page').removeClass('hide');
				var cub = jQuery(this).text();
				jQuery('.paginate .page').each(function(){
					if(!(jQuery(this).hasClass('prev') || jQuery(this).hasClass('next')))
					{
						if(parseInt(jQuery(this).text()) > (parseInt(cub)+2) || parseInt(jQuery(this).text()) < (parseInt(cub)-2)) jQuery(this).addClass('hide');
					}
				});
				jQuery(this).addClass('current');
			}
		}

		var page = jQuery('.paginate span.page.current').text();

		jQuery.ajax({
			url: '{{route('client.product.get_rate')}}',
			type: 'get',
			dataType: 'html',
			data: {
				page: page,
				product: '{{$product->id}}'
			},
			beforeSend: function(){
				jQuery('.review-content').html('<div class="text-center"><img src="{{asset('/assets/uploads/images/loading.gif')}}" style="width: 100px;height:100px;"></div>');
			},
			success: function(res){
				jQuery('.review-content').html(res);
				jQuery('body,html').animate({
					scrollTop: jQuery('.review-content').offset().top-100,
				},500);
			},
			error: function(){
			}
		});

	});

	jQuery('body').on('click','.paginate span.page.prev',function(){
		var num = jQuery('.paginate span.page.current').text();
		var cur = jQuery('.paginate span.page.current').addClass('del');
		if(parseInt(num) == 1) return false;

		jQuery('.paginate span.page.current').prev().trigger('click');
		jQuery('.paginate span.page.current.del').removeClass('current');
		jQuery('.paginate span.page.del').removeClass('del');
	});

	jQuery('body').on('click','.paginate span.page.next',function(){
		var num = jQuery('.paginate span.page.current').text();
		var cur = jQuery('.paginate span.page.current').addClass('del');
		if(parseInt(num) == pagi) return false;

		jQuery('.paginate span.page.current').next().trigger('click');
		jQuery('.paginate span.page.current.del').removeClass('current');
		jQuery('.paginate span.page.del').removeClass('del');
	});

	jQuery(document).ready(function(){
		jQuery('.pack_color ul li').on('click',function(){
			jQuery(this).parent().find('li').removeClass('active');
			jQuery(this).addClass('active');
			var name = jQuery(this).data('name');
			jQuery(this).parents('.pack_color').find('h3.top').find('span').text(name);
			var id = jQuery(this).data('id');
			jQuery('#color_id').val(id);
		})

		jQuery('.pack li').on('click',function(){
			if(jQuery(this).hasClass('active')) return false;
			jQuery(this).parent().find('li').removeClass('active');
			jQuery(this).addClass('active');

			var href = jQuery(this).data('href');
			var id = jQuery(this).data('pack');
			jQuery('#pack_id').val(id);

			jQuery('#color_id').remove();



			if(jQuery('*').hasClass(href))
			{
				jQuery('.pack_color').removeClass('active');
				jQuery('.'+href).addClass('active');
				jQuery('.pack_color ul li').removeClass('active');
				jQuery('.pack_color h3.top span').text('');
				jQuery('#pack_id').after('<input type="hidden" id="color_id">');
			}
		});

		jQuery('.add-to-cart').on('click',function(){
			var data = {};
			var pack_id = jQuery('#pack_id').val();
			if(pack_id.length == 0)
			{
				alert("Vui lòng chọn sản phẩm");
				return false;
			}
			else data.pack_id = pack_id;
			var color_id = jQuery('#color_id').val();

			if(color_id != null)
			{
				if(color_id.length == 0)
				{
					alert("Vui lòng chọn màu sản phẩm");
					return false;
				}
				else data.color_id = color_id;
			}

			var essential = [];

			jQuery('input[type=checkbox]').each(function(){
				if(jQuery(this).prop('checked') == true)
				{
					var es = jQuery(this).val();
					essential.push(es);
				}
			})

			data.essential = essential;

			var xd;

			jQuery.ajax({
				url: '{{route('client.add_to_cart')}}',
				type: 'get',
				dataType: 'html',
				data: data,
				beforeSend: function(){
					jQuery('.progress_bar').css('opacity',1);
					var i = 0;
					xd = setInterval(function(){
						jQuery('.progress_bar').css('width',parseInt(i)+'%');
						console.log(i);
						i++;
						if(i > 90) clearInterval(xd);
					},10);
				},
				success: function(res){
					jQuery('#sidebar-cart').html(res);
					calculator();
					clearInterval(xd);
					jQuery('.progress_bar').css('width','100%');
					setTimeout(function(){
						jQuery('.progress_bar').css('width','0');
						jQuery('.progress_bar').css('opacity',0);
					},500);
				},
				errors: function(errors){
					console.log(errors);
				}
			});

		})
		jQuery('.box-star-view .SectionHeader__ButtonWrapper .ButtonGroup__Item').click(function(e) {
			@if(!Auth::check())
			Swal.fire({
				title: 'Bạn muốn đăng nhập ngay bây giờ ?',
				text: "Để đánh giá giá sản phẩm bạn cần phải đăng nhập",
				type: 'info',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Đăng nhập',
				cancelButtonText: "Hủy"
			}).then((result) => {
				if (result.value) {
					window.location.href = '{{route('login',['href' => url()->current()])}}'
				}
			})
			@else
			jQuery('.jdgm-form-wrapper').slideToggle('slow');
			jQuery('.jdgm-form__rating i').removeClass('active');
			jQuery('.jdgm-form-wrapper input').val('');
			jQuery('.jdgm-form-wrapper textarea').val('');
			@endif
		});

		jQuery('.jdgm-form__rating i').on('mouseenter',function(){
			var i = jQuery(this).data('num');
			jQuery('.jdgm-form__rating i').each(function(){
				var ch = jQuery(this).data('num');
				if(parseInt(ch) <= parseInt(i)) jQuery(this).addClass('hover');
				else jQuery(this).removeClass('hover');
			})
		});

		jQuery('.jdgm-form__rating i').on('mouseleave',function(){
			jQuery('.jdgm-form__rating i').removeClass('hover');
		})

		jQuery('.jdgm-form__rating i').on('click',function(){
			var i = jQuery(this).data('num');
			jQuery('.jdgm-form__rating i').each(function(){
				var vh = jQuery(this).data('num');
				if(parseInt(vh) <= parseInt(i)) jQuery(this).addClass('active');
				else jQuery(this).removeClass('active');
			});
		});

		jQuery('.jdgm-form-wrapper .form-program button').on('click',function(){
			jQuery('.jdgm-form-wrapper .errors').remove();
			jQuery(this).removeClass('err');
			var err = 0;

			var rate_star = jQuery('.jdgm-form-wrapper .form-program .jdgm-form__rating i.active').last().data('num');
			if(rate_star == null)
			{
				jQuery('.jdgm-form__rating').after('<p class="errors">Đánh giá sao không được để trống</p>');
				err ++;
			}

			var review_title = jQuery('.jdgm-form-wrapper input[name=review_title]').val();
			if(review_title.length == 0)
			{
				jQuery('.jdgm-form-wrapper input[name=review_title]').after('<p class="errors">Tiêu đề không được để trống</p>');
				err ++;
			}

			var review_content = jQuery('.jdgm-form-wrapper textarea[name=review_content]').val();
			if(review_content.length == 0)
			{
				jQuery('.jdgm-form-wrapper textarea[name=review_content]').after('<p class="errors">Nội dung không được để trống</p>');
				err ++;
			}

			if(err > 0)
			{
				jQuery(this).addClass('err');
			}
			else
			{
				jQuery.ajax({
					headers: {
						'X-CSRF-TOKEN': '{{ csrf_token() }}',
					},
					url: '{{route('client.product.rate')}}',
					type: 'post',
					dataType: 'html',
					data: {
						id: '{{$product->id}}',
						rate_star: rate_star,
						review_title: review_title,
						review_content: review_content
					},
					beforeSend: function(){

					},
					success: function(res){
						Swal.fire({
							position: 'center',
							type: 'success',
							title: 'Cảm ơn bạn đã đánh giá sản phẩm',
							showConfirmButton: false,
							timer: 1000
						});
						jQuery('.comment').html(res);
					},
					errors: function(errors){
						console.log(errors);
					}
				});
			}
		})

		jQuery('.Product__QuickNav span').on('click',function(){
			jQuery('body,html').animate({
				scrollTop: jQuery('#sync1').offset().top - 100
			},400);
		})
	})

function ValidateEmail(email)
{
	pattern =/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/
	return pattern.test(email);
}
</script>
@endsection