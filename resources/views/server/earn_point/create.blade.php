@extends('layouts.server')
@section('title')
Thêm mới điểm
@endsection
@section('css')
	<style type="text/css">
		.gallery .img
		{
			display: inline-block;
			width: 70%;
			padding: 5px;
			margin-bottom: 10px;
			float: left;
			position: relative;
		}

		.gallery .img i
		{
			position: absolute;
			top: 0;
			right: 0;
			display: inline-block;
			padding: 3px;
			background: #fff;
			color: #000;
			font-weight: bold;
			cursor: pointer;
			border-radius: 100%;
		}

		.gallery .img img
		{
			max-width: 100%;
		}

		.gallery::after
		{
			content: '';
			clear: both;
			display: table;
		}
	</style>

@endsection
@section('content')
<div class="content_container">
	<h1>Thêm mới điểm</h1>
	<hr>
	<div class="dashboard_home">
		@if(session('errors'))
		<div class="alert alert-warning">
			@foreach(session('errors')->all() as $msg)
			<p>{{$msg}}</p>
			@endforeach
		</div>
		@endif
		<form action="{{route('admin.earn_point.create')}}" method="post" id="create_tier">
			@csrf
			<div class="row">
				<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
					
					
					<div class="form-group">
						<label>Tiêu đề</label>
						<input type="text" name="title" class="form-control" placeholder="Tiêu đề" value="{{old('title')}}">
					</div>
					<div class="form-group">
						<label>Số điểm</label>
						<input type="number" name="point" class="form-control" placeholder="Số điểm" value="{{old('point')}}">
					</div>
					<div class="form-group">
						<label>Số tiền</label>
						<input type="number" name="price" class="form-control" placeholder="Dơn vị" value="{{old('price')}}">
					</div>
					<div class="form-group">
						<label>Đơn vị</label>
						<input type="text" name="unit" class="form-control" placeholder="Dơn vị" value="{{old('unit')}}">
					</div>
					
					
				</div>
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					<div class="form-group">
						<label>Ảnh</label>
						<div class="gallery">
							
						</div>
						<span class="choose_gallery btn btn-sm btn-success">Thêm ảnh</span>
					</div>
				</div>
				
			</div>
			<button class="btn btn-primary">Thêm</button>
			
			
		</form>		
	</div>
</div>

@endsection
@section('script')
<script type="text/javascript">
	jQuery(document).ready(function(){
		
		jQuery('body').on('click','.choose_gallery',function(){
				CKFinder.popup( {
					chooseFiles: true,
					onInit: function( finder ) {
						finder.on( 'files:choose', function( evt ) {
							var file = evt.data.files;
							file.forEach(function(e){
								var url = e.getUrl();
								jQuery('.gallery').html(`
								<div class="img">
									<img src="`+url+`" alt="image">
									<input type="hidden" name="image" value="`+url+`">
									<i class="fa fa-times"></i>
								</div>
								`)
							});
						} );
					}
				} );
		});

		jQuery('.gallery').on('click','.img i',function(){
			if(confirm('Are you sure ?'))
			{
				jQuery(this).parent().remove();
			}
		});


		CKEDITOR.replace('tier_content');
	});
	
</script>
@endsection