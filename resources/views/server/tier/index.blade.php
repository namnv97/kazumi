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
	<a href="{{route('admin.tier.create')}}" class="btn btn-md btn-primary">Thêm mới</a>
	@if(session('msg_del'))
	<div class="alert alert-success">
		<p>{{session('msg_del')}}</p>
	</div>
	@endif
	@if(session('msg_add'))
	<div class="alert alert-success">
		<p>{{session('msg_add')}}</p>
	</div>
	@endif
	@if(session('msg'))
	<div class="alert alert-success">
		<p>{{session('msg')}}</p>
	</div>
	@endif
	<table class="table">
		<thead>
			<tr>
				<th>STT</th>
				<th>Tên</th>
				<th>Tiêu đề</th>
				
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@if(!empty($tiers))
			@foreach($tiers as $key => $value)
			<tr>
				<td>{{($tiers->currentPage() - 1) * $tiers->perPage() + $key + 1}}</td>
				<td>{{$value->name}}</td>
				<td>
					{{$value->title}}
				</td>
				
				<td>
					<a href="{{route('admin.tier.edit',['id' => $value->id])}}" class="btn btn-sm btn-warning">
						<i class="fa fa-edit"></i> Sửa
					</a>
				</td>
				<td>
					<span class="btn btn-sm btn-danger trash"><i class="fa fa-trash"></i> Xóa</span>
					<form action="{{route('admin.tier.delete',['id' => $value->id])}}" method="post">
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
				<td colspan="5">{{$tiers->links()}}</td>
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