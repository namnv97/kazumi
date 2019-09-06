@extends('layouts.server')
@section('title')
Cập nhật bài viết
@endsection
@section('css')
<style>
	#image{
		position: relative;
		display: none;
	}

	#image img
	{
		width: 100%;
	}

	#image i
	{
		position: absolute;
		top: 0;
		right: 0;
		padding: 5px;
		border-radius: 100%;
		background: #fff;
		color: #000;
		font-weight: bold;
		cursor: pointer;
	}

	#image.active
	{
		display: block;
	}

	.errors
	{
		padding-left: 15px;
		color: red;
	}


</style>
@endsection
@section('content')
<div class="page-articles">
	<h1>Cập nhật bài viết</h1>
	@if(session('errors'))
	<div class="alert alert-warning">
		@foreach(session('errors')->all() as $msg)
		<p>{{$msg}}</p>
		@endforeach
	</div>
	@endif
	@if(session('msg'))
	<div class="alert alert-success">
		<p>{{session('msg')}}</p>
	</div>
	@endif
	<form action="{{route('admin.articles.edit')}}" method="post">
		@csrf
		<input type="hidden" name="id" value="{{$article->id}}">
		<div class="row">
			<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
				<div class="form-group">
					<label>Tiêu đề</label>
					<input type="text" name="title" class="form-control" placeholder="Tiêu đề bài viết" value="{{$article->title}}">
				</div>
				<div class="form-group">
					<label>Đường dẫn</label>
					<input type="text" name="slug" class="form-control" placeholder="Đường dẫn bài viết" value="{{$article->slug}}">
				</div>
				<div class="form-group">
					<label>Mô tả</label>
					<textarea name="description" rows="5" class="form-control" style="resize: vertical;">{!! $article->description !!}</textarea>
				</div>
				<div class="form-group">
					<label>Nội dung</label>
					<textarea name="article_content" id="article_content" rows="20" class
					="form-control" style="resize: vertical;" placeholder="Nội dung bài viết">{!! $article->article_content !!}</textarea>
				</div>
			</div>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
				<div class="form-group">
					<label style="display: block;">Ảnh bài viết</label>
					<div id="image" class="active">
						<img src="{{$article->thumbnail}}">
						<input type="hidden" name="thumbnail" value="{{$article->thumbnail}}">
						<i class="fa fa-times"></i>
					</div>
					<span class="btn btn-sm btn-info btn-thumbnail">Chọn ảnh bài viết</span>
				</div>
			</div>
			<hr>
			<div class="form-group text-center">
				<button class="btn btn-lg btn-primary" type="submit">Cập nhật</button>
			</div>
		</div>
	</form>
</div>
@endsection
@section('script')
<script type="text/javascript">
	jQuery(document).ready(function(){
		CKEDITOR.replace('article_content');
		jQuery('.btn-thumbnail').on('click',function(){
			CKFinder.popup( {
				chooseFiles: true,
				onInit: function( finder ) {
					finder.on( 'files:choose', function( evt ) {
						var file = evt.data.files.first();
						jQuery('#image img').attr('src',file.getUrl());
						jQuery('#iamge input').val(file.getUrl());
						jQuery('#image').addClass('active');
					} );
				}
			} );
		})

		jQuery('#image i').on('click',function(){
			jQuery(this).parent().removeClass('active');
			jQuery(this).parent().find('img').removeAttr('src');
			jQuery(this).parent().find('input').val('');
		});

		jQuery('form').on('submit',function(){
			var err = 0;
			var title = jQuery('input[name=title]').val();
			if(title.length == 0)
			{
				jQuery('input[name=title]').after('<p class="errors">Tiêu đề bài viết không được để trống</p>');
				err++;
			}

			var slug = jQuery('input[name=slug]').val();
			if(slug.length == 0)
			{
				jQuery('input[name=slug]').after('<p class="errors">Đường dẫn bài viết không được để trống</p>');
				err++;
			}

			var thumbnail = jQuery('input[name=thumbnail]').val();
			if(thumbnail.length == 0)
			{
				jQuery('#image').after('<p class="errors">Ảnhbài viết không được để trống</p>');
				err++;
			}
			var content = CKEDITOR.instances.article_content.getData();
			if(content.length == 0)
			{
				jQuery('#article_content').parent().append('<p class="errors">Nội dung bài viết không được để trống</p>');
				err++;
			}

			if(err > 0)
			{
				alert("Vui lòng kiểm tra các thông tin lỗi");
				return false;
			}

		});
	});
</script>
@endsection