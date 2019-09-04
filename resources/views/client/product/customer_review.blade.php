<div class="box-star-view-left">
	@if(count($rating) > 0)
	@php
	$star = 0;
	foreach($rate_num as $rat):
		$star += $rat['num']*$rat['rate_star'];
	endforeach;
	$avg = round($star/$rating->total(),0);
	@endphp

	<div class="jdgm-rev-widg__summary">
		<div>
			@for($i = 1; $i <= 5; $i ++)
			<i class="fa {{($i <= $avg)?'fa-star':'fa-star-o'}}" aria-hidden="true"></i>
			@endfor
		</div>
		<p>Tổng số {{$rating->total()}} đánh giá</p>
	</div>
	<div class="jdgm-histogram">
		@if(!empty($rate_num))
		@for($i = 5; $i > 0; $i --)
		<div class="jdgm-histogram__row">
			<div class="jdgm-histogram__star">
				@for($k = 1; $k <= 5; $k ++)
				<i class="fa {{($k <= $i)?'fa-star':'fa-star-o'}}" aria-hidden="true"></i>
				@endfor
			</div>
			<div class="jdgm-histogram__bar">
				<div class="jdgm-histogram__bar-content" style="width: {{(isset($rate_num[5-$i]))?round(($rate_num[5-$i]['num'])/$rating->total()*100,0):0}}%;"> </div>
			</div>
			<div class="jdgm-histogram__percentage">{{(isset($rate_num[5-$i]))?round(($rate_num[5-$i]['num'])/$rating->total()*100,0):0}}%</div>
			<div class="jdgm-histogram__frequency">({{(isset($rate_num[5-$i]))?$rate_num[5-$i]['num']:0}})</div>
		</div>
		@endfor
		@endif
	</div>
	@else
	<h3>Chưa có đánh giá cho sản phẩm này</h3>
	@endif
</div>