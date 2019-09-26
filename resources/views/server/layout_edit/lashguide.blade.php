@extends('layouts.server')
@section('title')
Cập nhật trang
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
</style>
@endsection
@section('content')
<div class="page-lashguide">
	<h1>Cập nhật trang</h1>
	@if(session('errors'))
	<div class="alert alert-warning">
		<i class="fa fa-times"></i>
		@foreach(session('errors')->all() as $msg)
		<p>{{$msg}}</p>
		@endforeach
	</div>
	@endif
	@if(session('msg'))
	<div class="alert alert-success">
		<i class="fa fa-times"></i>
		<p>{{session('msg')}}</p>
	</div>
	@endif
	
	<form action="{{route('admin.pages.post_edit_lashguide')}}" method="post">
		@csrf
		<input type="hidden" name="id" value="{{$page->id}}">
		<div class="row">
			<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
				<div class="form-group">
					<label>Tiêu đề trang</label>
					<input type="text" name="name" class="form-control" value="{{$page->name}}" placeholder="Tiêu đề trang">
				</div>
				<div class="form-group">
					<label>Đường dẫn trang</label>
					<input type="text" name="slug" class="form-control" value="{{$page->slug}}" placeholder="Đường dẫn trang">
				</div>
				<div class="form-group background_image">
					<label>Ảnh nền</label>
					<div class="image">
						<div class="img active">
							<img src="{{$background->meta_value}}">
							<input type="hidden" name="background" value="{{$background->meta_value}}">
							<i class="fa fa-times"></i>
						</div>
						<span class="btn btn-sm btn-success btn-add-image">Chọn ảnh</span>
					</div>
				</div>
				<div class="form-group">
					<label>Tiêu đề nhỏ</label>
					<input type="text" name="sub_title" class="form-control" value="{{$sub_title->meta_value}}" placeholder="Tiêu đề nhỏ">
				</div>
				<div class="form-group">
					<label>Mô tả</label>
					<textarea name="description" rows="3" class="form-control" style="resize: vertical;">{{$description->meta_value}}</textarea>
				</div>
			</div>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
				<div class="text-center">
					<button class="btn btn-md btn-primary" type="submit">Cập nhật</button>
				</div>
			</div>
		</div>
		
	</form>
	

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

		jQuery('form').on('submit',function(){
			var name = jQuery('form input[name=name]').val();
			if(name.length == 0)
			{
				alert("Tiêu đề trang không được để trống");
				return false;
			}

			var slug = jQuery('form input[name=slug]').val();
			if(slug.length == 0)
			{
				alert('Đường dẫn trang không được để trống');
				return false;
			}

			var background = jQuery('form input[name=background]').val();

			if(background.length == 0)
			{
				alert("Ảnh nền không được để trống");
				return false;
			}

			var sub_title = jQuery('form input[name=sub_title]').val();
			if(sub_title.length == 0)
			{
				alert("Tiêu đề nhỏ không được để trống");
				return false;
			}

			var description = jQuery('form textarea[name=description]').val();
			if(description.length == 0)
			{
				alert("Mô tả không được để trống");
				return false;
			}


		});


	})
</script>
@endsection