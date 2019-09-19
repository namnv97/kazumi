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
					<div class="item {{(Auth::user()->point()->point > $reward->point)?'active':FALSE}}">
						<span class="lion-loyalty-panel-reward-item__redeem-button-text" data-value="{{$reward->id}}" data-point="{{$reward->point}}">{{(Auth::user()->point()->point > $reward->point)?'ĐỔI NGAY':'CHƯA ĐỦ ĐIỂM'}}</span>
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
					<div class="text-center">
						<p>Sử dụng <span class="point_lost">500</span> điểm</p>
						<p>Để nhận <span class="title_lost">Voucher giảm giá 100.000 VNĐ</span></p>
						<div class="action">
							<span class="btn btn-md btn-primary btn-access">Xác nhận</span>
							&ensp;
							<span class="btn btn-md btn-info btn-cancel">Hủy bỏ</span>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
	@if(count($vouchers) > 0)
	<div class="my-voucher">
		<h3>Voucher đã đổi</h3>
		<table class="table">
			<thead>
				<tr>
					<th>STT</th>
					<th>Mô tả</th>
					<th>Code</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($vouchers as $key => $voucher)
				<tr>
					<td>{{$key + 1}}</td>
					<td>{{$voucher->name}}</td>
					<td>
						<span class="voucher_code">{{$voucher->code}}</span>
						<span class="fa fa-copy"></span>
						<span class="fa fa-check"></span>
					</td>
					<td>
						{{\Carbon\Carbon::parse($voucher->created_at)->diffForHumans(\Carbon\Carbon::now())}}
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	@endif
</div>