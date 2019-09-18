<div class="lion-loyalty-panel-content">
	<div class="lion-loyalty-panel-content__header">Cấp bậc</div>
	<div class="row">
		@if(count($grades) > 0)
		@foreach($grades as $grade)
		@if($user_tier->tier_id == $grade->id)
		<div class="col-md-4 col-sm-4 col-xs-12">
			<div class="lion-loyalty-panel-tier-item lion-loyalty-panel-tier-item--current">
				<div class="lion-loyalty-panel-tier-item__header">
					<div class="lion-loyalty-panel-tier-item__name">{{$grade->name}}</div>
					<div class="lion-loyalty-panel-tier-item__context">Bạn đang ở cấp tài khoản này</div>
				</div>
				<div class="lion-loyalty-panel-tier-item__accent" style="background-color: rgb(193, 225, 197);">
					
				</div>
				<div class="lion-loyalty-panel-tier-item__inner">
					<div class="lion-loyalty-panel-tier-item__list-container">
						{!! $grade->tier_content !!}
					</div>
				</div>
			</div>
		</div>
		@else
		<div class="col-md-4 col-sm-4 col-xs-12">
			<div class="lion-loyalty-panel-tier-item">
				<div class="lion-loyalty-panel-tier-item__header">
					<div class="lion-loyalty-panel-tier-item__name">{{$grade->name}}</div>
					<div class="lion-loyalty-panel-tier-item__context">
						<span data-i18n-key="ui.dashboard.tiers.spend_until_next_tier">
							{!! $grade->title !!}
						</span>
					</div>
				</div>
				<div class="lion-loyalty-panel-tier-item__accent" style="background-color: rgb(193, 225, 197);">
					
				</div>
				<div class="lion-loyalty-panel-tier-item__inner">
					<div class="lion-loyalty-panel-tier-item__list-container">
						{!! $grade->tier_content !!}
					</div>
				</div>
			</div>
		</div>
		@endif
		@endforeach
		@endif
	</div>
</div>