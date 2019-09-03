@extends('layouts.server')
@section('title')
Thiết lập Mega Menu
@endsection
@section('css')
<style>
	p.errors
	{
		color: red;
		padding-left: 10px;
	}
</style>
@endsection
@section('content')
<div class="page-mega-menu">
	<h1>Thiết lập Mega Menu</h1>
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
	<form action="{{route('admin.options.megamenu')}}" method="post">
		@csrf
		<div class="row">
			@if(count($mega_menu) > 0)
			@foreach($mega_menu as $key => $menu)
			@php
			$item = json_decode($menu->meta_value,true);
			@endphp
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<h3>Nội dung {{$key+1}}</h3>
				<div class="form-group">
					<label>Tiêu đề</label>
					<input type="text" name="mega_title[]" class="form-control" placeholder="Tiêu đề" value="{{$item['title']}}">
				</div>
				<div class="form-group">
					<label>Link</label>
					<input type="text" name="mega_link[]" class="form-control" placeholder="Link chi tiết" value="{{$item['link']}}">
				</div>
				<div class="form-group">
					<label>Nội dung</label>
					<textarea name="mega_content[]" rows="10" style="resize: horizontal;" class="form-control editor" placeholder="Nội dung">{!! $item['content'] !!}</textarea>
				</div>
			</div>
			@endforeach
			@else
			@for($i = 1; $i <= 3;$i ++)
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<h3>Nội dung {{$i}}</h3>
				<div class="form-group">
					<label>Tiêu đề</label>
					<input type="text" name="mega_title[]" class="form-control" placeholder="Tiêu đề">
				</div>
				<div class="form-group">
					<label>Link</label>
					<input type="text" name="mega_link[]" class="form-control" placeholder="Link chi tiết">
				</div>
				<div class="form-group">
					<label>Nội dung</label>
					<textarea name="mega_content[]" rows="10" style="resize: horizontal;" class="form-control editor" placeholder="Nội dung"></textarea>
				</div>
			</div>
			@endfor
			@endif
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<h3>Sản phẩm</h3>
				@if(count($mega_product) > 0)
				@foreach($mega_product as $product)
				@php
				$product = json_decode($product->meta_value,true);
				@endphp
				<div class="form-group">
					<label>Chọn sản phẩm</label>
					<select name="mega_product[]" class="form-control select2">
						@if(count($products) > 0)
						@foreach($products as $pro)
						<option value="{{$pro->id}}" {{($product['id'] == $pro->id)?'selected':FALSE}}>{{$pro->name}}</option>
						@endforeach
						@endif
					</select>
				</div>
				<div class="form-group">
					<label>Tiêu đề</label>
					<input type="text" name="mega_product_title[]" class="form-control" value="{{$product['title']}}">
				</div>
				<div class="form-group">
					<label>Ghi chú</label>
					<input type="text" name="mega_product_note[]" class="form-control" value="{{$product['note']}}">
				</div>
				@endforeach
				@else
				@for($i = 0; $i < 2; $i ++)
				<div class="form-group">
					<label>Chọn sản phẩm</label>
					<select name="mega_product[]" class="form-control select2">
						@if(count($products) > 0)
						@foreach($products as $pro)
						<option value="{{$pro->id}}">{{$pro->name}}</option>
						@endforeach
						@endif
					</select>
				</div>
				<div class="form-group">
					<label>Tiêu đề</label>
					<input type="text" name="mega_product_title[]" class="form-control">
				</div>
				<div class="form-group">
					<label>Ghi chú</label>
					<input type="text" name="mega_product_note[]" class="form-control">
				</div>
				@endfor
				@endif
			</div>
		</div>
		<div class="text-center">
			<button class="btn btn-md btn-primary" type="submit">Lưu</button>
		</div>
	</form>
</div>
@endsection
@section('script')
<script type="text/javascript">
	jQuery(document).ready(function(){
		CKEDITOR.replaceClass = 'editor';
		jQuery('.select2').select2({
			placeholder:"Chọn sản phẩm"
		})

		jQuery('form').on('submit',function(){
			jQuery('form p.errors').remove();
			var i = 0;
			jQuery('form').find('input').each(function(){
				var val = jQuery(this).val();
				if(val.length == 0)
				{
					jQuery(this).after('<p class="errors">Nội dung này không được để trống</p>');
					i ++;
				}
			})

			jQuery('form').find('select').each(function(){
				var val = jQuery(this).val();
				if(val == null)
				{
					jQuery(this).after('<p class="errors">Nội dung này không được để trống</p>');
					i ++;
				}
			})


			if(i > 0)
			{
				alert("Vui lòng kiểm tra lại các thông tin");
				return false;
			}

		});


	});
</script>
@endsection