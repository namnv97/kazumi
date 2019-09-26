@extends('layouts.server')
@section('title')
Cập nhật trang
@endsection
@section('css')
<style>
	.tab-content
	{
		padding: 15px;
		background: #fff;
		border: thin #ddd solid;
	}


</style>
@endsection
@section('content')
<div class="page-pages">
	<h1>Cập nhật trang</h1>
	@if(session('errors'))
	<div class="alert alert-warning"> 
		<i class="fa fa-times"></i>
		@foreach(session('errors')->all() as $err)
		<p>{{$err}}</p>
		@endforeach
	</div>
	@endif
	@if(session('msg'))
	<div class="alert alert-success">
		<i class="fa fa-times"></i>
		<p>{{session('msg')}}</p>
	</div>
	@endif


	<form action="{{route('admin.pages.post_edit_default')}}" method="post">
		@csrf
		<input type="hidden" name="id" value="{{$page->id}}">
		<div class="form-group">
			<label>Tiêu đề trang</label>
			<input type="text" class="form-control" name="name" placeholder="Tiêu đề trang" value="{{$page->name}}">
		</div>
		<div class="form-group">
			<label>Đường dẫn trang</label>
			<input type="text" name="slug" placeholder="Đường dẫn trang" class="form-control" value="{{$page->slug}}">
		</div>
		<div class="page-content">
			<div class="form-group">
				<label>Nội dung</label>
				<textarea name="page_content" id="page_content" rows="10" class="form-control">{!! $page_content->meta_value !!}</textarea>
			</div>
			<hr>
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
			CKEDITOR.replace('page_content');

			jQuery('input[name=name]').on('change',function(){
				var name = jQuery(this).val();
				jQuery('input[name=slug]').val(ChangeToSlug(name));
			})

		});
	</script>
@endsection