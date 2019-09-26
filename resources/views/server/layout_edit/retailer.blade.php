@extends('layouts.server')
@section('title')
Cập nhật trang
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

	#banner, #banner_title
	{
		display: none;
		position: relative;
		margin-bottom: 10px;
	}

	#banner.active, #banner_title.active
	{
		display: block;
	}

	#banner img, #banner_title img
	{
		width: 100%;
		max-width: 100%;
	}

	#banner i, #banner_title i, #earn_image i
	{
		position: absolute;
		top: 0;
		right: 0;
		padding: 5px;
		display: inline-block;
		border-radius: 100%;
		background: #fff;
		color: #000;
		font-weight: bold;
		cursor: pointer;
	}

	.tab-content
	{
		padding: 15px;
		background: #fff;
		border: thin #ddd solid;
	}
	
	#tab_banner label, #shop label
	{
		display: block;
	}
	
	.content-retailer .item
	{
		display: inline-block;
		width: 15%;
		margin-right: 10px;
		position: relative;
	}

	.content-retailer .item img
	{
		width: 100%;
	}

	.content-retailer .item i
	{
		position: absolute;
		top: 0;
		right: 0;
		padding: 5px;
		display: inline-block;
		border-radius: 100%;
		background: #fff;
		color: #000;
		font-weight: bold;
		cursor: pointer;
	}


</style>
@endsection
@section('content')
<div class="page-pages">
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
	<form action="{{route('admin.pages.post_edit_retailer')}}" method="post">
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
			<ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#tab_banner">Banner</a></li>
				<li><a data-toggle="tab" href="#find">Tìm nhà bán lẻ</a></li>
				<li><a data-toggle="tab" href="#become">Đăng ký nhà bán lẻ</a></li>
			</ul>

			<div class="tab-content">
				<div id="tab_banner" class="tab-pane fade in active">
					<div class="form-group">
						<label>Banner</label>
						<div id="banner" class="active">
							<img src="{{$banner->meta_value}}">
							<i class="fa fa-times remove"></i>
							<input type="hidden" name="banner" value="{{$banner->meta_value}}">
						</div>
						<span class="btn btn-success btn-sm btn-add_banner">Chọn ảnh</span>
					</div>
					<div class="form-group">
						<label>Tiêu đề</label>
						<input type="text" name="page_title" class="form-control" placeholder="Tiêu đề" value="{{$page_title->meta_value}}">
					</div>
					<div class="form-group">
						<label>Mô tả</label>
						<textarea name="page_description" rows="5" class="form-control" placeholder="Mô tả" style="resize: none;">{!! $page_description->meta_value !!}</textarea>
					</div>
				</div>
				<div id="find" class="tab-pane fade in">
					<div class="form-group">
						<label>Nhà bán lẻ</label>
						<div class="content-retailer">
							@if(count($retailers) > 0)
							@foreach($retailers as $retailer)
							<div class="item">
								<img src="{{$retailer->meta_value}}">
								<input type="hidden" name="retailer[]" value="{{$retailer->meta_value}}">
								<i class="fa fa-times"></i>
							</div>
							@endforeach
							@endif
						</div>
						<span class="btn btn-sm btn-info add-retailer">Thêm nhà bán lẻ</span>
					</div>
				</div>
				<div id="become" class="tab-pane fade in">
					<div class="form-group">
						<label>Tiêu đề</label>
						<input type="text" name="become_title" class="form-control" placeholder="Tiêu đề" value="{{$become_title->meta_value}}">
					</div>
					<div class="form-group">
						<label>Mô tả</label>
						<textarea name="become_description" rows="5" class="form-control" placeholder="Mô tả" style="resize: none;">{!! $become_description->meta_value !!}</textarea>
					</div>
				</div>
			</div>
			<hr>
			<div class="form-group text-center">
				<button class="btn btn-lg btn-primary" type="submit">Lưu</button>
			</div>
		</div>
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

	jQuery(document).ready(function(){
		jQuery('.btn-add_banner').click(function(){
			var cur = jQuery(this).prev();
			CKFinder.popup( {
				chooseFiles: true,
				onInit: function( finder ) {
					finder.on( 'files:choose', function( evt ) {
						var file = evt.data.files.first();
						cur.find('img').attr('src',file.getUrl());
						cur.find('input').val(file.getUrl());
						cur.addClass('active');
					} );
				}
			} );
		});

		jQuery('.tab-content').on('click','i.remove',function(){
			if(confirm("Bạn muốn xóa ảnh này ?"))
			{
				jQuery(this).parent().removeClass('active');
				jQuery(this).parent().find('input').val('');
				jQuery(this).parent().find('img').removeAttr('src');

			}
		})

		jQuery('.add-retailer').click(function(){
			var cur = jQuery(this).prev();
			CKFinder.popup( {
				chooseFiles: true,
				onInit: function( finder ) {
					finder.on( 'files:choose', function( evt ) {
						var file = evt.data.files;
						file.forEach(function(e){
							cur.append(`
								<div class="item">
								<img src="`+e.getUrl()+`">
								<input type="hidden" name="retailer[]" value="`+e.getUrl()+`">
								<i class="fa fa-times"></i>
								</div>
								`);
						});
					} );
				}
			} );
		});

		jQuery('.content-retailer').on('click','.item i',function(){
			if(confirm("Bạn muốn xóa ảnh này ?"))
			{
				jQuery(this).parent().remove();
			}
		})

		jQuery('form').on('submit',function(){
			var name = jQuery('input[name=name]').val();
			if(name.length == 0)
			{
				alert("Tiêu đề trang không được để trống");
				return false;
			}

			var slug = jQuery('input[name=slug]').val();
			if(slug.length == 0)
			{
				alert("Đường dẫn trang không được để trống");
				return false;
			}

			var banner = jQuery('input[name=banner]').val();
			if(banner.length == 0)
			{
				alert('Banner không được để trống');
				return false;
			}

			var page_title = jQuery('input[name=page_title]').val();
			if(page_title.lenth == 0)
			{
				alert("Banner tiêu đề không được để trống");
				return false;
			}

			var page_description = jQuery('input[name=page_description]').val();
			if(page_description.length == 0)
			{
				alert("Mô tả không được để trống");
				return false;
			}

			var become_title = jQuery('input[name=become_title]').val();
			if(become_title.lenth == 0)
			{
				alert("Tiêu đề đăng ký không được để trống");
				return false;
			}

			var become_description = jQuery('input[name=become_description]').val();
			if(become_description.length == 0)
			{
				alert("Mô tả không được để trống");
				return false;
			}


			var err = jQuery('form').find('.errors');
			if(err.length > 0)
			{
				alert("Có thông tin chưa chính xác. Vui lòng kiểm tra lại các thông tin.");
				return false;
			}

		})
	})
</script>
@endsection