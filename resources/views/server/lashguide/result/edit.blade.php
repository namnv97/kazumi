@extends('layouts.server')
@section('title')
Cập nhật kết quả gợi ý
@endsection
@section('css')
<style>
	.result_list_item .item_result
	{
		float: left;
		width: 50%;
		padding: 5px 15px;
		margin-bottom: 15px;
	}

	.result_list_item .item_result:nth-child(2n+1)
	{
		clear: both;
	}

	.errors
	{
		color: red;
		padding-left: 10px;
	}

</style>
@endsection
@section('content')
<div class="page-result">
	<h1>Cập nhật kết quả gợi ý</h1>
	<a href="{{route('admin.lashguide.result.create')}}" class="btn btn-md btn-primary">Thêm kết quả</a>
	@if(session('unique'))
	<div class="alert alert-warning">
		<i class="fa fa-times"></i>
		<p>{{session('unique')}}</p>
	</div>
	@endif
	@if(session('msg'))
	<div class="alert alert-success">
		<i class="fa fa-times"></i>
		<p>{{session('msg')}}</p>
	</div>
	@endif
	<form action="{{route('admin.lashguide.result.edit',['id' => $result->id])}}" method="post" id="edit">
		@csrf
		<div class="row">
			<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 result_list_item">
				@if(count($steps) > 0)
				@foreach($steps as $step)
				@php
				$key = old($step->slug)?old($step->slug):'';
				$lk = json_decode($result->result_value,true);
				@endphp
				<div class="item_result">
					<label>{{$step->name}}</label>
					<select name="{{$step->slug}}" class="form-control" data-title="{{$step->name}}">
						<option value="">Chọn mẫu</option>
						@if(count($step->stepitem()) > 0)
						@foreach($step->stepitem() as $item)
						<option value="{{$item->id}}" {{(!empty($key) && $key == $item->id)?'selected':(($lk[$step->slug] == $item->id)?'selected':FALSE)}}>{{$item->title}}</option>
						@endforeach
						@endif
					</select>
				</div>
				@endforeach
				@endif
			</div>
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<div class="form-group">
					<label>Sản phẩm gợi ý</label>
					<select name="product[]" id="result_product" class="form-control" multiple="multiple" data-title="Sản phẩm gợi ý">
						@if(count($products) > 0)
						@foreach($products as $product)
						<option value="{{$product->id}}" {{(!empty(old('product')) && in_array($product->id,old('product')))?'selected':(in_array($product->id,$result_product)?'selected':FALSE)}}>{{$product->name}}</option>
						@endforeach
						@endif
					</select>
				</div>
				<div class="text-center">
					<button class="btn btn-md btn-primary" type="submit">Thêm</button>
				</div>
			</div>
		</div>
	</form>
</div>
@endsection
@section('script')
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('form#edit').on('submit',function(){
			jQuery('form#edit .errors').remove();
			var err = 0;
			jQuery('form#edit select').each(function(){
				var val = jQuery(this).val();
				console.log(val);
				if(val == null || val.length == 0)
				{
					var title = jQuery(this).data('title');
					jQuery(this).after('<p class="errors">'+title+' không được để trống</p>');
					err ++;
				}
			});
			if(err > 0) return false;
		});

		jQuery('#result_product').select2();
	});
</script>
@endsection