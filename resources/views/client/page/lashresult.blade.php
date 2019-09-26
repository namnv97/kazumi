@extends('layouts.client')
@section('title')
Kết quả tìm kiếm
@endsection
@section('css')
<style>
	.attribute
	{
		margin: 20px 0;
		padding: 20px 0;
		position: relative;
	}

	.attribute:before
	{
		position: absolute;
		content: '';
		height: 2px;
		width: 50%;
		background: #888;
		top: 0;
		left: 50%;
		transform: translateX(-50%);
	}

	.attribute:after
	{
		position: absolute;
		content: '';
		height: 2px;
		width: 50%;
		background: #888;
		bottom: 0;
		left: 50%;
		transform: translateX(-50%);
	}

	.product-suggest
	{
		display: none;
	}

	.product-suggest.active
	{
		display: block;
	}
</style>
@endsection
@section('content')
<div class="lash-home results">
	<div class="container">
		<div class="content-results">
			<div class="form-email">
				<h1>Nhập Email của bạn để nhận mã giảm giá {{$code_percent->meta_value}}%</h1>
				<div class="form-send">
					<input type="email" placeholder="Nhập Email của bạn" data-value="{{$code_percent->meta_value}}">
					<button class="send">Gửi</button>
				</div>
				<p style="margin: 0;">Mã giảm giá {{$code_percent->meta_value}}% sẽ được gửi đến Email của bạn</p>
				<p style="margin: 0;">Chỉ áp dụng với khách hàng mới</p>
			</div>
			<div class="attribute">
				<p class="attribute-title" style="font-size: 24px;font-weight: bold;color: #9b8579;">{{$lash_title->meta_value}}</p>
				@if(count($lash_attr) > 0)
				<ul style="list-style: none; width: 220px; margin-left: auto; margin-right: auto; text-align: left;">
					@foreach($lash_attr as $lash)
					@php
					$item = json_decode($lash->meta_value,true);
					@endphp
					<li style="display: flex; flex-direction: row; align-items: center; margin-bottom: 1rem;">
						<img class="product-guarantee-icon" src="{{$item['image']}}" alt="{{$item['title']}}" width="30" height="auto" style="margin-right: 1rem"> {{$item['title']}}
					</li>
					@endforeach
				</ul>
				@endif
			</div>
			<div class="video">
				<p class="title_video" style="font-size: 20px; padding-bottom: 1em;color: #9b8579;">{{$lash_title_video->meta_value}}</p>
				@php
				$link_vid = $lash_youtube->meta_value;
				preg_match('/\?v=(.*)/',$link_vid,$matches);
				@endphp
				<iframe width="100%" height="450" src="https://www.youtube.com/embed/{{$matches[1]}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</div>
			<div class="product-suggest">
				<h3>{{$lash_result_title->meta_value}}</h3>
				<div class="row">
					
				</div>
			</div>
			<div class="social-lash">
				<p>Chia sẻ với bạn bè</p>
				<ul>
					<li>
						<a href="https://www.facebook.com/sharer.php?u={{route('home')}}"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
					</li>
					<li>
						<a href="https://twitter.com/intent/tweet?url={{route('home')}}&text={{config('app.name')}}&via={{route('home')}}&hashtags={{config('app.name')}}"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
					</li>
					<li>
						<a href="https://pinterest.com/pin/create/bookmarklet/?media={img}&url={{route('home')}}&is_video={is_video}&description={{config('app.name')}}"><i class="fa fa-pinterest-square" aria-hidden="true"></i></a>
					</li>
				</ul>
			</div>
		</div>
	</div>


</div>
@endsection
@section('script')
<script type="text/javascript">
	(function($){
		@foreach($steps as $step)
		var it = localStorage.getItem('{{$step->slug}}');
		if(it == null) window.location.href = '{{url()->current()}}';
		@endforeach
	})(jQuery);
	jQuery(document).ready(function(){
		jQuery('.form-send button').on('click',function(){
			jQuery('.errors').remove();
			var email = jQuery(this).prev().val();
			if(email.length == 0)
			{
				jQuery('.form-send').after('<p class="errors">Email không được để trống</p>');
			}
			else
			{
				if(!ValidateEmail(email))
				{
					jQuery('.form-send').after('<p class="errors">Email Sai định dạng. Vui lòng kiểm tra lại</p>');
				}
				else
				{
					var formData = new FormData();
					formData.append('email','email');
					@foreach($steps as $step)
					var it = localStorage.getItem('{{$step->slug}}');
					if(it == null) return false;
					formData.append('{{$step->slug}}',it);
					@endforeach

					jQuery.ajax({
						headers: {
							'X-CSRF-TOKEN': '{{ csrf_token() }}',
						},
						url: '{{route('client.page.lashresult.product')}}',
						type: 'post',
						dataType: 'html',
						processData: false,
						contentType: false,
						data: formData,
						beforeSend: function(){

						},
						success: function(res){
							jQuery('.product-suggest .row').html(res);
							jQuery('.product-suggest').addClass('active');
							jQuery('.form-email').remove();
							jQuery('body,html').animate({
								scrollTop: jQuery('.product-suggest').offset().top - 100
							},500);
							@foreach($steps as $step)
							localStorage.removeItem('{{$step->slug}}');
							@endforeach
						},
						errors: function(errors){
							console.log(errors);
						}
					})
				}
			}
		})
	})

	function ValidateEmail(email)
	{
		pattern =/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/
		return pattern.test(email);
	}
</script>
@endsection