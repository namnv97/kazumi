<h2 class="jdgm-rev-widg__title">Đánh giá khách hàng</h2>
<div class="box-star-view">
	<div class="row">
		<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
			@include('client.product.customer_review')
		</div>
		<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
			<div class="SectionHeader__ButtonWrapper">
				<div class="ButtonGroup ButtonGroup--spacingSmall ">
					@if($is_rate)
					<span class="ButtonGroup__Item Button">Viết đánh giá</span>
					@else
					<span class="button-rated">Cảm ơn bạn đã đánh giá</span>
					@endif
				</div>
			</div>
		</div>
	</div>
	<div class="jdgm-form-wrapper">
		@include('client.product.form_rate')
	</div>
</div>
<div class="review-content">
	@if(count($rating) > 0)
	@foreach($rating as $rate)
	@include('client.product.rating')
	@endforeach
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