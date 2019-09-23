@extends('layouts.client')
@section('title')
{{$page->name}}
@endsection
@section('css')

@endsection

@section('content')

<div class="lash-home" style="background-image: url('{{asset($background->meta_value)}}')">
	<div class="lash-home-conten" style="background-image: url('{{asset('/assets/client/img/lashguide16362019.webp')}}')">
		<div class="container">
			<h1>{{$page->name}}</h1>
			<h2>{{$sub_title->meta_value}}</h2>
			<p>{{$description->meta_value}}</p>
			<a href="#">FIND MY LASHES</a>
		</div>

	</div>

</div>

@endsection

@section('script')

@endsection