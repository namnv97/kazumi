@extends('layouts.server')
@section('title')
Thêm mới đổi thưởng
@endsection
@section('css')

@endsection
@section('content')
<div class="content_container">
	<h1>Thêm mới đổi thưởng</h1>
	<hr>
	<div class="dashboard_home">
		@if(session('errors'))
		<div class="alert alert-warning">
			@foreach(session('errors')->all() as $msg)
			<p>{{$msg}}</p>
			@endforeach
		</div>
		@endif
		<form action="{{route('admin.get_reward.create')}}" method="post" id="create_tier">
			@csrf
			<div class="row">
				<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
					<div class="form-group">
						<label>Tên phần thưởng</label>
						<input type="text" name="name" class="form-control" placeholder="Tên phần thưởng" value="{{old('name')}}">
					</div>
					
					<div class="form-group">
						<label>Số điểm yêu cầu</label>
						<input type="number" name="point" class="form-control" placeholder="Số điểm yêu cầu" value="{{old('title')}}">
					</div>
					<div class="form-group">
						<label>Giá trị phân thưởng</label>
						<input type="number" name="reward" class="form-control" placeholder="Giá trị phân thưởng" value="{{old('reward')}}">
					</div>
					<div class="form-group">
						<label>Đơn vị</label>
						<input type="text" name="unit" class="form-control" placeholder="Đơn vị" value="{{old('title')}}">
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