@extends('layouts.server')
@section('title')
Cập nhật đổi thưởng
@endsection
@section('css')

@endsection
@section('content')
<div class="content_container">
	<h1>Cập nhật đổi thưởng</h1>
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
		@if(session('success'))
		<div class="alert alert-success">
			<i class="fa fa-times"></i>
			<p>{{session('success')}}</p>
			
		</div>
		@endif
		<form action="{{route('admin.get_reward.edit',['id' => $get_reward->id])}}" method="post" id="create_tier">
			@csrf
			<div class="row">
				<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
					<div class="form-group">
						<label>Tên phần thưởng</label>
						<input type="text" name="name" class="form-control" placeholder="Tên phần thưởng" value="{{$get_reward->name}}">
					</div>
					
					<div class="form-group">
						<label>Số điểm yêu cầu</label>
						<input type="number" name="point" class="form-control" placeholder="Số điểm yêu cầu" value="{{$get_reward->point}}">
					</div>
					<div class="form-group">
						<label>Giá trị phân thưởng</label>
						<input type="number" name="reward" class="form-control" placeholder="Giá trị phân thưởng" value="{{$get_reward->reward}}">
					</div>
					<div class="form-group">
						<label>Đơn vị</label>
						<input type="text" name="unit" class="form-control" placeholder="Đơn vị" value="{{$get_reward->unit}}">
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