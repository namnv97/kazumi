@extends('layouts.client')
@section('title')
{{$page->name}}
@endsection
@section('css')

@endsection

@section('content')

<div class="faq bg-grey contact">
	<div class="container-learn">
		<div class="row">
			@php
			$arr = array(
				'shipping' => ['title' => $shipping_title->meta_value,'faq' => $shipping],
				'returnex' => ['title' => $returnex_title->meta_value,'faq' => $returnex],
				'product' => ['title' => $product_title->meta_value,'faq' => $product],
				'payment' => ['title' => $payment_title->meta_value,'faq' => $payment],
				'contact' => ['title' => $contact_title->meta_value,'faq' => $contact]
				);
				$i = 0;
			@endphp
			<div class="col-md-4 col-sm-3 col-xs-12">
				<div class="sidebar-faq">
					<ul>
						@foreach($arr as $key => $val)
						<li><a href="#{{$key}}" class="{{($i == 0)?'is-active':FALSE}}">{{$val['title']}}</a></li>
						@php
						$i ++;
						@endphp
						@endforeach
					</ul>	
				</div>
			</div>
			<div class="col-md-8 col-sm-9 col-xs-12">
				<div class="faq-content">
					@foreach($arr as $key => $val)
					<div class="faq-box" id="{{$key}}">
						<h1 class="Heading title-large">{{$val['title']}}</h1>
						<ul>
							@if(count($val['faq']) > 0)
							@foreach($val['faq'] as $ship)
							@php
							$item = json_decode($ship->meta_value,true);
							@endphp
							<li>
								<div class="Faq__Question">
									<i class="fa fa-angle-right" aria-hidden="true"></i>
									<span>{{$item['question']}}</span>
								</div>
								<div class="Faq__Answer">
									{!! $item['anws'] !!}
								</div>
							</li>
							@endforeach
							@endif
						</ul>
					</div>
					@endforeach
				</div>
			</div>
		</div>
		
	</div>
</div>

@endsection
@section('script')
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('.sidebar-faq li a').on('click',function(e){
			e.preventDefault();
			jQuery('.sidebar-faq li a').removeClass('is-active');
			jQuery(this).addClass('is-active');

			var href = jQuery(this).attr('href');

			jQuery('body,html').animate({
				scrollTop: jQuery(href).offset().top - 100
			},600);

		});
	});
</script>
@endsection