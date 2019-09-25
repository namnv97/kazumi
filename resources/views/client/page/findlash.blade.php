@extends('layouts.client')
@section('title')
Tìm mẫu mi
@endsection
@section('css')

@endsection
@section('content')
<div class="lash-home lash-detail" >
		<div class="container-learn">
			<div class="title-lash">
				<h4><a href="#">THE KAZUMI QUIZ</a></h4>
				<p>TÌM HIỂU</p>
			</div>
			<div class="ng-scope">
				<ul class="inline-list">
					@if(count($steps) > 0)
					@php
					$count = count($steps);
					@endphp
					@foreach($steps as $key => $step)
				    <li class="{{($step->order <= $stepcurrent->order)?'active':FALSE}}">
				    	<div class="inline-list-item">
				    		@if($step->order <= $stepcurrent->order)
				    		<a href="{{route('client.page.index',['slug' => $page->slug,'step' => $step->slug])}}">
				    			<img src="{{$step->image}}" alt="{{$step->title}}">
				    		</a>
				    		@else
								<img src="{{$step->image}}" alt="{{$step->title}}">
				    		@endif
				    		<p class="progressTitle">{{$step->name}}</p>
				    	</div>
				    </li>
				    @if($key < $count - 1)
				    <li class="meter {{($step->order <= $stepcurrent->order)?'active':FALSE}}"></li>
				    @endif
				    @endforeach
				    @endif
				</ul>
			</div>
			<div class="title-page">
				<h1>{{$stepcurrent->title}}</h1>
				<p>{{$stepcurrent->description}}</p>
			</div>
			<div id="answers">
				<div class="row">
					@if(count($stepcurrent->stepitem()) > 0)
					@foreach($stepcurrent->stepitem() as $item)
					<div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
						<div class="answers-item" data-value="{{$item->id}}">
							<a href="#">
								<div class="answers-img">
									<img src="{{$item->image}}" alt="{{$item->title}}">
									
								</div>
								<h4>{{$item->title}}</h4>
								<p>{{$item->description}}</p>
							</a>
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
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('.answers-item').on('click',function(){
			localStorage.setItem('{{$stepcurrent->slug}}',jQuery(this).data('value'));
			@if($stepcurrent->next_step())
			window.location.href = '{{route('client.page.index',['slug' => $page->slug,'step' => $stepcurrent->next_step()->slug])}}';
			@else
				window.location.href = "{{route('client.page.index',['slug' => $page->slug,'step' => 'result'])}}";
			@endif
		})
	})
</script>
@endsection