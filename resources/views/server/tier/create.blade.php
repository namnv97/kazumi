@extends('layouts.server')
@section('title')
Thêm mới bậc thưởng
@endsection
@section('css')

@endsection
@section('content')
<div class="content_container">
	<h1>Thêm mới bậc thưởng</h1>
	<hr>
	<div class="dashboard_home">
		@if(session('errors'))
		<div class="alert alert-warning">
			<i class="fa fa-times"></i>
			@foreach(session('errors')->all() as $msg)
			<p>{{$msg}}</p>
			@endforeach
		</div>
		@endif
		<form action="{{route('admin.tier.create')}}" method="post" id="create_tier">
			@csrf
			<div class="row">
				<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
					<div class="form-group">
						<label>Tên bậc</label>
						<input type="text" name="name" class="form-control" placeholder="Tên bậc" value="{{old('name')}}">
					</div>
					
					<div class="form-group">
						<label>Tiêu đề</label>
						<input type="text" name="title" class="form-control" placeholder="Tiêu đề bậc" value="{{old('title')}}">
					</div>
					<div class="form-group">
						<label>Nội dung chi tiết</label>
						<textarea name="tier_content" id="tier_content" rows="5" style="resize: vertical;" class="form-control" placeholder="Nội dung chi tiết">{{old('tier_content')}}</textarea>
					</div>
					<button class="btn btn-primary">Thêm</button>
				</div>

				
			</div>
			
			
		</form>		
	</div>
</div>

@endsection
@section('script')
<script type="text/javascript">
	jQuery(document).ready(function(){
		
		CKEDITOR.replace('tier_content');
	});
	
</script>
@endsection