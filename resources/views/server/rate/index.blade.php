@extends('layouts.server')
@section('title')
Quản lý đánh giá
@endsection
@section('css')
<style>
	.approved
	{
		color: red;
		font-weight: bold;
	}

	.fa-star
	{
		color: #f56b5a;
	}

	.fa-star-o
	{
		color: #bd928d;
	}
</style>
@endsection
@section('content')
<div class="page-rating">
	<h1>Quản lý đánh giá</h1>
	<table class="table">
		<thead>
			<tr>
				<th>STT</th>
				<th>Họ tên</th>
				<th>Số sao</th>
				<th>Đánh giá</th>
				<th>Sản phẩm</th>
				<th style="white-space: nowrap;">Trạng thái</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		@if($rates->count() > 0)
		<tbody>
			@foreach($rates as $key => $rate)
			<tr>
				<td>{{($rates->currentPage() - 1) * $rates->perPage() + $key + 1}}</td>
				<td>{{$rate->user()->name}}</td>
				<td style="white-space: nowrap;">
					@for($i = 1; $i <= 5; $i ++)
					<i class="fa fa-star{{($i <= $rate->rate_star)?FALSE:'-o'}}"></i>
					@endfor
				</td>
				<td>
					{{$rate->comment}}
				</td>
				<td>
					<a href="{{route('client.product.index',['slug' => $rate->product()->slug])}}" target="_blank">{{$rate->product()->name}}</a>
				</td>
				<td style="white-space: nowrap;">
					@if($rate->status == 'pending')
						<span class="btn btn-sm btn-info btn-edit" data-value="{{$rate->id}}">
							Duyệt
						</span>
					@else
						<span class="approved">Đã duyệt</span>
					@endif
				</td>
				<td>
					<span class="btn btn-sm btn-danger btn-delete" data-value="{{$rate->id}}">
						<i class="fa fa-trash"></i> Xóa
					</span>
				</td>
			</tr>
			@endforeach
		</tbody>
		<tfoot>
			<tr>
				<td colspan="7" class="text-center">{{$rates->links()}}</td>
			</tr>
		</tfoot>
		@endif
	</table>
</div>
@endsection
@section('script')
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('.btn-edit').on('click',function(){
			var $this = jQuery(this).parent();
			var id = jQuery(this).data('value');
			jQuery.ajax({
				headers: {
					'X-CSRF-TOKEN': '{{ csrf_token() }}',
				},
				url: '{{route('admin.rates.edit')}}',
				type: 'post',
				dataType: 'json',
				data: {
					id: id
				},
				beforeSend: function(){

				},
				success: function(res)
				{
					if(res.status == 'success') $this.html('<span class="approved">Đã duyệt</span>');

					console.log(res.msg);
				},
				errors: function(errors){
					console.log(errors);
				}
			});
		});

		jQuery('.btn-delete').on('click',function(){
			if(confirm("Bạn muốn xóa đánh giá này?"))
			{
				var id = jQuery(this).data('value');
				$this = jQuery(this).parents('tr').first();
				jQuery.ajax({
					headers: {
						'X-CSRF-TOKEN': '{{ csrf_token() }}',
					},
					url: '{{route('admin.rates.delete')}}',
					type: 'post',
					dataType: 'json',
					data: {
						id: id,
						_method: 'DELETE'
					},
					beforeSend: function(){

					},
					success: function(res)
					{
						if(res.status == 'success') $this.remove();
						console.log(res.msg);
					},
					errors: function(errors){
						console.log(errors);
					}
				});
			}
		});


	});
</script>
@endsection