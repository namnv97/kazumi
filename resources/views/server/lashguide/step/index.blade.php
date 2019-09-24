@extends('layouts.server')
@section('title')
Các bước
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
	<h1>Các bước</h1>
	@if(session('msg'))
	<div class="alert alert-success">
		<i class="fa fa-times"></i>
		<p>{{session('msg')}}</p>
	</div>
	@endif
	<div class="row">
		<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
			<h3>Thêm bước</h3>
			@if(session('errors'))
			<div class="alert alert-warning">
				<i class="fa fa-times"></i>
				@foreach(session('errors')->all() as $msg)
				<p>{{$msg}}</p>
				@endforeach
			</div>
			@endif
			<form action="{{route('admin.lashguide.step.create')}}" method="post" id="create">
				@csrf
				<div class="form-group">
					<label>Tên</label>
					<input type="text" name="name" class="form-control" placeholder="Tên bước" value="{{old('name')}}">
				</div>
				<div class="form-group">
					<label>Đường dẫn</label>
					<input type="text" name="slug" class="form-control" placeholder="Đường dẫn" value="{{old('slug')}}">
				</div>
				<div class="form-group background_image">
					<label>Hình ảnh</label>
					<div class="image">
						<div class="img {{old('image')?'active':FALSE}}">
							<img src="{{old('image')}}">
							<input type="hidden" name="image" value="{{old('image')?old('image'):FALSE}}">
							<i class="fa fa-times"></i>
						</div>
						<span class="btn btn-sm btn-success btn-add-image">Chọn ảnh</span>
					</div>
				</div>
				<div class="form-group">
					<label>Tiêu đề</label>
					<input type="text" name="title" placeholder="Tiêu đề" class="form-control" value="{{old('title')}}">
				</div>
				<div class="form-group">
					<label>Mô tả</label>
					<textarea name="description" rows="3" class="form-control" style="resize: vertical;">{{old('description')}}</textarea>
				</div>
				<div class="text-center">
					<button class="btn btn-sm btn-primary" type="submit">Thêm</button>
				</div>
			</form>
		</div>
		<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
			<h3>Danh sách thuộc tính</h3>
			<table class="table">
				<thead>
					<tr>
						<th>Tên bước</th>
						<th>Hình ảnh</th>
						<th>Order</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				@if(count($steps) > 0)
				<tbody>
					@foreach($steps as $step)
					<tr>
						<td>{{$step->name}}</td>
						<td>
							<img src="{{asset($step->image)}}" style="width: 100px;">
						</td>
						<td>
							<span class="place" data-value="{{$step->id}}">{{$step->order}}</span>
						</td>
						<td>
							<span class="btn btn-sm btn-info btn-edit" data-value="{{$step->id}}">
								<i class="fa fa-edit"></i> Sửa
							</span>
						</td>
						<td>
							<span class="btn btn-sm btn-danger btn-delete">
								<i class="fa fa-trash"></i> Xóa
							</span>
						</td>
					</tr>
					@endforeach
				</tbody>
				<tfoot>
					<tr>
						<td colspan="5"><button class="btn btn-sm btn-success btn-update">Cập nhật</button></td>
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

		jQuery('#create input[name=name]').on('change',function(){
			var name = jQuery(this).val();
			jQuery('#create input[name=slug]').val(ChangeToSlug(name));
		})

		jQuery('.table tbody').sortable({
			update: function(){
				let ii = 1;
				jQuery('table.table tbody tr').each(function(){
					jQuery(this).find('span.place').text(ii);
					ii ++;
				})
			}
		});

		jQuery('.btn-update').on('click',function(){
			var arr = [];

			jQuery('.table tbody tr').each(function(){
				var id = jQuery(this).find('span.place').data('value');
				var order = jQuery(this).find('span.place').text();
				arr.push({'id':id, 'order': order});
			});

			jQuery.ajax({
				headers: {
					'X-CSRF-TOKEN': '{{ csrf_token() }}',
				},
				url: '{{route('admin.lashguide.step.order')}}',
				type: 'post',
				dataType: 'json',
				data: {
					arr: arr
				},
				success: function(res){
					if(res.status == 'success')
					{
						jQuery('h1').after('<div class="alert alert-success"><i class="fa fa-times"></i><p>Cập nhật thành công</p></div>');
						jQuery('body,html').animate({
							scrollTop: 0
						},600);
					}
				},
				errors: function(errors){
					console.log(errors);
				}
			});
		})

		jQuery('.btn-edit').on('click',function(){
			var id = jQuery(this).data('value');
			jQuery.ajax({
				url: '{{route('admin.lashguide.step.edit')}}',
				type: 'get',
				dataType: 'html',
				data: {
					id: id
				},
				beforeSend: function(){
					jQuery('#editModal .modal-content').html('');
				},
				success: function(res){
					jQuery('#editModal .modal-content').html(res);
					jQuery('#editModal').modal('show');
				},
				errors: function(errors){
					console.log(errors);
				}
			});
		});

		jQuery('form#create').on('submit',function(){
			var name = jQuery('form#create').find('input[name=name]').val();
			if(name.length == 0)
			{
				alert("Tên bước không được để trống");
				return false;
			}

			var slug = jQuery('form#create').find('input[name=slug]').val();
			if(slug.length == 0)
			{
				alert("Đường dẫn không được để trống");
				return false;
			}

			var image = jQuery('form#create').find('input[name=image]').val();
			if(image.length == 0)
			{
				alert("Hình ảnh không được để trống");
				return false;
			}


			var title = jQuery('form#create').find('input[name=title]').val();
			if(title.length == 0)
			{
				alert("Tiêu đề không được để trống");
				return false;
			}

			var description = jQuery('form#create').find('textarea[name=description]').val();
			if(description.length == 0)
			{
				alert("Mô tả không được để trống");
				return false;
			}
		});

		jQuery('#editModal').on('click','.btn-step',function(){

			var name = jQuery('#editModal').find('input[name=name]').val();
			if(name.length == 0)
			{
				alert("Tên bước không được để trống");
				return false;
			}

			var slug = jQuery('#editModal').find('input[name=slug]').val();
			if(slug.length == 0)
			{
				alert("Đường dẫn không được để trống");
				return false;
			}

			var image = jQuery('#editModal').find('input[name=image]').val();
			if(image.length == 0)
			{
				alert("Hình ảnh không được để trống");
				return false;
			}


			var title = jQuery('#editModal').find('input[name=title]').val();
			if(title.length == 0)
			{
				alert("Tiêu đề không được để trống");
				return false;
			}

			var description = jQuery('#editModal').find('textarea[name=description]').val();
			if(description.length == 0)
			{
				alert("Mô tả không được để trống");
				return false;
			}

			jQuery.ajax({
				headers: {
					'X-CSRF-TOKEN': '{{ csrf_token() }}',
				},
				url: '{{route('admin.lashguide.step.edit')}}',
				type: 'post',
				dataType: 'json',
				data: {
					id: jQuery('#editModal #idstep').val(),
					name: name,
					slug: slug,
					image: image,
					title: title,
					description: description
				},
				beforeSend: function(){
					jQuery('#editModal .modal-body .alert').remove();
				},
				success: function(res){
					if(res.status == 'error')
					{
						jQuery('#editModal .modal-body').prepend('<div class="alert alert-warning"><i class="fa fa-times"></i><p>'+res.msg+'</p></div>');
						jQuery('#editModal').animate({
							scrollTop: 0
						},400);
					}
					else
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
			});

		});

		jQuery('.btn-delete').on('click',function(){
			if(confirm("Bạn muốn xóa bước này?"))
			{
				var id = jQuery(this).data('value');
				jQuery.ajax({
					headers: {
						'X-CSRF-TOKEN': '{{ csrf_token() }}',
					},
					url: '{{route('admin.lashguide.step.delete')}}',
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


	});

	
</script>
@endsection