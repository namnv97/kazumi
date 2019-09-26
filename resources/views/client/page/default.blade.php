@extends('layouts.client')
@section('title')
{{$page->name}}
@endsection
@section('css')
<style>
	h1
	{
		text-align: center;
		margin-bottom: 50px;
	}

	.page_content
	{
		width: 70%;
		margin: 0 auto;
	}

	@media (max-width: 991px)
	{
		.page_content
		{
			width: 100% !important;
		}

		h1
		{
			margin-bottom: 30px;
		}
	}
</style>
@endsection
@section('content')
<div class="rewards bg-grey">
	<div class="container">
		<h1>{{$page->name}}</h1>
		<div class="page_content">
			{!! $page_content->meta_value !!}
		</div>
	</div>
</div>
@endsection
@section('script')

@endsection