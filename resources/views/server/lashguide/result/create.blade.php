@extends('layouts.server')
@section('title')
Thêm gợi ý
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
</style>
@endsection
@section('content')
<div class="page-result">
	<h1>Thêm kết quả gợi ý</h1>
	@if(session('unique'))
	<div class="alert alert-warning">
		<i class="fa fa-times"></i>
		<p>{{session('unique')}}</p>
	</div>
	@endif
	<form action="{{route('admin.lashguide.result.create')}}" method="post" id="create">
		@csrf
		<div class="row">
			<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 result_list_item">
				@if(count($steps) > 0)
				@foreach($steps as $step)
				@php
				$key = old($step->slug)?old($step->slug):'';
				@endphp
				<div class="item_result">
					<label>{{$step->name}}</label>
					<select name="{{$step->slug}}" class="form-control">
						<option value="">Chọn mẫu</option>
						@if(count($step->stepitem()) > 0)
						@foreach($step->stepitem() as $item)
						<option value="{{$item->id}}" {{(!empty($key) && $key == $item->id)?'selected':FALSE}}>{{$item->title}}</option>
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
					<select name="product[]" id="result_product" class="form-control" multiple="multiple">
						@if(count($products) > 0)
						@foreach($products as $product)
						<option value="{{$product->id}}" {{(!empty(old('product')) && in_array($product->id,old('product')))?'selected':FALSE}}>{{$product->name}}</option>
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
		jQuery('form#create').on('submit',function(){

		});
	});
</script>
@endsection