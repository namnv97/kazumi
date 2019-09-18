@extends('layouts.server')
@section('title')
Danh sách điểm
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
	<h1>Danh sách điểm</h1>
	<a href="{{route('admin.earn_point.create')}}" class="btn btn-md btn-primary">Thêm mới</a>
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
				
				<th>Tiêu đề</th>
				<th>Số điểm</th>
				<th>Số tiền</th>
				<th>Đơn vị</th>
				<th>Ảnh</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@if(!empty($earn_point))
			@foreach($earn_point as $key => $value)
			<tr>
				<td>{{($earn_point->currentPage() - 1) * $earn_point->perPage() + $key + 1}}</td>
				<td>{{$value->title}}</td>
				<td>
					{{$value->point}}
				</td>
				<th>{{number_format($value->price)}}</th>
				<td>{{$value->unit}}</td>
				<td>
					@if(isset($value->image))
						<div class="gallery" >
							<img src="{{$value->image}}" style="width: 20%;" />
						</div>
					@endif
				</td>
				<td>
					<a href="{{route('admin.earn_point.edit',['id' => $value->id])}}" class="btn btn-sm btn-warning">
						<i class="fa fa-edit"></i> Sửa
					</a>
				</td>
				<td>
					<span class="btn btn-sm btn-danger trash"><i class="fa fa-trash"></i> Xóa</span>
					<form action="{{route('admin.earn_point.delete',['id' => $value->id])}}" method="post">
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
				<td colspan="5">{{$earn_point->links()}}</td>
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