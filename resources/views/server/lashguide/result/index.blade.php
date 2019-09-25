@extends('layouts.server')
@section('title')
Kết quả gợi ý
@endsection
@section('css')

@endsection
@section('content')
<div class="page-result">
	<h1>Kết quả gợi ý</h1>
	<a href="{{route('admin.lashguide.result.create')}}" class="btn btn-md btn-primary">Thêm gợi ý</a>
	<table class="table">
		<thead>
			<tr>
				<th>STT</th>
				@if(count($names) > 0)
				@foreach($names as $name)
				<th>{{$name->name}}</th>
				@endforeach
				@endif
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@if(count($results) > 0)
			@foreach($results as $key => $result)
			<tr>
				<td>{{($results->currentPage() - 1)*$results->perPage() + $key + 1}}</td>
				@php
				$items = json_decode($result->result_value,true);
				@endphp
				@foreach($items as $keyy => $item)
				<td>{{$result->stepitem($item)->title}}</td>
				@endforeach
				<td>
					<a href="{{route('admin.lashguide.result.edit',['id' => $result->id])}}" class="btn btn-sm btn-info">
						<i class="fa fa-edit"></i> Sửa
					</a>
				</td>
				<td>
					<span class="btn btn-sm btn-danger btn-delete" data-value="{{$result->id}}">
						<i class="fa fa-trash"></i> Xóa
					</span>
				</td>
			</tr>
			@endforeach
			@endif
		</tbody>
		<tfoot>
			<tr>
				
			</tr>
		</tfoot>
	</table>
</div>
@endsection
@section('script')
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('.btn-delete').on('click',function(){
			if(confirm("Bạn muốn xóa kết quả này ?"))
			{
				var id = jQuery(this).data('value');
				jQuery.ajax({
					headers: {
						'X-CSRF-TOKEN': '{{ csrf_token() }}',
					},
					url: '{{route('admin.lashguide.result.delete')}}',
					type: 'post',
					dataType: 'json',
					data: {
						id: id,
						_method: 'DELETE'
					},
					beforeSend: function(){

					},
					success: function(res){
						if(res.status == 'success')
						{
							alert("Xóa thành công");
							location.reload();
						}
					},
					errors: function(errors){
						console.log(errors);
					}
				})
			}
		})
	});
</script>
@endsection