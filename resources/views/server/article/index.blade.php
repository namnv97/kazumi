@extends('layouts.server')
@section('title')
Tất cả bài viết
@endsection
@section('css')
<style>
	table thead tr th
	{
		word-wrap: wrap;
	}

	.page-articles .form-search
	{
		margin: 10px 0;
	}

	.page-articles .form-search form
	{
		width: 40%;
		padding-right: 50px;
		position: relative;
	}

	.page-articles .form-search form input
	{
		width: calc(100%-50px);
		margin-bottom: 0;
		outline: none;
	}

	.page-articles .form-search form input:focus
	{
		outline: none;
		border-color: #ccc;
	}

	.page-articles .form-search form button
	{
		position: absolute;
		width: 50px;
		top: 0;
		right: 0;
		bottom: 0;
		outline: none;
	}
</style>
@endsection
@section('content')
<div class="page-articles">
	<h1>Tất cả bài viết</h1>
	<a href="{{route('admin.articles.create')}}" class="btn btn-md btn-primary">Thêm mới</a>
	<div class="form-search">
		<form action="{{route('admin.articles.index')}}" method="get">
			<input type="text" name="q" class="form-control" placeholder="Tiêu đề bài viết" value="{{request()->q}}">
			<button type="submit"><i class="fa fa-search"></i></button>
		</form>
	</div>
	<table class="table">
		<thead>
			<tr>
				<th>STT</th>
				<th>Tên bài viết</th>
				<th>Mô tả</th>
				<th></th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@if(count($articles) > 0)
			@foreach($articles as $key => $article)
			<tr>
				<td>{{($articles->currentPage() - 1) * $articles->perPage() + $key + 1}}</td>
				<td>{{$article->title}}</td>
				<td>
					<div class="article_excerpt">{{$article->description}}</div>
				</td>
				<td>
					<a href="{{route('client.articles.single',['slug'=>$article->slug])}}" class="btn btn-sm btn-info" title="Xem bài viết" target="_blank"><i class="fa fa-eye"></i> Xem</a>
				</td>
				<td>
					<a href="{{route('admin.articles.edit',['id' => $article->id])}}" class="btn btn-sm btn-warning" title="Sửa bài viết"><i class="fa fa-edit"></i> Sửa</a>
				</td>
				<td>
					<a href="{{route('admin.articles.delete',['id' => $article->id])}}" class="btn btn-sm btn-danger" title="Xóa bài viết"><i class="fa fa-trash"></i> Xóa</a>
				</td>
			</tr>
			@endforeach
			@endif
		</tbody>
		<tfoot>
			<tr>
				<td colspan="6">{{$articles->links()}}</td>
			</tr>
		</tfoot>
	</table>
</div>
@endsection
@section('script')
<script type="text/javascript">
	jQuery(document).ready(function(){
		sc('article_excerpt',3);
	})
</script>
@endsection