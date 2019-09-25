@extends('layouts.server')
@section('title')
Thiết lập chung
@endsection
@section('css')
<style>
	#logo
	{
		width: 250px;
		display: none;
		position: relative;
		margin-bottom: 10px;
	}

	#logo.active
	{
		display: block;
	}

	#logo img
	{
		max-width: 100%;
	}

	#logo i
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

	.banner-collection .img
	{
		display: none;
		margin-bottom: 10px;
	}

	.banner-collection .img.active
	{
		display: block;
	}

	.tab-content {
		padding: 15px;
		background: #fff;
	}

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

	.attribute_lash .form-group
	{
		display: table;
		width: 100%;
	}

	.attribute_lash .form-group .item
	{
		display: table-cell;
		width: 45%;
		vertical-align: top;
		padding: 5px;
		border-right: thin #eee solid;
	}
	
	.attribute_lash .form-group .remove
	{
		display: table-cell;
		width: 10%;
		vertical-align: middle;
		text-align: center;
	}

	.attribute_lash .form-group .remove i
	{
		display: inline-block;
		padding: 5px;
		width: 25px;
		height: 25px;
		border-radius: 100%;
		border: thin #eee solid;
		color: #000;
		cursor: pointer;
	}

	.attribute_lash .form-group .remove i:hover
	{
		border: thin red solid;
		background: #eee;
	}

	.attribute_lash .form-group
	{
		border: thin #eee solid;
		border-bottom: none;
		margin-bottom: 0;
	}

	.attribute_lash .form-group:last-child
	{
		border-bottom: thin #eee solid;
	}

</style>
@endsection
@section('content')

<div class="page-settings">
	<h1>Thiết lập chung</h1>
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
	<form action="{{route('admin.options.index')}}" method="post">
		@csrf
		<div class="row">
			<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
				<ul class="nav nav-tabs">
					<li class="active"><a data-toggle="tab" href="#logo">Logo</a></li>
					<li><a data-toggle="tab" href="#shipping">Giao hàng và Hoàn lại</a></li>
					<li><a data-toggle="tab" href="#collection">Bộ sưu tập</a></li>
					<li><a data-toggle="tab" href="#reward_help">Trang điểm thưởng</a></li>
					<li><a data-toggle="tab" href="#lash_result">Trang kết quả Lash Guide</a></li>
				</ul>

				<div class="tab-content">
					<div id="logo" class="tab-pane fade in active">
						<div class="form-group">
							<label>Logo</label>
							<div id="logo" class="{{(!empty($logo))?'active':FALSE}}">
								<img src="{{(!empty($logo))?$logo->meta_value:FALSE}}">
								<i class="fa fa-times"></i>
							</div>
							<span class="btn btn-success btn-sm btn-add_logo">Chọn ảnh</span>
							<input type="hidden" name="logo" value="{{(!empty($logo))?$logo->meta_value:FALSE}}">
						</div>
					</div>
					<div id="shipping" class="tab-pane fade">
						<div class="form-group">
							<label>Nội dung</label>
							<textarea name="product_shipping" id="product_shipping" rows="10" class="form-control editor" style="resize: vertical;">{{old('product_shipping')?old('product_shipping'):(($product_shipping)?$product_shipping->meta_value:FALSE)}}</textarea>
						</div>
					</div>
					<div id="collection" class="tab-pane fade">
						<div class="form-group">
							<label>Banner</label>
							<div class="banner-collection">
								<div class="img {{(!empty($banner_collection))?'active':FALSE}}">
									<img src="{{(!empty($banner_collection))?$banner_collection->meta_value:FALSE}}" alt="image">
									<input type="hidden" name="banner_collection" value="{{(!empty($banner_collection))?$banner_collection->meta_value:FALSE}}">
								</div>
								<span class="btn btn-sm btn-info add-banner">Chọn ảnh</span>
							</div>
						</div>
						<div class="form-group">
							<label>Nội dung</label>
							<textarea name="suggest_collection" id="suggest_collection" rows="3" class="form-control editor" style="resize: vertical;">{!! (!empty($suggest_collection))?$suggest_collection->meta_value:FALSE !!}</textarea>
						</div>
					</div>
					<div id="reward_help" class="tab-pane fade in">
						<div class="form-group">
							<label>Nội dung giúp đỡ</label>
							<textarea name="reward_help" id="reward_help" class="editor form-control" rows="10">{!! (!empty($reward_help))?$reward_help->meta_value:FALSE !!}</textarea>
						</div>
					</div>
					<div id="lash_result" class="tab-pane fade">
						<div class="form-group">
							<label>Mã giảm giá (%)</label>
							<input type="number" name="code_percent" class="form-control" placeholder="Mã giảm giá: VD: 10" value="{{(!empty($code_percent))?$code_percent->meta_value:FALSE}}">
						</div>
						<div class="form-group">
							<label>Thuộc tính</label>
							<input type="text" name="lash_title" placeholder="Tiêu đề thuộc tính" class="form-control" value="{{(!empty($lash_title))?$lash_title->meta_value:FALSE}}">
						</div>
						<div class="list_attributes">
							<label>Các thuộc tính</label>
							<div class="attribute_lash">
								@if(count($lash_attr) > 0)
								@foreach($lash_attr as $lash)
								@php
								$item = json_decode($lash->meta_value,true);
								@endphp
								<div class="form-group">
									<div class="item background_image">
										<label>Hình ảnh</label>
										<div class="image">
											<div class="img active">
												<img src="{{$item['image']}}">
												<input type="hidden" name="lash_image[]" value="{{$item['image']}}">
												<i class="fa fa-times"></i>
											</div>
											<span class="btn btn-sm btn-info btn-add-image">Chọn ảnh</span>
										</div>
									</div>
									<div class="item">
										<label>Tiêu đề</label>
										<input type="text" name="lash_attribute[]" class="form-control" placeholder="Tiêu đề" value="{{$item['title']}}">
									</div>
									<div class="remove">
										<i class="fa fa-times" title="Xóa thuộc tính"></i>
									</div>
								</div>
								@endforeach
								@endif
							</div>
							<div class="text-right">
								<span class="btn btn-sm btn-success btn-add-more" style="margin-top: 5px;">Thêm thuộc tính</span>
							</div>
						</div>
						<div class="form-group">
							<label>Tiêu đề Video</label>
							<input type="text" name="lash_title_video" placeholder="Tiêu đề Video" class="form-control" value="{{(!empty($lash_title_video))?$lash_title_video->meta_value:FALSE}}">
						</div>
						<div class="form-group">
							<label>Link Video Youtube</label>
							<input type="text" name="lash_youtube" placeholder="Link Video Youtube" class="form-control" value="{{(!empty($lash_youtube))?$lash_youtube->meta_value:FALSE}}">
						</div>
						<div class="form-group">
							<label>Tiêu đề kết quả</label>
							<input type="text" name="lash_result_title" class="form-control" placeholder="Tiêu đề kết quả" value="{{(!empty($lash_result_title))?$lash_result_title->meta_value:FALSE}}">
						</div>
					</div>
				</div>
				
			</div>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
				<div class="form-group text-center">
					<button type="submit" class="btn btn-md btn-primary">Lưu</button>
				</div>
			</div>
		</div>
	</form>
</div>

@endsection
@section('script')

<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('.btn-add_logo').click(function(){
			CKFinder.popup( {
				chooseFiles: true,
				onInit: function( finder ) {
					finder.on( 'files:choose', function( evt ) {
						var file = evt.data.files.first();
						jQuery('#logo img').attr('src',file.getUrl());
						jQuery('input[name=logo]').val(file.getUrl());
						jQuery('#logo').addClass('active');
					} );
				}
			} );
		});

		jQuery('#logo').on('click','i',function(){
			if(confirm("Bạn muốn xóa ảnh này ?"))
			{
				jQuery('#logo').removeClass('active');
				jQuery('input[name=logo]').val('');

			}
		})

		CKEDITOR.replaceClass = "editor";

		jQuery('.add-banner').on('click',function(){
			var cur = jQuery(this).parent();
			CKFinder.popup( {
				chooseFiles: true,
				onInit: function( finder ) {
					finder.on( 'files:choose', function( evt ) {
						var file = evt.data.files.first();
						cur.find('.img img').attr('src',file.getUrl());
						cur.find('.img input').val(file.getUrl());
						cur.find('.img').addClass('active');
					} );
				}
			} );
		});

		jQuery('.btn-add-more').on('click',function(){
			jQuery('.attribute_lash').append(`
				<div class="form-group">
					<div class="item background_image">
						<label>Hình ảnh</label>
						<div class="image">
							<div class="img">
								<img src="">
								<input type="hidden" name="lash_image[]">
								<i class="fa fa-times"></i>
							</div>
							<span class="btn btn-sm btn-info btn-add-image">Chọn ảnh</span>
						</div>
					</div>
					<div class="item">
						<label>Tiêu đề</label>
						<input type="text" name="lash_attribute[]" class="form-control" placeholder="Tiêu đề">
					</div>
					<div class="remove">
						<i class="fa fa-times" title="Xóa thuộc tính"></i>
					</div>
				</div>
				`);
		})

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
				cur.next().next().val('');
			}
		});

		jQuery('.attribute_lash').on('click','.remove i',function(){
			if(confirm("Bạn muốn xóa thuộc tính này?"))
			{
				jQuery(this).parents('.form-group').first().remove();
			}
		});



	})
</script>

@endsection