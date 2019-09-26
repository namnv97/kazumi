<table class="table">
	<thead>
		<tr>
			<th>STT</th>
			<th>Họ tên</th>
			<th>Email</th>
			<th>Số điện thoại</th>
			<th>Website</th>
			<th>Kinh nghiệm (năm)</th>
			<th>Địa chỉ</th>
			<th></th>
		</tr>
	</thead>
	@if($forms->count() > 0)
	<tbody>
		@foreach($forms as $key => $item)
		@php
		$form = json_decode($item->form_value,true);
		@endphp
		<tr>
			<td>{{($forms->currentPage() - 1) * $forms->perPage() + $key + 1}}</td>
			<td>{{$form['fullname']}}</td>
			<td>{{$form['email']}}</td>
			<td>{{$form['phone']}}</td>
			<td>{{$form['website']}}</td>
			<td>{{$form['year']}}</td>
			<td>{{$form['address1']}}, {{$form['address2']}}, {{$form['city']}}</td>
			<td>
				<span class="btn btn-danger btn-sm btn-delete" data-value="{{$item->id}}">
					<i class="fa fa-trash"></i> Xóa
				</span>
			</td>
		</tr>
		@endforeach
	</tbody>
	<tfoot>
		<tr>
			<td colspan="8">{{$forms->links()}}</td>
		</tr>
	</tfoot>
	@endif
</table>