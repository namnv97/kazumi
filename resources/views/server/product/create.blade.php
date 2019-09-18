@extends('layouts.server')
@section('title')
Thêm mới sản phẩm
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
	<h1>Thêm mới sản phẩm</h1>
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
		<form action="{{route('admin.products.create')}}" method="post" id="create_products">
			@csrf
			<div class="row">
				<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
					<div class="form-group">
						<label>Tên sản phẩm</label>
						<input type="text" name="name" class="form-control" placeholder="Tên sản phẩm" value="{{old('name')}}">
					</div>
					<div class="form-group">
						<label>Đường dẫn sản phẩm</label>
						<input type="text" name="slug" class="form-control" placeholder="Đường dẫn sản phẩm" value="{{old('slug')}}">
					</div>
					<div class="form-group">
						<label>Mô tả ngắn</label>
						<textarea name="description" rows="5" class="form-control" style="resize: none;">{{old('description')}}</textarea>
					</div>
					<div class="form-group">
						<label>Nội dung chi tiết</label>
						<textarea name="product_content" id="product_content" rows="5" style="resize: vertical;" class="form-control" placeholder="Mô tả cho danh mục">{{old('product_content')}}</textarea>
					</div>
					<div class="form-group">
						<h4>Sản phẩm đơn lẻ</h4>
						<div class="item_pack">
							<div class="pack">
								<div class="form-group">
									<label>Tên số lượng</label>
									<input type="text" name="pack_single" class="form-control" placeholder="1 sản phẩm">
								</div>
								<div class="form-group">
									<label>Giá</label>
									<input type="text" name="price_single" class="form-control">
								</div>
								<div class="form-group">
									<label>Giá sale</label>
									<input type="text" name="sale_single" class="form-control">
								</div>
							</div>
							<div class="color">
								<div class="form-group">
									<label>Màu</label>
									<select name="color_single[]" class="form-control select2" multiple>
										@if(!empty($colors))
										@foreach($colors as $color)
										<option value="{{$color->id}}">{{$color->name}}</option>
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
								<div class="form-group">
									<label>Tên số lượng</label>
									<input type="text" name="pack_multi" class="form-control" placeholder="2 sản phẩm">
								</div>
								<div class="form-group">
									<label>Giá</label>
									<input type="text" name="price_multi" class="form-control">
								</div>
								<div class="form-group">
									<label>Giá sale</label>
									<input type="text" name="sale_multi" class="form-control">
								</div>
							</div>
							<div class="color">
								<div class="form-group">
									<label>Color</label>
									<select name="color_multi[]" class="form-control select2" multiple>
										@if(!empty($colors))
										@foreach($colors as $color)
										<option value="{{$color->id}}">{{$color->name}}</option>
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
						<label>Danh mục</label>
						<select name="collection_id[]" class="form-control select2" multiple="multiple">
							@if(!empty($collections))
							@foreach($collections as $collection)
							<option value="{{$collection->id}}">{{$collection->name}}</option>
							@endforeach
							@endif
						</select>
					</div>
					<div class="form-group">
						<label>Thư viện ảnh</label>
						<div class="gallery">
							
						</div>
						<span class="choose_gallery btn btn-sm btn-success">Thêm ảnh</span>
					</div>
					<div class="form-group">
						<label>Thư viện video</label>
						<p class="text-right"><span class="more_video btn btn-sm btn-success">Thêm</span></p>
					</div>
					<div class="form-group">
						<label>Sản phẩm đi kèm</label>
						<select name="essential[]" class="form-control ess" multiple="multiple">
							@if(count($products) > 0)
							@foreach($products as $product)
							<option value="{{$product->id}}">{{$product->name}}</option>
							@endforeach
							@endif
						</select>
					</div>
					<div class="form-group text-center"><button class="btn btn-md btn-primary" type="submit">Lưu</button></div>
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

		jQuery('.select2').select2({
			placeholder: "Chọn danh mục"
		});
		jQuery('.ess').select2({
			placeholder: "Chọn sản phẩm đi kèm"
		});
	});
</script>
@endsection