@extends('layouts.server')
@section('title')
Thiết lập chung
@endsection
@section('css')
<style>
	#logo
	{
		width: 250px;
		display: none;
		position: relative;
		margin-bottom: 10px;
	}

	#logo.active
	{
		display: block;
	}

	#logo img
	{
		max-width: 100%;
	}

	#logo i
	{
		position: absolute;
		top: 0;
		right: 0;
		padding: 5px;
		display: inline-block;
		border-radius: 100%;
		background: #fff;
		color: #000;
		font-weight: bold;
		cursor: pointer;
	}
</style>
@endsection
@section('content')

<div class="page-settings">
	<h1>Thiết lập chung</h1>
	@if(session('errors'))
	<div class="alert alert-warning">
		@foreach(session('errors')->all() as $msg)
		<p>{{$msg}}</p>
		@endforeach
	</div>
	@endif
	@if(session('msg'))
	<div class="alert alert-success">
		<p>{{session('msg')}}</p>
	</div>
	@endif
	<form action="{{route('admin.options.index')}}" method="post">
		@csrf
		<div class="row">
			<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
				<div class="form-group">
					<label>Logo</label>
					<div id="logo" class="{{(!empty($logo))?'active':FALSE}}">
						<img src="{{(!empty($logo))?$logo->meta_value:FALSE}}">
						<i class="fa fa-times"></i>
					</div>
					<span class="btn btn-success btn-sm btn-add_logo">Chọn ảnh</span>
					<input type="hidden" name="logo" value="{{(!empty($logo))?$logo->meta_value:FALSE}}">
				</div>
			</div>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
				<div class="form-group text-center">
					<button type="submit" class="btn btn-md btn-primary">Lưu</button>
				</div>
			</div>
		</div>
	</form>
</div>

@endsection
@section('script')

<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('.btn-add_logo').click(function(){
			CKFinder.popup( {
				chooseFiles: true,
				onInit: function( finder ) {
					finder.on( 'files:choose', function( evt ) {
						var file = evt.data.files.first();
						jQuery('#logo img').attr('src',file.getUrl());
						jQuery('input[name=logo]').val(file.getUrl());
						jQuery('#logo').addClass('active');
					} );
				}
			} );
		});

		jQuery('#logo').on('click','i',function(){
			if(confirm("Bạn muốn xóa ảnh này ?"))
			{
				jQuery('#logo').removeClass('active');
				jQuery('input[name=logo]').val('');

			}
		})
	})
</script>

@endsection