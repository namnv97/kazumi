@extends('layouts.server')
@section('title')
Đại lý bán lẻ
@endsection
@section('css')

@endsection
@section('content')
<div class="page-retailers">
	<h1>Đại lý bán lẻ</h1>
	<a href="{{route('admin.retailers.create')}}" class="btn btn-sm btn-primary btn-create">Thêm mới</a>
	<table class="table">
		<thead>
			<tr>
				<th>STT</th>
				<th>Tên đại lý</th>
				<th>Người đăng ký</th>
				<th>Email</th>
				<th>Địa chỉ</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@if(count($retailers) > 0)
			@foreach($retailers as $key => $retailer)
			<tr>
				<td>{{($retailers->currentPage() - 1) * $retailers->perPage() + $key + 1}}</td>
				<td>{{$retailer->name}}</td>
				<td>{{$retailer->fullname}}</td>
				<td>{{$retailer->email}}</td>
				<td>{{$retailer->address}}</td>
				<td>
					<a class="btn btn-sm btn-info" href="{{route('admin.retailers.edit',['id' => $retailer->id])}}">
						<i class="fa fa-edit"></i> Sửa
					</a>
				</td>
				<td>
					<span class="btn btn-sm btn-danger btn-delete" data-value="{{$retailer->id}}">
						<i class="fa fa-trash"></i> Xóa
					</span>
				</td>
			</tr>
			@endforeach
			@endif
		</tbody>
		<tfoot>
			<tr>
				<td colspan="7" class="text-center">{{$retailers->links()}}</td>
			</tr>
		</tfoot>
	</table>
</div>
@endsection
@section('script')

@endsection