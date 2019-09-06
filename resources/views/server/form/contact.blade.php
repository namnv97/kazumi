<table class="table">
	<thead>
		<tr>
			<th>STT</th>
			<th>Họ tên</th>
			<th>Email</th>
			<th>Số điện thoại</th>
			<th>Lời nhắn</th>
			<th>IP</th>
			<th>Thời gian gửi</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		@if(count($forms) > 0)
		@foreach($forms as $key => $item)
		@php
		$single = json_decode($item->form_value,true);
		@endphp
		<tr>
			<td>{{($forms->currentPage() - 1)*$forms->perPage() + $key + 1}}</td>
			<td>{{$single['name']}}</td>
			<td>{{$single['email']}}</td>
			<td>{{$single['phone']}}</td>
			<td>{{$single['message']}}</td>
			<td>{{$single['ip']}}</td>
			<td>{{\Carbon\Carbon::parse($item->created_at)->format('d/m/Y H:i:s')}}</td>
			<td>
				<span class="btn btn-sm btn-danger" title="Xóa bản ghi"><i class="fa fa-trash"></i> Xóa</span>
			</td>
		</tr>
		@endforeach
		@endif
	</tbody>
	<tfoot>
		<tr>
			<td colspan="8" class="text-center">{{$forms->links()}}</td>
		</tr>
	</tfoot>
</table>