@extends('layouts.client')
@section('title')
{{$page->name}}
@endsection
@section('css')

@endsection

@section('content')
<div class="apply-care bg-grey">
	<div class="bn-learn" style="background-image: url('{{asset($banner->meta_value)}}')">
		<div class="bn-learn-content">
			<h1 class="title-large">{{$page_title->meta_value}}</h1>
			<p>{{$description->meta_value}}</p>
		</div>
	</div>
	<div class="apply-care-content">
		<div class="container">
			<ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#apply">Áp dụng</a></li>
				<li><a data-toggle="tab" href="#remove">Xóa bỏ</a></li>
				<li><a data-toggle="tab" href="#care">Chăm sóc</a></li>
			</ul>

			<div class="tab-content">
				<div id="apply" class="tab-pane fade in active">
					@if(!empty($apply_video))
					@php
						$video = $apply_video->meta_value;
						preg_match('/\?v=(.*)/i',$video,$result);
					@endphp
					@if(isset($result[1]))
						<iframe width="100%" height="500" src="https://www.youtube.com/embed/{{$result[1]}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					@endif
					@endif
					<div class="step-care">
						@if(count($apply) > 0)
						@foreach($apply as $app)
						@php
						$item = json_decode($app->meta_value,true)
						@endphp
						<div class="row">
							<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
								<div class="step-img">
									<img src="{{asset($item['image'])}}" alt="Chăm sóc">
								</div>
							</div>
							<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
								<div class="step-content">
									{!! $item['content'] !!}
								</div>
							</div>
						</div>
						@endforeach
						@endif
					</div>

				</div>
				<div id="remove" class="tab-pane fade">
					<div class="step-care">
						@if(count($remove) > 0)
						@foreach($remove as $app)
						@php
						$item = json_decode($app->meta_value,true)
						@endphp
						<div class="row">
							<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
								<div class="step-img">
									<img src="{{asset($item['image'])}}" alt="Chăm sóc">
								</div>
							</div>
							<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
								<div class="step-content">
									{!! $item['content'] !!}
								</div>
							</div>
						</div>
						@endforeach
						@endif
					</div>
				</div>
				<div id="care" class="tab-pane fade">
					<div class="step-care">
						@if(count($care) > 0)
						@foreach($care as $app)
						@php
						$item = json_decode($app->meta_value,true)
						@endphp
						<div class="row">
							<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
								<div class="step-img">
									<img src="{{asset($item['image'])}}" alt="Chăm sóc">
								</div>
							</div>
							<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
								<div class="step-content">
									{!! $item['content'] !!}
								</div>
							</div>
						</div>
						@endforeach
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('script')

@endsection