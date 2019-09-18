<div class="lion-loyalty-panel-content">
	<div class="lion-loyalty-panel-content__header">Đổi điểm</div>
	<div class="row">
		@if(count($get_reward) > 0)
		@foreach($get_reward as $reward)
		<div class="col-md-6 col-sm-6 col-xs-12">
			<div class="lion-loyalty-panel-rule-item">
				<div class="lion-loyalty-panel-reward-item__content">
					<div class="lion-loyalty-panel-reward-item__title">{{$reward->name}}</div>
					<div class="lion-loyalty-panel-reward-item__meta"></div>
					<div class="lion-loyalty-panel-reward-item__links">
						<div class="lion-loyalty-panel-reward-item__more-info-url">
							{{$reward->point}} điểm
						</div>
					</div>
					<div class="lion-action-button lion-loyalty-panel-reward-item__redeem-button lion-loyalty-panel-reward-item__redeem-button--disabled {{(Auth::user()->point()->point > $reward->point)?'active':FALSE}}">
						<span class="lion-loyalty-panel-reward-item__redeem-button-text">{{(Auth::user()->point()->point > $reward->point)?'ĐỔI NGAY':'CHƯA ĐỦ ĐIỂM'}}</span>
					</div>
				</div>
			</div>
		</div>
		@endforeach
		@endif
	</div>
	<div id="getModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">ĐỔI ĐIỂM THƯỞNG</h4>
				</div>
				<div class="modal-body">
					<p>Sử dụng <span class="point_lost">500</span> điểm</p>
					<p>Để nhận <span class="title_lost">Voucher giảm giá 100.000 VNĐ</span></p>
					<div class="action text-center">
						<span class="btn btn-md btn-primary btn-access">Xác nhận</span>
						&ensp;
						<span class="btn btn-md btn-info btn-cancel">Hủy bỏ</span>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>

		</div>
	</div>
</div>