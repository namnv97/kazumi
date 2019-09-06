@extends('layouts.client')
@section('title')
{{$article->title}}
@endsection
@section('css')

@endsection

@section('content')
<div class="blog-detail bg-grey">
	<div class="head-blog p-35 hidden-xs hidden-sm" id="myHeader">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-7 col-xs-12">
					<div class="ArticleToolbar__Left">
						<span class="Heading Text--subdued u-h8 hidden-tablet">Đang xem:</span>
						<span class="ArticleToolbar__ArticleTitle Heading u-h7">{{$article->title}}</span>
					</div>
				</div>
				<div class="col-md-3 col-xs-6">
					<div class="ArticleToolbar__ShareList">
						<span class="ArticleToolbar__ShareLabel Heading Text--subdued u-h8">Share</span>
						<div class="HorizontalList">
							<a class="HorizontalList__Item Text--subdued Link" href="https://www.facebook.com/sharer.php?u={{route('client.articles.single',['slug' => $article->slug])}}" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
							<a class="HorizontalList__Item Text--subdued Link" href="https://twitter.com/intent/tweet?url={{route('client.articles.single',['slug' => $article->slug])}}&text={{$article->title}}&via={{route('home')}}&hashtags={{$article->title}}" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
							<a class="HorizontalList__Item Text--subdued Link" href="https://www.linkedin.com/shareArticle?url={{route('client.articles.single',['slug' => $article->slug])}}&title={{$article->title}}" target="_blank"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
						</div>
					</div>
				</div>
				<div class="col-md-2 col-xs-6">
					<div class="ArticleToolbar__Nav">
						@if(isset($relates[0]) && !empty($relates[0]))
						<a href="{{route('client.articles.single',['slug' => $relates[0]['slug']])}}"><i class="fa fa-angle-left" aria-hidden="true"></i> Trước</a>
						@endif
						@if(isset($relates[1]) && !empty($relates[1]))
						<span>|</span>
						<a href="{{route('client.articles.single',['slug' => $relates[1]['slug']])}}">Sau <i class="fa fa-angle-right" aria-hidden="true"></i></a>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="bn-blog" style="background-image: url('{{asset($article->thumbnail)}}')">
	</div>
	<div class="blog-detail-content">
		<div class="container">
			<div class="blog-box-content bg-grey">
				<div class="blog-detail-title">
					<span class="Article__MetaItem">{{\Carbon\Carbon::parse($article->created_at)->format('M, d Y')}}</span>
					<h1 class="title-large">{{$article->title}}</h1>
				</div>
				<div class="blog-detail-body">
					{!! $article->article_content !!}
				</div>
				<div class="blog-detail-ft">
					<span class="Article__Author Heading Text--subdued u-h6">Written by {{$article->user()->name}}</span>
					<div class="Article__ShareButtons ShareButtons">
						<a class="HorizontalList__Item Text--subdued Link" href="https://www.facebook.com/sharer.php?u={{route('client.articles.single',['slug' => $article->slug])}}" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
						<a class="HorizontalList__Item Text--subdued Link" href="https://twitter.com/intent/tweet?url={{route('client.articles.single',['slug' => $article->slug])}}&text={{$article->title}}&via={{route('home')}}&hashtags={{$article->title}}" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
						<a class="HorizontalList__Item Text--subdued Link" href="https://www.linkedin.com/shareArticle?url={{route('client.articles.single',['slug' => $article->slug])}}&title={{$article->title}}" target="_blank"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="news-later">
		<div class="container">
			<div class="row">
				@if(!empty($relates))
				@foreach($relates as $relate)
				<div class="col-md-6 col-sm-6 col-xs-12">
					<div class="news-item">
						<div class="news-item-img">
							<a href="{{route('client.articles.single',['slug' => $relate['slug']])}}"><img src="{{asset($relate['thumbnail'])}}" alt="{{$relate['title']}}"></a>
						</div>
						<div class="news-item-info">
							<h2><a href="{{route('client.articles.single',['slug' => $relate['slug']])}}">{{$relate['title']}}</a></h2>
						</div>
					</div>
				</div>
				@endforeach
				@endif
			</div>
		</div>
	</div>
</div>
@endsection
@section('script')
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v4.0&appId=381461119271778&autoLogAppEvents=1"></script>
@endsection