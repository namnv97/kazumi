<div class="lion-loyalty-panel-content">
	<div class="lion-loyalty-panel-content__header">Thêm điểm</div>
	<div class="row">
		@if(!empty($earn_point))
		@foreach($earn_point as $point)
		<div class="col-md-6 col-sm-6 col-xs-12">
			<div class="lion-loyalty-panel-rule-item">
				<div class="lion-loyalty-panel-rule-item__icon" style="background: url('{{$point->image}}') center/30px no-repeat #fff;"></div>
				<div class="lion-loyalty-panel-rule-item__title" data-key="{{$point->key_code}}">{{$point->title}}</div>
				<div class="lion-loyalty-panel-rule-item__points">
					<span data-i18n-key="ui.dashboard.earn_points.points_per"><span class="value">{{$point->point}}</span>&nbsp;<span class="text">điểm <span class="lion-currency"><span class="lion-currency__value">{{$point->unit}}</span></span></span></span></div>
				</div>
			</div>
			@endforeach
			@endif
		</div>
	</div>