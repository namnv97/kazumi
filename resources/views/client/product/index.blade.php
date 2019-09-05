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
				<h2 class="jdgm-rev-widg__title">Đánh giá khách hàng</h2>
				<div class="box-star-view">
					<div class="row">
						<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
							@include('client.product.customer_review')
						</div>
						<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
							<div class="SectionHeader__ButtonWrapper">
								<div class="ButtonGroup ButtonGroup--spacingSmall "><a href="#" class="ButtonGroup__Item Button">Viết đánh giá</a></div>
							</div>
						</div>
					</div>
					<!-- <div class="jdgm-rev-widg__sort-wrapper">
						<select>
							<option value="volvo">Most Recent</option>
							<option value="saab">Highest Rating</option>
							<option value="mercedes">Lowest Rating</option>
							<option value="audi">Only Pictures</option>
						</select>
					</div> -->
					<div class="jdgm-form-wrapper">
						@include('client.product.form_rate')
					</div>
				</div>
				@if(count($rating) > 0)
				<div class="review-content">
					@foreach($rating as $rate)
					<div class="jdgm-rev jdgm-divider-top jdgm--done-setup"> 
						<div class="jdgm-rev__header"> 
							<div class="jdgm-rev__icon">
								<img src="{{Avatar::create($rate->name)->toBase64()}}" alt="{{$rate->name}}">
							</div> 
							<span class="jdgm-rev__rating">
								@for($i = 1; $i <= 5; $i ++)
								<i class="fa {{($i <= $rate->rate_star)?'fa-star':'fa-star-o'}}" aria-hidden="true"></i>
								@endfor
							</span> 
							<span class="jdgm-rev__timestamp">{{Carbon\Carbon::parse($rate->created_at)->format('d/m/Y')}}</span> 
							<div class="jdgm-rev__br"></div> 
							<span class="jdgm-rev__buyer-badge-wrapper">  
								<span class="jdgm-rev__buyer-badge">{{($rate->status == 'pending')?'Chờ duyệt':'Đã xác minh'}}</span>  
							</span> 
							<span class="jdgm-rev__author-wrapper"> 
								<span class="jdgm-rev__author">{{$rate->name}}</span> 
								<span class="jdgm-rev__location"></span> 
							</span> 
						</div> 
						<div class="jdgm-rev__content"> 
							<div class="jdgm-rev__custom-form">  </div> 
							<b class="jdgm-rev__title">{{$rate->title}}</b> 
							<div class="jdgm-rev__body">
								<p>{{$rate->comment}}</p>
							</div> 
						</div> 
					</div>
					@endforeach
				</div>
				<div class="paginate">
					@php
					$total = $rating->lastPage();
					@endphp
					@if($total > 5)
					<span class="page prev"><i class="fa fa-angle-left"></i></span>
					@for($i = 1; $i <= $total; $i ++)
					<span class="page {{($i == 1)?'current':FALSE}}" data-page="{{$i}}">{{$i}}</span>
					@endfor
					<span class="page next"><i class="fa fa-angle-right"></i></span>
					@else
					@for($i = 1; $i <= $total; $i ++)
					<span data-page="{{$i}}" class="page {{($i ==1)?'current':FALSE}}">{{$i}}</span>
					@endfor
					@endif
				</div>
				@endif
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
</script>
@endsection