@extends('layouts.server')
@section('title')
Thêm mới đổi thưởng
@endsection
@section('css')
<style>
	.image .img
	{
		display: none;
		position: relative;
		width: 100px;
		margin: 10px 0;
	}

	.image .img.active
	{
		display: block;

	}

	.image .img img
	{
		width: 100%;
	}

	.image .img i
	{
		position: absolute;
		top: 0;
		right: 0;
		padding: 5px;
		border-radius: 100%;
		background: #fff;
		color: #000;
		font-weight: bold;
		cursor: pointer;
	}
</style>
@endsection
@section('content')
<div class="content_container">
	<h1>Thêm mới đổi thưởng</h1>
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
						<input type="number" name="point" class="form-control" placeholder="Số điểm yêu cầu" value="{{old('point')}}">
					</div>
					<div class="form-group">
						<label>Số tiền tương ứng</label>
						<input type="number" name="discount_value" class="form-control" placeholder="Số tiền tương ứng" value="{{old('discount_value')}}">
					</div>
					<div class="form-group">
						<label>Hình ảnh</label>
						<div class="image">
							<div class="img">
								<img src="">
								<input type="hidden" name="image">
								<i class="fa fa-times"></i>
							</div>
							<span class="btn-add-image btn btn-sm btn-success">Chọn ảnh</span>
						</div>
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
		

		jQuery('.btn-add-image').on('click',function(){
			var $this = jQuery(this).prev();
			CKFinder.popup( {
				chooseFiles: true,
				onInit: function( finder ) {
					finder.on( 'files:choose', function( evt ) {
						var file = evt.data.files.first();
						$this.find('img').attr('src',file.getUrl());
						$this.find('input').val(file.getUrl());
						$this.addClass('active');
					} );
				}
			} );
		});

		jQuery('.image .img i').on('click',function(){
			jQuery(this).parent().removeClass('active');
			jQuery(this).parent().find('img').removeAttr('src');
			jQuery(this).parent().find('input').val('');
		});


	});
	
</script>
@endsection