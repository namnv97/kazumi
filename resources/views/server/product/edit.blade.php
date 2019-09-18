@extends('layouts.server')
@section('title')
Cập nhật {{$product->name}}
@endsection
@section('css')
<style>
	.gallery .img
	{
		display: inline-block;
		width: 33%;
		padding: 5px;
		margin-bottom: 10px;
		float: left;
		position: relative;
	}

	.gallery .img i
	{
		position: absolute;
		top: 0;
		right: 0;
		display: inline-block;
		padding: 3px;
		background: #fff;
		color: #000;
		font-weight: bold;
		cursor: pointer;
		border-radius: 100%;
	}

	.gallery .img img
	{
		max-width: 100%;
	}

	.gallery::after
	{
		content: '';
		clear: both;
		display: table;
	}

	.item_pack
	{
		display: flex;
		align-items: flex-start;
		margin-bottom: 15px;
		padding-bottom: 15px;
		border-bottom: thin #555 solid;
	}

	.item_pack .pack
	{
		width: 60%;
		padding-right: 15px;
	}

	.item_pack .color
	{
		width: 40%;
	}

	.item_video
	{
		display: table;
		width: 100%;
		margin-bottom: 10px;
	}
	.item_video input
	{
		display: table-cell;
	}

	.item_video span
	{
		display: table-cell;
		width: 10%;
		cursor: pointer;
		text-align: center;
		background: #ce5252;
		color: #fff;
	}

</style>
@endsection
@section('content')
<div class="content_container">
	<h1>Cập nhật sản phẩm</h1>
	<hr>
	<div class="dashboard_home">
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
		<form action="{{route('admin.products.edit',['id' => $product->id])}}" method="post" id="create_products">
			@csrf
			<div class="row">
				<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
					<div class="form-group">
						<label>Tên sản phẩm</label>
						<input type="text" name="name" class="form-control" placeholder="Tên sản phẩm" value="{{old('name')?old('name'):$product->name}}">
					</div>
					<div class="form-group">
						<label>Đường dẫn sản phẩm</label>
						<input type="text" name="slug" class="form-control" placeholder="Đường dẫn sản phẩm" value="{{old('slug')?old('slug'):$product->slug}}">
					</div>
					<div class="form-group">
						<label>Mô tả</label>
						<textarea name="description" rows="10" style="resize: none;" class="form-control">{{old('description')?old('description'):$product->description}}</textarea>
					</div>
					<div class="form-group">
						<label>Nội dung chi tiết</label>
						<textarea name="product_content" id="product_content" rows="5" style="resize: none;" class="form-control" placeholder="Nội dung chi tiết">{{old('product_content')?old('product_content'):$product->product_content}}</textarea>
					</div>
					<div class="form-group">
						<h4>Sản phẩm đơn lẻ</h4>
						<div class="item_pack">
							<div class="pack">
								<input type="hidden" name="single_id" value="{{$pack_single->id}}">
								<div class="form-group">
									<label>Số lượng sản phẩm</label>
									<input type="text" name="pack_single" class="form-control" value="{{$pack_single->name}}" placeholder="1 sản phẩm">
								</div>
								<div class="form-group">
									<label>Giá</label>
									<input type="text" name="price_single" class="form-control" value="{{$pack_single->price}}">
								</div>
								<div class="form-group">
									<label>Giá sale</label>
									<input type="text" name="sale_single" class="form-control" value="{{$pack_single->sale}}">
								</div>
							</div>
							<div class="color">
								<div class="form-group">
									<label>Màu</label>
									@php
										$arrcol = [];
										if(count($pack_single->color()) > 0):
											foreach($pack_single->color() as $color):
												$arrcol[] = $color->id;
											endforeach;
										endif;
									@endphp

									<select name="color_single[]" class="form-control select2" multiple>
										@if(!empty($colors))
										@foreach($colors as $color)
										<option value="{{$color->id}}" {{(in_array($color->id,$arrcol))?'selected':FALSE}}>{{$color->name}}</option>
										@endforeach
										@endif
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<h4>Nhiều sản phẩm</h4>
						<div class="item_pack">
							<div class="pack">
								@if(!empty($pack_multi))
								<input type="hidden" name="multi_id" value="{{$pack_multi->id}}">
								@endif
								<div class="form-group">
									<label>Số lượng sản phẩm</label>
									<input type="text" name="pack_multi" class="form-control" value="{{(!empty($pack_multi))?$pack_multi->name:FALSE}}" placeholder="2 sản phẩm">
								</div>
								<div class="form-group">
									<label>Giá</label>
									<input type="text" name="price_multi" class="form-control" value="{{(!empty($pack_multi))?$pack_multi->price:FALSE}}">
								</div>
								<div class="form-group">
									<label>Giá sale</label>
									<input type="text" name="sale_multi" class="form-control" value="{{(!empty($pack_multi))?$pack_multi->sale:FALSE}}">
								</div>
							</div>
							<div class="color">
								<div class="form-group">
									<label>Màu</label>
									@php
										$arrcolm = [];
										if(!empty($pack_multi) && count($pack_multi->color()) > 0):
											foreach($pack_multi->color() as $color):
												$arrcolm[] = $color->id;
											endforeach;
										endif;
									@endphp

									<select name="color_multi[]" class="form-control select2" multiple>
										@if(!empty($colors))
										@foreach($colors as $color)
										<option value="{{$color->id}}" {{(!empty($pack_multi) && in_array($color->id,$arrcolm))?'selected':FALSE}}>{{$color->name}}</option>
										@endforeach
										@endif
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					<div class="form-group">
						@php
						$arr = [];
						if(!empty($collection)):
							foreach($collection as $col):
								$arr[] = $col->id;
							endforeach;
						endif
						@endphp
						<label>Danh mục</label>
						<select name="collection_id[]" class="form-control select2" multiple="multiple">
							@if(!empty($collections))
							@foreach($collections as $col)
							<option value="{{$col->id}}" {{(in_array($col->id,$arr))?'selected':'acd'}}>{{$col->name}}</option>
							@endforeach
							@endif
						</select>
					</div>
					<div class="form-group">
						<label>Thư viện ảnh</label>
						<div class="gallery">
							@if(!empty($gallery_image))
							@foreach($gallery_image as $img)
								<div class="img">
									<img src="{{asset($img->url)}}" alt="image">
									<input type="hidden" name="gallery[]" value="{{$img->url}}">
									<i class="fa fa-times"></i>
								</div>							
							@endforeach
							@endif
						</div>
						<span class="choose_gallery btn btn-sm btn-success">Add Gallery</span>
					</div>
					<div class="form-group">
						<label>Thư viện video</label>
						@if(!empty($gallery_video))
						@foreach($gallery_video as $video)
						<div class="item_video">
							<input type="text" name="gallery_video[]" class="form-control" placeholder="Link video youtube ..." value="{{$video->url}}">
							<span class="fa fa-times"></span>
						</div>
						@endforeach
						@endif
						<p class="text-right"><span class="more_video btn btn-sm btn-success">Thêm</span></p>
					</div>
					<div class="form-group">
						<label>Sản phẩm đi kèm</label>
						<select name="essential[]" class="form-control select2" multiple="multiple">
							@php
							$art = [];
							@endphp
							@if(count($essentials) > 0)
							@foreach($essentials as $ess)
							@php
							$art[] = $ess->essential_product_id
							@endphp
							@endforeach
							@endif
							@if(count($products) > 0)
							@foreach($products as $product)
							<option value="{{$product->id}}" {{(in_array($product->id,$art))?'selected':FALSE}}>{{$product->name}}</option>
							@endforeach
							@endif
						</select>
					</div>
					<div class="form-group text-center">
						<button class="btn btn-md btn-primary" type="submit">Lưu</button>
					</div>
				</div>
			</div>
			
			
		</form>		
	</div>
</div>

@endsection
@section('script')
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery( "#sale_date_start" ).datepicker({
			minDate: 0,
			dateFormat : 'dd/mm/yy',
			onClose: function( selectedDate ) {
				var date = jQuery(this).datepicker('getDate');
				jQuery( "#sale_date_end" ).datepicker( "option", "minDate", date );
			}
		});

		jQuery( "#sale_date_end" ).datepicker({
			dateFormat : 'dd/mm/yy',
			onClose: function( selectedDate ) {
				jQuery( "#sale_date_start" ).datepicker( "option", "maxDate", selectedDate );
			}
		});
		jQuery('body').on('click','.choose_gallery',function(){
				CKFinder.popup( {
					chooseFiles: true,
					onInit: function( finder ) {
						finder.on( 'files:choose', function( evt ) {
							var file = evt.data.files;
							file.forEach(function(e){
								var url = e.getUrl();
								jQuery('.gallery').append(`
								<div class="img">
									<img src="`+url+`" alt="image">
									<input type="hidden" name="gallery[]" value="`+url+`">
									<i class="fa fa-times"></i>
								</div>
								`)
							});
						} );
					}
				} );
		});

		jQuery('.gallery').on('click','.img i',function(){
			if(confirm('Are you sure ?'))
			{
				jQuery(this).parent().remove();
			}
		});

		jQuery('body').on('click','.more_video',function(){
			jQuery(this).parent().before('<div class="item_video"><input type="text" name="gallery_video[]" class="form-control" placeholder="Link video youtube ..."><span class="fa fa-times"></span></div>');
		});

		jQuery('body').on('click','.item_video span',function(){
			jQuery(this).parent().remove();
		})

		jQuery('input[name=quantity],input[name=price]').on('keypress',function(e){
			if(e.keyCode < 48 || e.keyCode > 57) return false;
		});
		CKEDITOR.replace('product_content');
	});
	jQuery(document).ready(function(){
		jQuery('input[name=name]').on('change',function(){
			var slug = jQuery('input[name=slug]').val();
			if(slug.length == 0)
			{
				var name = jQuery(this).val();
				slug =  ChangeToSlug(name);
				jQuery('input[name=slug]').val(slug);
			}
		});

		jQuery('.select2').select2();
	});
</script>
@endsection