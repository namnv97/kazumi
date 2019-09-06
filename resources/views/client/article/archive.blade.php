@extends('layouts.client')
@section('title')
Tin tức
@endsection
@section('css')
<style>
	.pagenavi-blog .pagination
	{
		padding-bottom: 15px;
		border-bottom: 1px #ccc solid;
	}
	.pagenavi-blog .pagination li span,
	.pagenavi-blog .pagination li a
	{
		background: transparent !important;
		border: none;
		color: #000 !important;
		padding: 0 28px;
		font-size: 16px;
		opacity: 0.5;
		float: unset;
	}

	.pagenavi-blog .pagination li.active span
	{
		opacity: 1 !important;
	}

	.pagenavi-blog .pagination li:not(.active):hover span,
	.pagenavi-blog .pagination li:not(.active):hover a
	{
		opacity: 1;
	}

	.pagenavi-blog .pagination li:not(.active):not(.disabled) span
	{
		cursor: pointer;
	}
</style>
@endsection
@section('content')
<div class="blog contact bg-grey">
		<div class="container">
			<div class="title-home">
				<h1 class="title-large">TIN TỨC</h1>
			</div>
			@if(count($articles) > 0)
			<div class="blog-content">
				<div class="row">
					@foreach($articles as $article)
					<div class="col-md-4 col-sm-6 col-xs-12">
						<div class="news-item wow fadeInUp">
							<div class="news-item-img">
								<a href="{{route('client.articles.single',['slug' => $article->slug])}}"><img src="{{asset($article->thumbnail)}}" alt="{{$article->title}}"></a>
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
				</div>
			</div>
			<div class="pagenavi-blog">
				{{$articles->links('client.paginate.paginate')}}
			</div>
			@else
			<div class="blog-content">
				<div class="alert alert-warning">
					<p>Bài viết đang cập nhật ....</p>
				</div>
			</div>
			@endif
		</div>
		
	</div>
@endsection
@section('script')
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('')
	})
</script>
@endsection