<table class="table">
	<thead>
		<tr>
			<th>STT</th>
			<th>Email</th>
			<th>IP</th>
			<th>Thời gian gửi</th>
		</tr>
	</thead>
	<tbody>
		@if(count($forms) > 0)
		@foreach($forms as $key => $form)
		<tr>
			<td>{{($forms->currentPage() - 1)*$forms->perPage() + $key + 1}}</td>
			<td>{{$form->email}}</td>
			<td>{{$form->ip}}</td>
			<td>{{\Carbon\Carbon::parse($form->created_at)->format('d/m/Y H:i:s')}}</td>
		</tr>

		@endforeach
		@endif
	</tbody>
</table>