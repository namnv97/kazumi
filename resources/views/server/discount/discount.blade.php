@extends('layouts.server')
@section('title')
Mã giảm giá
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
<div class="page-discount">
	<h1>Mã giảm giá</h1>
	@if(session('msg'))
	<div class="alert alert-success">
		<i class="fa fa-times" title="Ẩn thông báo"></i>
		<p>{{session('msg')}}</p>
	</div>
	@endif
	<div class="row">
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			<h3>Thêm mã giảm giá</h3>
			@if(session('errors'))
			<div class="alert alert-warning">
				<i class="fa fa-times" title="Ẩn thông báo"></i>
				@foreach(session('errors')->all() as $msg)
				<p>{{$msg}}</p>
				@endforeach
			</div>
			@endif
			<form action="{{route('admin.discount.create')}}" method="post" id="create">
				@csrf
				<div class="form-group">
					<label>Mã giảm giá</label>
					<input type="text" name="code" class="form-control" placeholder="Mã giảm giá" value="{{old('code')}}">
				</div>
				<div class="form-group">
					<label>Mô tả</label>
					<textarea name="description" rows="5" style="resize: vertical;" placeholder="Mô tả mã giảm giá" class="form-control">{{old('description')}}</textarea>
				</div>
				<div class="form-group">
					<label>Kiểu giảm giá</label>
					<select name="type" class="form-control">
						<option value="">Chọn kiểu</option>
						<option value="percent" {{(old('type') == 'percent')?'selected':FALSE}}>Phần trăm (%)</option>
						<option value="total" {{(old('type') == 'total')?'selected':FALSE}}>Số tiền</option>
					</select>
				</div>
				<div class="form-group">
					<label>Giá trị</label>
					<input type="text" class="form-control" name="discount_value" placeholder="Giá trị" value="{{old('discount_value')}}">
				</div>
				<div class="form-group">
					<label>Ngày hết hạn</label>
					<input type="date" name="date_end" class="form-control" value="{{old('date_end')}}">
				</div>
				<div class="text-center">
					<button class="btn btn-md btn-primary" type="submit">Thêm</button>
				</div>
			</form>
		</div>
		<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
			<h3>Danh sách mã giảm giá</h3>
			<table class="table">
				<thead>
					<tr>
						<th>STT</th>
						<th>Mã</th>
						<th>Mô tả</th>
						<th>Giá trị</th>
						<th>Ngày hết hạn</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@if(count($discounts) > 0)
					@foreach($discounts as $key => $discount)
					<tr>
						<td>{{($discounts->currentPage() - 1) * $discounts->perPage() + $key + 1}}</td>
						<td>{{$discount->code}}</td>
						<td>{{$discount->description}}</td>
						<td>{{number_format($discount->discount_value)}}{{($discount->type == 'percent')?'%':' VNĐ'}}</td>
						<td>{{\Carbon\Carbon::parse($discount->date_end)->format('d/m/Y')}}</td>
						<td>
							<span class="btn btn-sm btn-info btn-edit" data-value="{{$discount->id}}">
								<i class="fa fa-edit"></i> Sửa
							</span>
						</td>
						<td>
							<span class="btn btn-sm btn-danger btn-delete" data-value="{{$discount->id}}">
								<i class="fa fa-trash"></i> Xóa
							</span>
						</td>
					</tr>
					@endforeach
					@endif
				</tbody>
				<tfoot>
					<tr>
						<td colspan="7" class="text-center">{{$discounts->links()}}</td>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
</div>
<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Cập nhật mã giảm giá : <span></span></h4>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label>Mã giảm giá</label>
					<span class="code form-control"></span>
				</div>
				<div class="form-group">
					<label>Mô tả</label>
					<textarea name="description" rows="5" style="resize: vertical;" placeholder="Mô tả mã giảm giá" class="form-control"></textarea>
				</div>
				<div class="form-group">
					<label>Kiểu giảm giá</label>
					<span class="type form-control"></span>
				</div>
				<div class="form-group">
					<label>Giá trị</label>
					<span class="discount_value form-control"></span>
				</div>
				<div class="form-group">
					<label>Ngày hết hạn</label>
					<input type="date" name="date_end" class="form-control">
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
		jQuery('form#create').on('submit',function(){
			jQuery('form#create .errors').not('.ajax').remove();
			err = 0;

			var code = jQuery('form#create input[name=code]').val();
			if(code.length == 0)
			{
				jQuery('form#create input[name=code]').after('<p class="errors">Mã giảm giá không được để trống</p>');
				err ++;
			}

			var description = jQuery('form#create textarea[name=description]').val();
			if(description.length == 0)
			{
				jQuery('form#create textarea[name=description]').after('<p class="errors">Mô tả không được để trống</p>');
				err ++;
			}

			var type = jQuery('form#create select[name=type]').val();
			if(type.length == 0)
			{
				jQuery('form#create select[name=type]').after('<p class="errors">Kiểu giảm giá không được để trống</p>');
				err ++;
			}

			var discount_value = jQuery('form#create input[name=discount_value]').val();
			if(discount_value.length == 0)
			{
				jQuery('form#create input[name=discount_value]').after('<p class="errors">Giá trị không được để trống</p>');
				err ++;
			}

			var date_end = jQuery('form#create input[name=date_end]').val();
			if(date_end.length == 0)
			{
				jQuery('form#create input[name=date_end]').after('<p class="errors">Ngày hết hạn không được để trống</p>');
				err ++;
			}

			if(err > 0) return false;
		});
		jQuery('form#create input[name=code]').on('change',function(){
			var code = jQuery(this).val();
			if(code.length > 0)
			{
				jQuery.ajax({
					url: '{{route('admin.discount.check_code')}}',
					type: 'get',
					dataType: 'json',
					data: {
						code: code
					},
					beforeSend: function(){
						jQuery('form#create .errors.ajax').remove();
					},
					success: function(res){
						if(res.status == true)
						{
							jQuery('form#create input[name=code]').after('<p class="errors ajax">Mã giảm giá đã tồn tại</p>');
						}
					},
					errors: function(errors){
						console.log(errors);
					}

				});
			}
			
		});

		jQuery('.btn-edit').on('click',function(){
			var id = jQuery(this).data('value');
			jQuery.ajax({
				url: '{{route('admin.discount.edit')}}',
				type: 'get',
				dataType: 'json',
				data: {
					id: id
				},
				beforeSend: function(){
					jQuery('#myModal #disid').remove();
				},
				success: function(res){
					jQuery('#myModal .modal-title span').text(res.code);
					jQuery('#myModal span.code').text(res.code);
					jQuery('#myModal textarea[name=description]').text(res.description);
					jQuery('#myModal span.type').text(res.type);
					jQuery('#myModal span.discount_value').text(res.discount_value);
					jQuery('#myModal input[name=date_end]').val(res.date_end);
					jQuery('#myModal .modal-body').prepend('<input type="hidden" id="disid" value="'+res.id+'">');
					jQuery('#myModal').modal('show');
				},
				errors: function(errors){

				}
			});
			
		});

		jQuery('.btn-update').on('click',function(){
			jQuery('#myModal .errors').remove();
			var err = 0;
			var description = jQuery('#myModal textarea[name=description]').val();
			if(description.length == 0)
			{
				jQuery('#myModal textarea[name=description]').after('<p class="errors">Mô tả không được để trống</p>');
				err ++;
			}
			var date_end = jQuery('#myModal input[name=date_end]').val();
			if(date_end.length == 0)
			{
				jQuery('#myModal input[name=date_end]').after('<p class="errors">Ngày hết hạn không được để trống</p>');
				err ++;
			}

			if(err > 0) return false;

			jQuery.ajax({
				headers: {
					'X-CSRF-TOKEN': '{{ csrf_token() }}',
				},
				url: '{{route('admin.discount.edit')}}',
				type: 'post',
				dataType: 'json',
				data: {
					id: jQuery('#disid').val(),
					description: description,
					date_end: date_end
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
			if(confirm("Bạn muốn xóa mã giảm giá này ?"))
			{
				var id = jQuery(this).data('value');
				jQuery.ajax({
					headers: {
						'X-CSRF-TOKEN': '{{ csrf_token() }}',
					},
					url: '{{route('admin.discount.delete')}}',
					type: 'post',
					dataType: 'json',
					data: {
						_method: 'DELETE',
						id: id
					},
					beforeSend: function(){

					},
					success: function(res){
						if(res.status == 'success')
						{
							location.reload();
						}
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