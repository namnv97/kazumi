@extends('layouts.client')
@section('title')
{{$page->name}}
@endsection
@section('css')

@endsection

@section('content')

<div class="press bg-grey">
	<div class="bn-shop" style="background-image: url('{{$banner->meta_value}}')">
		<div class="bn-shop-content">
			<div class="content">
				<h1 class="title-large">{{$page_title->meta_value}}</h1>
				<p>{{$page_description->meta_value}}</p>
			</div>
		</div>
	</div>
	<div class="press-logo">
		<div class="container">
			<div class="row">
				@if(count($partner) > 0)
				@foreach($partner as $item)
				<div class="col-md-2 col-xs-6 col-sm-2">
					<div class="press-logo-item">
						<img src="{{asset($item->meta_value)}}" alt="{{$item->meta_value}}">
					</div>
				</div>
				@endforeach
				@endif
			</div>
		</div>
	</div>
	<div class="press-content">
		<div class="container">
			<h2 class="title-large">{{$as_title->meta_value}}</h2>
			<div class="row">
				@if(count($as_user) > 0)
				@foreach($as_user as $user)
				@php
				$item = json_decode($user->meta_value,true);
				@endphp
				<div class="col-md-3 col-xs-12 col-sm-6">
					<div class="press-item">
						<div class="press-item-img">
							<img src="{{asset($item['image'])}}" alt="{{$item['image']}}">
						</div>
						<div class="press-item-info">
							{!! $item['text'] !!}
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

@endsection