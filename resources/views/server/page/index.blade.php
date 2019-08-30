@extends('layouts.server')
@section('title')
Tất cả trang
@endsection
@section('css')

@endsection
@section('content')
<div class="page-pages">
	<h1>Tất cả trang</h1>
	<a href="{{route('admin.pages.create')}}" class="btn btn-md btn-primary">Thêm mới</a>
	<table class="table">
		<thead>
			<tr>
				<th>STT</th>
				<th>Tiêu đề</th>
				<th>Layout</th>
				<th></th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@if(!empty($pages))
			@foreach($pages as $key => $page)
			<tr>
				<td>{{($pages->currentPage() - 1)*$pages->perPage() + $key + 1}}</td>
				<td>{{$page->name}}</td>
				<td>{{$page->layout}}</td>
				<td>
					<a href="{{route('client.page.index',['slug' => $page->slug])}}" class="btn btn-sm btn-info" title="Xem trang" target="_blank"><i class="fa fa-eye"></i> Xem</a>
				</td>
				<td>
					<a href="{{route('admin.pages.edit',['id' => $page->id])}}" title="Sửa trang" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Sửa</a>
				</td>
				<td>
					<span class="btn btn-sm btn-danger btn-remove" title="Xóa trang"><i class="fa fa-trash"></i> Xóa</span>
				</td>
			</tr>
			@endforeach
			@endif
		</tbody>
		<tfoot>
			<tr>
				<td colspan="6">{{$pages->links()}}</td>
			</tr>
		</tfoot>
	</table>
</div>
@endsection
@section('script')

@endsection