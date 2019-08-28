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

	#banner
	{
		display: none;
		position: relative;
		margin-bottom: 10px;
	}

	#banner.active
	{
		display: block;
	}

	#banner img
	{
		width: 100%;
		max-width: 100%;
	}

	#banner i
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
	

	#list_program .item .img
	{
		display: none;
		position: relative;
		margin-bottom: 10px;
	}

	#list_program .item .img img
	{
		width: 100%;
	}

	#list_program .item .img i
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
	
	#list_program .item .img.active
	{
		display: block;
	}

	#list_program .item label
	{
		display: block;
	}

	#list_program .item
	{
		display: flex;
		align-items: flex-start;
		margin-bottom: 15px;
	}

	#list_program .item .image
	{
		width: 30%;
	}

	#list_program .item .txt
	{
		width: 60%;
		padding: 0 30px;
	}

	#list_program .item .remove
	{
		width: 10%;
		padding-top: 30px;
	}


</style>
@endsection
@section('content')
<div class="page-pages">
	<h1>Cập nhật trang</h1>
	@if(session('errors'))
	<div class="alert alert-warning"> 
		@foreach($session('errors')->all() as $err)
		<p>{{$err}}</p>
		@endforeach
	</div>
	@endif
	@if(session('msg'))
	<div class="alert alert-success">
		<p>{{session('msg')}}</p>
	</div>
	@endif
	<form action="{{route('admin.pages.post_edit_program')}}" method="post">
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
				<li><a data-toggle="tab" href="#pro">Nội dung</a></li>
			</ul>

			<div class="tab-content">
				<div id="tab_banner" class="tab-pane fade in active">
					<div class="form-group">
						<label>Banner</label>
						<div id="banner" class="active">
							<img src="{{$banner->meta_value}}">
							<i class="fa fa-times"></i>
						</div>
						<span class="btn btn-success btn-sm btn-add_banner">Chọn ảnh</span>
						<input type="hidden" name="banner" value="{{$banner->meta_value}}">
					</div>
					<div class="form-group">
						<label>Tiêu đề</label>
						<input type="text" name="page_title" placeholder="Tiêu đề" class="form-control" value="{{$page_title->meta_value}}">
					</div>
					<diiv class="form-group">
						<label>Mô tả</label>
						<textarea name="page_description" rows="5" class="form-control" style="resize: none;" placeholder="Mô tả">{!! $page_description->meta_value !!}</textarea>
					</diiv>
				</div>
				<div id="pro" class="tab-pane fade in">
					<div class="form-group">
						<label>Tiêu đề</label>
						<input type="text" name="pro_title" placeholder="Tiêu đề" class="form-control" value="{{$pro_title->meta_value}}">
					</div>
					<div class="form-group">
						<label>Mô tả</label>
						<textarea name="pro_description" rows="5" class="form-control" placeholder="Mô tả" style="resize: none;">{!! $pro_description->meta_value !!}</textarea>
					</div>
					<div class="form-group">
						<label>Các chương trình</label>
						<div id="list_program">
							@if(count($programs))
							@foreach($programs as $program)
							@php
							$program = json_decode($program->meta_value,true)
							@endphp
							<div class="item">
								<div class="image">
									<label>Hình ảnh</label>
									<div class="img active">
										<img src="{{$program['image']}}" alt="">
										<input type="hidden" name="program_img[]" value="{{$program['image']}}">
										<i class="fa fa-times"></i>
									</div>
									<span class="btn btn-sm btn-info btn-add_program">Chọn ảnh</span>
								</div>
								<div class="txt">
									<label>Text</label>
									<input type="text" name="program_name[]" class="form-control" placeholder="Text" value="{{$program['name']}}">
								</div>
								<div class="remove">
									<span class="btn btn-sm btn-danger fa fa-trash"></span>
								</div>
								
							</div>
							@endforeach
							@endif
							<div class="text-right">
								<span class="btn btn-sm btn-info btn-more">Thêm</span>
							</div>
						</div>
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
			jQuery('.template .item').on('click',function(){
				if(confirm("Layout sẽ chỉ được chọn 1 lần. Bạn chắc chắn chọn layout này ?"))
				{
					var template = jQuery(this).data('template');
					jQuery('form').attr('action','{{route('admin.pages.index')}}'+'/'+template);
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
				CKFinder.popup( {
					chooseFiles: true,
					onInit: function( finder ) {
						finder.on( 'files:choose', function( evt ) {
							var file = evt.data.files.first();
							jQuery('#banner img').attr('src',file.getUrl());
							jQuery('input[name=banner]').val(file.getUrl());
							jQuery('#banner').addClass('active');
						} );
					}
				} );
			});

			jQuery('#banner').on('click','i',function(){
				if(confirm("Bạn muốn xóa ảnh này ?"))
				{
					jQuery('#banner').removeClass('active');
					jQuery('input[name=banner]').val('');

				}
			})

			jQuery('#list_program').on('click','.item .image span.btn-add_program',function(){
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

			jQuery('#list_program').on('click','.item .image .img i',function(){
				var cur = jQuery(this).parent();
				if(confirm("Bạn muốn xóa ảnh này ?"))
				{
					cur.removeClass('active');
					cur.find('img').removeAttr('src');
					cur.find('input').val('');
				}
			});

			jQuery('#list_program').on('click','.item span.fa-trash',function(){
				if(confirm("Bạn muốn xóa dòng này ?"))
				{
					jQuery(this).parents('.item').first().remove();
				}
			});

			jQuery('#list_program').on('click','span.btn-more',function(){
				var i = 0;
				jQuery('#list_program .item').each(function(){
					i ++;
				});
				if(i > 2) return false;
				jQuery(this).parent().before(`
					<div class="item">
					<div class="image">
					<label>Hình ảnh</label>
					<div class="img">
					<img src="" alt="">
					<input type="hidden" name="program_img[]">
					<i class="fa fa-times"></i>
					</div>
					<span class="btn btn-sm btn-info btn-add_program">Chọn ảnh</span>
					</div>
					<div class="txt">
					<label>Text</label>
					<input type="text" name="program_name[]" class="form-control" placeholder="Text">
					</div>
					<div class="remove">
					<span class="btn btn-sm btn-danger fa fa-trash"></span>
					</div>
					</div>
					`);
			});

			jQuery('form').on('submit',function(){
				var name = jQuery('input[name=name]').val();
				if(name.length == 0)
				{
					alert("Tiêu đề không được để trông");
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
					alert("Banner không được để trống");
					return false;
				}

				var page_title = jQuery('input[name=page_title]').val();
				if(page_title.length == 0)
				{
					alert('Tiêu đề banner không được để trống');
					return false;
				}

				var pro_title = jQuery('input[name=pro_title]').val();
				if(pro_title.length == 0)
				{
					alert("Tiêu đề chương trình không được để trống");
					return false;
				}
			})
		})
	</script>
	@endsection