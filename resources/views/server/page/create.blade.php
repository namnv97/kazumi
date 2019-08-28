@extends('layouts.server')
@section('title')
Thêm mới
@endsection
@section('css')
<style>
	.template .item
	{
		display: inline-block;
		width: 33%;
		padding: 0 10px 10px 10px;
		margin-bottom: 15px;
		cursor: pointer;
	}

	.template .item:hover
	{
		background: #fff;
		-webkit-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
		-moz-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
		box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
	}

	.template .item .image
	{
		height: 300px;
		overflow-y: auto;
	}

	.template .item .image img
	{
		width: 100%;
	}

	
	.template .item .image::-webkit-scrollbar-track
	{
		-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
		background-color: #F5F5F5;
	}

	.template .item .image::-webkit-scrollbar
	{
		width: 6px;
		background-color: #F5F5F5;
	}

	.template .item .image::-webkit-scrollbar-thumb
	{
		background-color: #000000;
	}
	
	p.errors
	{
		padding-left: 15px;
		color: red;
	}


</style>
@endsection
@section('content')
<div class="page-pages">
	@if(session('errors'))
	<div class="alert alert-warning">
		@foreach(session('errors')->all() as $msg)
		<p>{{$msg}}</p>
		@endforeach
	</div>
	@endif
	<form action="" method="post">
		@csrf
		<div class="form-group">
			<label>Tiêu đề trang</label>
			<input type="text" class="form-control" name="name" placeholder="Tiêu đề trang">
		</div>
		<div class="form-group">
			<label>Đường dẫn trang</label>
			<input type="text" name="slug" placeholder="Đường dẫn trang" class="form-control">
		</div>
		<div class="template">
			@if(!empty($templates))
			@foreach($templates as $template)
			<div class="item" data-template="{{$template->template}}">
				<h3>{{$template->name}}</h3>
				<div class="image">
					<img src="{{$template->image}}" alt="{{$template->name}}">
				</div>
			</div>
			@endforeach
			@endif
		</div>
		<div class="page-content"></div>
	</form>
</div>
@endsection
@section('script')
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('.template .item').on('click',function(){
			if(confirm("Layout sẽ chỉ được chọn 1 lần. Bạn chắc chắn chọn layout này ?"))
			{
				var template = jQuery(this).data('template');
				jQuery('form').attr('action','{{route('admin.pages.index')}}'+'/'+template);
				jQuery('form').prepend('<input type="hidden" name="template" value="'+template+'">');
				jQuery.ajax({
					url: '{{route('admin.pages.get_template')}}',
					type: 'get',
					dataType: 'html',
					data: {
						template: template
					},
					beforeSend: function(){

					},
					success: function(res){
						jQuery('.page-content').html(res);
						jQuery('.template').remove();
					},
					errors: function(e){
						console.log(e);
					}
				});
			}
		});

		jQuery('input[name=name]').on('change',function(){
			var name = jQuery(this).val();
			jQuery('input[name=slug]').val(ChangeToSlug(name));
			jQuery('input[name=slug]').trigger('change');
		});

		jQuery('input[name=slug]').on('change',function(){
			jQuery('form').find('.errors').remove();
			var slug = jQuery(this).val();
			jQuery.ajax({
				url: '{{route('admin.pages.check_slug')}}',
				type: 'get',
				dataType: 'json',
				data: {
					slug: slug
				},
				beforeSend: function(){

				},
				success: function(res){
					if(res.status == 'errors')
					{
						jQuery('input[name=slug]').after('<p class="errors">'+res.msg+'</p>');
					}
				},
				errors: function(e){
					console.log(e);
				}
			});
		});









	});
</script>
@endsection