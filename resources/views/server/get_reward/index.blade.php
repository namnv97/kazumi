@extends('layouts.server')
@section('title')
Danh sách bậc thưởng
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
	<h1>Danh sách bậc thưởng</h1>
	<a href="{{route('admin.get_reward.create')}}" class="btn btn-md btn-primary">Thêm mới</a>
	@if(session('msg_del'))
	<div class="alert alert-success">
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
				<th>Tên</th>
				<th>Hình ảnh</th>
				<th>Điểm yêu cầu</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@if(!empty($get_reward))
			@foreach($get_reward as $key => $value)
			<tr>
				<td>{{($get_reward->currentPage() - 1) * $get_reward->perPage() + $key + 1}}</td>
				<td>{{$value->name}}</td>
				<td>
					<img src="{{asset($value->image)}}" alt="{{$value->name}}" style="width: 50px;">
				</td>
				<td>{{$value->point}}</td>
				<td>
					<a href="{{route('admin.get_reward.edit',['id' => $value->id])}}" class="btn btn-sm btn-warning">
						<i class="fa fa-edit"></i> Sửa
					</a>
				</td>
				<td>
					<span class="btn btn-sm btn-danger trash"><i class="fa fa-trash"></i> Xóa</span>
					<form action="{{route('admin.get_reward.delete',['id' => $value->id])}}" method="post">
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
				<td colspan="5">{{$get_reward->links()}}</td>
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