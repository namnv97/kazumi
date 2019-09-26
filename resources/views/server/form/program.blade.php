<table class="table">
	<thead>
		<tr>
			<th>STT</th>
			<th>Họ tên</th>
			<th>Email</th>
			<th>Website</th>
			<th>Địa chỉ</th>
			<th>Kinh nghiệm</th>
			<th>Chứng chỉ</th>
			<th></th>
		</tr>
	</thead>
	@if($forms->count() > 0)
	<tbody>
		@foreach($forms as $key => $item)
		@php
		$form = json_decode($item->meta_value,true);
		@endphp
		<tr>
			<td>{{($forms->currentPage() - 1) * $forms->perPage() + $key + 1}}</td>
			<td>{{$form['fullname']}}</td>
			<td>{{$form['email']}}</td>
			<td>{{$form['website']}}</td>
			<td>{{$form['address1'].', '.$form['address2'].', '.$form['city']}}</td>
			<td>{{$form['experience']}}</td>
			<td>
				<a href="{{$form['certificate']}}" download>File đính kèm</a>
			</td>
			<td>
				<span class="btn btn-sm btn-danger" data-vlaue="{{$item->id}}">
					<i class="fa fa-trash"></i> Xóa
				</span>
			</td>
		</tr>
		@endforeach
	</tbody>
	@endif
</table>