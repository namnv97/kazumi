@extends('layouts.server')
@section('title')
Voucher giảm giá
@endsection
@section('css')
<style>
	.errors
	{
		color: red;
		padding-left: 10px;
	}
</style>
@endsection
@section('content')
<div class="page-voucher">
	<h1>Voucher giảm giá</h1>
	@if(session('msg'))
	<div class="alert alert-success">
		<i class="fa fa-times"></i>
		<p>{{session('msg')}}</p>
	</div>
	@endif
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
			<h3>Thêm Voucher</h3>
			<form action="{{route('admin.voucher.create')}}" method="post" id="create">
				@csrf
				<div class="form-group">
					<label>Tiêu đề</label>
					<input type="text" name="name" class="form-control" placeholder="Tiêu đề">
				</div>
				<div class="form-group">
					<label>Điểm quy đổi</label>
					<input type="text" name="point" class="form-control" placeholder="Điểm quy đổi">
				</div>
				<div class="text-center">
					<button class="btn btn-md btn-primary" type="submit">Thêm</button>
				</div>
			</form>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
			<h3>Danh sách Voucher</h3>
			<table class="table">
				<thead>
					<tr>
						<th>STT</th>
						<th>Voucher</th>
						<th>Điểm</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@if(count($vouchers) > 0)
					@foreach($vouchers as $key => $voucher)
					<tr>
						<td>{{($vouchers->currentPage() - 1)*$vouchers->perPage() + $key + 1}}</td>
						<td>{{$voucher->name}}</td>
						<td>{{$voucher->point}}</td>
						<td><span class="btn btn-sm btn-info btn-edit" data-value="{{$voucher->id}}"><i class="fa fa-edit"></i> Sửa</span></td>
						<td>
							<span class="btn btn-sm btn-danger btn-delete" title="Xóa voucher" data-value="{{$voucher->id}}">
								<i class="fa fa-trash"></i> Xóa
							</span>
						</td>
					</tr>
					@endforeach
					@endif
				</tbody>
			</table>
		</div>
	</div>
</div>
<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Cập nhật : <span>Voucher 100.000 VNĐ</span></h4>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label>Tiêu đề</label>
					<input type="text" name="name" class="form-control" placeholder="Tiêu đề">
				</div>
				<div class="form-group">
					<label>Điểm quy đổi</label>
					<input type="text" name="point" class="form-control" placeholder="Điểm quy đổi">
				</div>
				<div class="text-center">
					<button class="btn btn-md btn-primary btn-update">Cập nhật</button>
				</div>
			</div>
		</div>

	</div>
</div>
@endsection
@section('script')
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('input[name=point]').on('keypress',function(e){
			if(e.keyCode < 48 || e.keyCode > 57) return false;
		});

		jQuery('.btn-edit').on('click',function(){
			var id = jQuery(this).data('value');
			jQuery.ajax({
				url: '{{route('admin.voucher.edit')}}',
				type: 'get',
				dataType: 'json',
				data:{
					id: id
				},
				beforeSend: function(){
					jQuery('#myModal .modal-body #vouid').remove();
				},
				success: function(res){
					jQuery('#myModal .modal-title span').text(res.name);
					jQuery('#myModal .modal-body input[name=name]').val(res.name);
					jQuery('#myModal .modal-body input[name=point]').val(res.point);
					jQuery('#myModal .modal-body').prepend('<input type="hidden" value="'+res.id+'" id="vouid">');
					jQuery('#myModal').modal('show');
				},
				errors: function(errors){
					console.log(errors);
				}
			});			
		});


		jQuery('form#create').on('submit',function(){
			jQuery('form#create .errors').remove();
			var err = 0;
			var name = jQuery('form#create input[name=name]').val();
			if(name.length == 0)
			{
				jQuery('form#create input[name=name]').after('<p class="errors">Tiêu đề không được để trống</p>');
				err ++;
			}

			var point = jQuery('form#create input[name=point]').val();
			if(point.length == 0)
			{
				jQuery('form#create input[name=point]').after('<p class="errors">Điểm quy đổi không được để trống</p>');
				err ++;
			}

			if(err > 0)
			{
				return false;
			}

		});

		jQuery('.btn-update').on('click',function(){
			jQuery('#myModal .errors').remove();
			var err = 0;
			var name = jQuery('#myModal input[name=name]').val();
			if(name.length == 0)
			{
				jQuery('#myModal input[name=name]').after('<p class="errors">Tiêu đề không được để trống</p>');
				err ++;
			}

			var point = jQuery('#myModal input[name=point]').val();
			if(point.length == 0)
			{
				jQuery('#myModal input[name=point]').after('<p class="errors">Điểm quy đổi không được để trống</p>');
				err ++;
			}

			if(err > 0)
			{
				return false;
			}

			jQuery.ajax({
				headers: {
					'X-CSRF-TOKEN': '{{ csrf_token() }}',
				},
				url: '{{route('admin.voucher.edit')}}',
				type: 'post',
				dataType: 'json',
				data: {
					name: name,
					point: point,
					id: jQuery('#vouid').val()
				},
				beforeSend: function(){

				},
				success: function(res){
					if(res.status == 'success')
					{
						jQuery('#myModal .modal-header').prepend('<div class="alert alert-success">Cập nhật thành công</div>');
						setTimeout(function(){
							location.reload();
						},1000);
					}
				},
				errors: function(errors){
					console.log(errors);
				}
			});
		});

		jQuery('.btn-delete').on('click',function(){
			var id = jQuery(this).data('value');
			if(confirm("Bạn muốn xóa voucher này ?"))
			{
				jQuery.ajax({
					headers: {
						'X-CSRF-TOKEN': '{{ csrf_token() }}',
					},
					url: '{{route('admin.voucher.delete')}}',
					type: 'post',
					dataType: 'json',
					data: {
						id: id,
						_method: 'DELETE'
					},
					beforeSend: function(){

					},
					success: function(res){
						if(res.status == 'success') location.reload();
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