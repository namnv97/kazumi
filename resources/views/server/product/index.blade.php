@extends('layouts.server')
@section('title')
Sản phẩm
@endsection
@section('css')
<style>
	.admin-product__description
	{
		overflow: hidden;
		text-overflow: ellipsis;
		-webkit-box-orient: vertical;
		display: -webkit-box;
		-webkit-line-clamp: 3;
	}
	.page-products table thead th
	{
		white-space: nowrap;
	}

	.page-products table tbody tr td:nth-child(2)
	{
		min-width: 150px;
	}
</style>
@endsection

@section('content')

<div class="page-products">
	<h1>Sản phẩm</h1>
	<a href="{{route('admin.products.create')}}" class="btn btn-md btn-primary">Thêm mới</a>
	@if(session('msg_del'))
	<div class="alert alert-warning">
		<i class="fa fa-times"></i>
		<p>{{session('msg_del')}}</p>
	</div>
	@endif
	@if(session('msg_add'))
	<div class="alert alert-success">
		<i class="fa fa-times"></i>
		<p>{{session('msg_add')}}</p>
	</div>
	@endif
	@if(session('msg'))
	<div class="alert alert-success">
		<i class="fa fa-times"></i>
		<p>{{session('msg')}}</p>
	</div>
	@endif
	<table class="table">
		<thead>
			<tr>
				<th>STT</th>
				<th>Tên sản phẩm</th>
				<th>Mô tả</th>
				<th></th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@if(!empty($products))
			@foreach($products as $key => $product)
			<tr>
				<td>{{($products->currentPage() - 1) * $products->perPage() + $key + 1}}</td>
				<td>{{$product->name}}</td>
				<td>
					<div class="admin-product__description">
						{!! $product->description !!}
					</div>
				</td>
				<td>
					<a href="{{route('client.product.index',['slug' => $product->slug])}}" class="btn btn-sm btn-primary" target="_blank"><i class="fa fa-eye"></i> Xem</a>
				</td>
				<td>
					<a href="{{route('admin.products.edit',['id' => $product->id])}}" class="btn btn-sm btn-warning">
						<i class="fa fa-edit"></i> Sửa
					</a>
				</td>
				<td>
					<span class="btn btn-sm btn-danger trash"><i class="fa fa-trash"></i> Xóa</span>
					<form action="{{route('admin.products.delete',['id' => $product->id])}}" method="post">
						@method('DELETE')
						@csrf
					</form>
				</td>
			</tr>
			@endforeach
			@endif
		</tbody>
		<tfoot>
			<tr>
				<td colspan="5">{{$products->links()}}</td>
			</tr>
		</tfoot>
	</table>
</div>

@endsection

@section('script')
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('.page-products table tbody tr td span.trash').on('click',function(){
			if(confirm("Are you sure ?"))
			{
				jQuery(this).next().submit();
			}
		});
	});
</script>
@endsection