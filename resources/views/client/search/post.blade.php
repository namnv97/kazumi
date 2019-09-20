@extends('layouts.client')
@section('title')
Kết quả tìm kiếm cho {{request()->s}}
@endsection
@section('css')
<style>
	.page-search
	{
		padding-top: 80px;
		background: #ddd;
	}
	.page-search .count_result
	{
		display: inline-block;
		padding: 10px;
		font-size: 18px;
		font-weight: bold;
		color: #b56a28;
	}
</style>
@endsection
@section('content')
<div class="page-search">
	<div class="container">
		<h1>Kết quả tìm kiếm: {{request()->s}}</h1>
		@if(count($articles) > 0 || count($pages) > 0)
		<span class="count_result">Có {{count($articles) + count($pages)}} kết quả cho "{{request()->s}}"</span>
		<div class="row">
			@if(count($articles) > 0)
			@foreach($articles as $article)
			<div class="col-md-4 col-sm-6 col-xs-12">
				<div class="news-item">
					<div class="news-item-img">
						<a href="{{route('client.articles.single',['slug' => $article->slug])}}">
							<img src="{{($article->thumbnail)?$article->thumbnail:$logo}}" alt="{{$article->title}}">
						</a>
					</div>
					<div class="news-item-info">
						<h2>
							<a href="{{route('client.articles.single',['slug' => $article->slug])}}">{{$article->title}}</a>
						</h2>
						<p>{{$article->description}}</p>
						<a href="{{route('client.articles.single',['slug' => $article->slug])}}">Xem thêm</a>
					</div>
				</div>
			</div>
			@endforeach
			@endif
			@if(count($pages) > 0)
			@foreach($pages as $page)
			<div class="col-md-4 col-sm-6 col-xs-12">
				<div class="news-item">
					<div class="news-item-img">
						<a href="{{route('client.page.index',['slug' => $page->slug])}}">
							<img src="{{$logo}}" alt="{{$page->name}}">
						</a>
					</div>
					<div class="news-item-info">
						<h2>
							<a href="{{route('client.page.index',['slug' => $page->slug])}}">{{$page->name}}</a>
						</h2>
						<a href="{{route('client.page.index',['slug' => $page->slug])}}">Xem thêm</a>
					</div>
				</div>
			</div>
			@endforeach
			@endif			
		</div>
		@else
		<div class="alert alert-warning">
			<p>Không có kết quả nào phù hợp. Vui lòng thử lại</p>
		</div>
		@endif
	</div>
</div>
@endsection
@section('script')

@endsection