@extends('layouts.server')
@section('title')
Danh mục
@endsection
@section('css')
<style>
	#add_description
	{
		resize: none;
	}

	#editmodal .modal-content p.errors
	{
		padding-left: 15px;
		color: red;
	}
</style>

@endsection

@section('content')
<h1>Danh mục</h1>
<div class="collections">
	<div class="row">
		<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
			<div class="add_new">
				<h3>Thêm mới</h3>
				@if(session('errors'))
				<div class="alert alert-warning">
					@foreach(session('errors')->all() as $msg)
					<p>{{$msg}}</p>
					@endforeach
				</div>
				@endif
				@if(session('msg_add'))
				<div class="alert alert-success">
					<p>{{session('msg_add')}}</p>
				</div>
				@endif
				<form action="{{route('admin.collection.create')}}" method="post">
					@csrf
					<div class="form-group">
						<label>Tên danh mục</label>
						<input type="text" name="name" class="form-control" placeholder="Collection name" value="{{old('name')}}">
					</div>
					<div class="form-group">
						<label>Đường dẫn danh mục</label>
						<input type="text" name="slug" class="form-control" value="{{old('slug')}}">
					</div>
					<div class="form-group">
						<label>Danh mục cha</label>
						<select name="parent" class="form-control">
							<option value="0">Trống</option>
							@if(!empty($cates))
							@foreach($cates as $cate)
							<option value="{{$cate->id}}">{{$cate->name}}</option>
							@endforeach
							@endif
						</select>
					</div>
					<div class="form-group">
						<label>Mô tả danh mục</label>
						<textarea name="description" rows="7" class="form-control" id="add_description" placeholder="Description"></textarea>
					</div>
					<div class="text-center">
						<button class="btn btn-sm btn-primary">Thêm</button>
					</div>
				</form>
			</div>
		</div>
		<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
			<div class="list_collection">
				<h3>Danh sách danh mục</h3>
				@if(session('msg_update'))
				<div class="alert alert-success">
					<p>{{session('msg_update')}}</p>
				</div>
				@endif
				@if(session('msg_delete'))
				<div class="alert alert-warning">
					<p>{{session('msg_delete')}}</p>
				</div>
				@endif
				<table class="table">
					<thead>
						<tr>
							<th>STT</th>
							<th>Tên danh mục</th>
							<th>Mô tả</th>
							<th>Danh mục cha</th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@if(!empty($lists))
						@foreach($lists as $key => $cat)
						<tr>
							<td>{{($lists->currentPage() - 1) * $lists->perPage() + $key + 1}}</td>
							<td>{{$cat->name}}</td>
							<td>{!! $cat->description !!}</td>
							<td><?php echo $cat->parent_name(); ?></td>
							<td>
								<span class="btn btn-sm btn-success edit" data-value="{{$cat->id}}"><i class="fa fa-edit"></i> Sửa</span>
							</td>
							<td>
								<span class="btn btn-sm btn-danger trash" data-value="{{$cat->id}}"><i class="fa fa-trash"></i> Xóa</span>
								<form action="{{route('admin.collection.delete',['id' => $cat->id])}}" method="POST" style="display: none;">
									{{method_field('DELETE')}}
									@csrf             
								</form>
							</td>
						</tr>
						@endforeach
						@endif
					</tbody>
					<tfoot>
						<tr>
							<td colspan="6">{{$lists->links()}}</td>
						</tr>
					</tfoot>
				</table>
			</div>
			<div id="editmodal" class="modal fade" role="dialog">
				<div class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title text-center">Danh mục: <b></b></h4>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<label>Tên danh mục</label>
								<input type="text" name="name" class="form-control" placeholder="Collection name">
							</div>
							<div class="form-group">
								<label>Đường dẫn danh mục</label>
								<input type="text" name="slug" class="form-control">
							</div>
							<div class="form-group">
								<label>Danh mục cha</label>
								<select name="parent" class="form-control">
									<option value="0">Trống</option>
									@if(!empty($cates))
									@foreach($cates as $cate)
									<option value="{{$cate->id}}">{{$cate->name}}</option>
									@endforeach
									@endif
								</select>
							</div>
							<div class="form-group">
								<label>Mô tả danh mục</label>
								<textarea name="description" rows="7" class="form-control" id="add_description" placeholder="Description"></textarea>
							</div>
							<div class="text-center">
								<button class="btn btn-sm btn-primary">Cập nhật</button>
							</div>
						</div>
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
		jQuery('.list_collection tr td .edit').on('click',function(){
			var id = jQuery(this).data('value');
			jQuery.ajax({
				url: '{{route('admin.collection.edit')}}',
				type: 'get',
				dataType: 'json',
				data: {
					id: id
				},
				beforeSend: function(){

				},
				success: function(res){
					jQuery('#editmodal .modal-title b').text(res.name);
					jQuery('#editmodal .modal-content input[name=name]').val(res.name);
					jQuery('#editmodal .modal-content input[name=slug]').val(res.slug);
					jQuery('#editmodal .modal-content textarea[name=description]').val(res.description);
					if(res.parent != null) jQuery('#editmodal .modal-content select[name=parent]').val(res.parent);
					jQuery('#editmodal .modal-content select[name=parent] option').each(function(){
						if(jQuery(this).attr('value') == res.id) jQuery(this).attr('disabled','disabled');
					});
					jQuery('#editmodal .modal-content button').attr('data-id',id);
					jQuery('#editmodal').modal('show');
				},
				errors: function(){

				}
			})
			
		});
	});

	jQuery('#editmodal .modal-content .modal-body button').click(function(){
		jQuery(this).parents('.modal-content').find('.errors').remove();
		jQuery('#editmodal .modal-content .alert').remove();
		var data = {};
		data.id = jQuery(this).data('id');
		data.name = jQuery(this).parents('.modal-content').find('input[name=name]').val();
		if(data.name.length == 0)
		{
			jQuery(this).parents('.modal-content').find('input[name=name]').after('<p class="errors">Collection Name is required</p>');
			return false;
		}
		data.slug = jQuery(this).parents('.modal-content').find('input[name=slug]').val();
		if(data.slug.length == 0)
		{
			jQuery(this).parents('.modal-content').find('input[name=slug]').after('<p class="errors">Collection Slug is required</p>');
			return false;
		}
		data.parent = jQuery(this).parents('.modal-content').find('select[name=parent]').val();
		data.description = jQuery(this).parents('.modal-content').find('textarea[name=description]').val();
		
		jQuery.ajax({
			headers: {
				'X-CSRF-TOKEN': '{{ csrf_token() }}',
			},
			url: '{{route('admin.collection.edit')}}',
			type: 'post',
			dataType: 'json',
			data: data,
			beforeSend: function(){

			},
			success: function(res){
				jQuery('#editmodal .modal-content').prepend('<div class="alert alert-'+res.status+'"><p>'+res.msg+'</p></div>');
				if(res.status == 'success')
				{
					setTimeout(function(){
						window.location.href = '';
					},1000);
				}
			},
			errors: function(errors){
				console.log(errors);
			}
		})

	});


	jQuery('.list_collection tr td .trash').on('click',function(){
		if(confirm("Are you sure?"))
		{
			jQuery(this).next().submit();
		}
	});



	jQuery('.add_new input[name=name]').on('change',function(){
		var name = jQuery(this).val();
		var slug = ChangeToSlug(name);
		jQuery('.add_new input[name=slug]').val(slug);
	});
</script>
@endsection