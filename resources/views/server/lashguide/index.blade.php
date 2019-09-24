@extends('layouts.server')
@section('title')
Các thuộc tính gợi ý
@endsection
@section('css')
<style>
	.background_image .image
	{
		display: table-cell;
		width: 30%;
	}

	.background_image .image .img
	{
		display: none;
		position: relative;
	}

	.background_image .image .img img
	{
		width: 100%;
	}

	.background_image .image .img.active
	{
		display: block;
	}

	.background_image .image label
	{
		display: block;
	}

	.background_image .image .img i
	{
		position: absolute;
		top: 0;
		right: 0;
		padding: 5px;
		text-align: center;
		color: #000;
		background: #fff;
		border-radius: 100%;
		font-weight: bold;
		cursor: pointer;
	}

	.background_image .btn-add-image
	{
		margin: 10px 0;
	}

	.table tbody tr td
	{
		vertical-align: middle;
	}
</style>
@endsection
@section('content')
<div class="page-lashguide">
	<h1>Các thuộc tính gợi ý</h1>
	@if(session('msg'))
	<div class="alert alert-success">
		<i class="fa fa-times"></i>
		<p>{{session('msg')}}</p>
	</div>
	@endif
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
			<h3>Thêm thuộc tính</h3>
			@if(session('errors'))
			<div class="alert alert-warning">
				<i class="fa fa-times"></i>
				@foreach(session('errors')->all() as $msg)
				<p>{{$msg}}</p>
				@endforeach
			</div>
			@endif
			<form action="{{route('admin.lashguide.create')}}" method="post" id="create">
				@csrf
				<div class="form-group">
					<label>Tên</label>
					<input type="text" name="title" class="form-control" placeholder="Tên" value="{{old('title')}}">
				</div>
				<div class="form-group background_image">
					<label>Hình ảnh</label>
					<div class="image">
						<div class="img {{old('image')?'active':FALSE}}">
							<img src="{{old('image')?old('image'):FALSE}}">
							<input type="hidden" name="image" value="{{old('image')}}">
							<i class="fa fa-times"></i>
						</div>
						<span class="btn btn-sm btn-info btn-add-image">Chọn ảnh</span>
					</div>
				</div>
				<div class="form-group">
					<label>Mô tả</label>
					<textarea name="description" rows="5" class="form-control" placeholder="Mô tả">{{old('description')}}</textarea>
				</div>
				<div class="form-group">
					<label>Bước gợi ý</label>
					<select name="step_id" class="form-control">
						<option value="">Chọn bước</option>
						@if(count($steps) > 0)
						@foreach($steps as $step)
						<option value="{{$step->id}}">{{$step->name}}</option>
						@endforeach
						@endif
					</select>
				</div>
				<div class="text-center">
					<button class="btn btn-md btn-primary" type="submit">Thêm</button>
				</div>
			</form>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
			<h3>Danh sách thuộc tính</h3>
			<table class="table">
				<thead>
					<tr>
						<th>Tên</th>
						<th>Ảnh</th>
						<th>Mô tả</th>
						<th>Bước</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				@if(count($items) > 0)
				<tbody>
					@foreach($items as $item)
					<tr>
						<td style="white-space: nowrap;">{{$item->title}}</td>
						<td>
							<img src="{{$item->image}}" style="width: 100px;">
						</td>
						<td>{{$item->description}}</td>
						<td style="white-space: nowrap;">{{$item->step()->name}}</td>
						<td>
							<span class="btn btn-sm btn-info btn-edit" data-value="{{$item->id}}">
								<i class="fa fa-edit"></i> Sửa
							</span>
						</td>
						<td>
							<span class="btn btn-sm btn-danger btn-delete" data-value="{{$item->id}}">
								<i class="fa fa-trash"></i> Xóa
							</span>
						</td>
					</tr>
					@endforeach
				</tbody>
				<tfoot>
					<tr>
						<td colspan="6" class="text-center">{{$items->links()}}</td>
					</tr>
				</tfoot>
				@endif
			</table>
			<div id="editModal" class="modal fade" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('script')
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('body').on('click','.btn-add-image',function(){
			var cur = jQuery(this);
			CKFinder.popup( {
				chooseFiles: true,
				onInit: function( finder ) {
					finder.on( 'files:choose', function( evt ) {
						var file = evt.data.files.first();
						cur.prev().find('img').attr('src',file.getUrl());
						cur.prev().find('input').val(file.getUrl());
						cur.prev().addClass('active');
					} );
				}
			} );
		});

		jQuery('body').on('click','.background_image .image i',function(){
			var cur = jQuery(this).parent();
			if(confirm('Bạn muốn xóa ảnh này ?'))
			{
				cur.find('img').removeAttr('src');
				cur.removeClass('active');
				cur.find('input').val('');
			}
		});

		jQuery('form#create').on('submit',function(){
			var title = jQuery('#editModal input[name=title]').val();
			if(title.length == 0)
			{
				alert("Tên không được để trống");
				return false;
			}

			var image = jQuery('#editModal input[name=image]').val();
			if(image.length == 0)
			{
				alert("Hình ảnh không được để trống");
				return false;
			}


			var description = jQuery('#editModal textarea[name=description]').val();
			if(description.length == 0)
			{
				alert("Mô tả không được để trống");
				return false;
			}

			var step_id = jQuery('#editModal select[name=step_id]').val();
			if(step_id.length == 0)
			{
				alert("Bước gợi ý không được để trống");
				return false;
			}
		})

		jQuery('.btn-edit').on('click',function(){
			var id = jQuery(this).data('value');
			jQuery.ajax({
				url: '{{route('admin.lashguide.edit')}}',
				type: 'get',
				dataType: 'html',
				data: {
					id: id
				},
				beforeSend: function(){

				},
				success: function(res){
					jQuery('#editModal .modal-content').html(res);
					jQuery('#editModal').modal('show');
				},
				errors: function(errors){
					console.log(errors);
				}
			})
		})

		jQuery('body').on('click','.btn-update',function(){
			var title = jQuery('#editModal input[name=title]').val();
			if(title.length == 0)
			{
				alert("Tên không được để trống");
				return false;
			}

			var image = jQuery('#editModal input[name=image]').val();
			if(image.length == 0)
			{
				alert("Hình ảnh không được để trống");
				return false;
			}


			var description = jQuery('#editModal textarea[name=description]').val();
			if(description.length == 0)
			{
				alert("Mô tả không được để trống");
				return false;
			}

			var step_id = jQuery('#editModal select[name=step_id]').val();
			if(step_id.length == 0)
			{
				alert("Bước gợi ý không được để trống");
				return false;
			}

			jQuery.ajax({
				headers: {
					'X-CSRF-TOKEN': '{{ csrf_token() }}',
				},
				url: '{{route('admin.lashguide.edit')}}',
				type: 'post',
				dataType: 'json',
				data: {
					id: jQuery('#itid').val(),
					title: title,
					image: image,
					description: description,
					step_id: step_id
				},
				success: function(res){
					if(res.status == 'success')
					{
						jQuery('#editModal .modal-body').prepend('<div class="alert alert-success"><i class="fa fa-times"></i><p>'+res.msg+'</p></div>');
						jQuery('#editModal').animate({
							scrollTop: 0
						},400);
						setTimeout(function(){
							location.reload();
						},1000);
					}
				},
				errors: function(errors){
					console.log(errors);
				}
			})
		});

		jQuery('.btn-delete').on('click',function(){
			if(confirm("Bạn muốn xóa bước này?"))
			{
				var id = jQuery(this).data('value');
				jQuery.ajax({
					headers: {
						'X-CSRF-TOKEN': '{{ csrf_token() }}',
					},
					url: '{{route('admin.lashguide.delete')}}',
					type: 'post',
					dataType: 'json',
					data: {
						id: id,
						_method: 'DELETE'
					},
					success: function(res){
						if(res.status == 'success')
						{
							alert('Xóa thành công');
							location.reload();
						}
					},
					errors: function(errors){
						console.log(errors);
					}
				})
			}

		});


	})
</script>
@endsection