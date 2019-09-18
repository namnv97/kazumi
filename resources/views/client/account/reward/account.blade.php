<div class="lion-loyalty-panel-content">
	<div class="lion-loyalty-panel-content__header">Hoạt động</div>
	<div class="lion-loyalty-panel-page-history">
		<table class="lion-customer-history-table table">
			<thead>
				<tr>
					<th data-i18n-key="ui.general.date" class="lion-customer-history-table__header-cell">Ngày</th>
					<th data-i18n-key="ui.general.type" class="lion-customer-history-table__header-cell">Kiểu</th>
					<th data-i18n-key="ui.general.action" class="lion-customer-history-table__header-cell">Hành động</th>
					<th data-i18n-key="ui.general.points_plural" class="lion-customer-history-table__header-cell">Điểm</th>
					<th data-i18n-key="ui.general.status" class="lion-customer-history-table__header-cell lion-customer-history-table__header-cell--centre-aligned">Trạng thái</th>
				</tr>
			</thead>
			<tbody>
				@foreach($rewards as $reward)
				<tr class="lion-customer-history-table__row">
					<td class="lion-customer-history-table__row-cell lion-customer-history-table__row-date">{{\Carbon\Carbon::parse($reward->created_at)->format('d/m/Y')}}</td>
					<td data-i18n-key="ui.general.activity" class="lion-customer-history-table__row-cell">Activity</td>
					<td class="lion-customer-history-table__row-cell">{{$reward->action}}</td>
					<td class="lion-customer-history-table__row-cell">{{$reward->point}}</td>
					<td class="lion-customer-history-table__row-cell lion-customer-history-table__row-status">
						<div class="lion-customer-history-table__bubble lion-history-state-bubble lion-history-state-bubble--approved">{{($reward->status == 'approved')?'Chấp nhận':'Chờ duyệt'}}</div>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>