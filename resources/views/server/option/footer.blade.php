@extends('layouts.server')
@section('title')
Thiết lập Footer
@endsection
@section('css')

@endsection
@section('content')

<div class="page-settings">
	<h1>Thiết lập Footer</h1>
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
	<form action="{{route('admin.options.footer')}}" method="post">
		@csrf
		<div class="row">
			<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
				@if(empty($options))
				<div class="form-group">
					<label>Nội dung 1</label>
					<input type="text" name="footer_title[]" class="form-control" placeholder="Tiêu đề">
					<textarea name="footer_content[]" id="ftc1" rows="10" placeholder="Nội dung" class="form-control"></textarea>
				</div>
				<div class="form-group">
					<label>Nội dung 2</label>
					<input type="text" name="footer_title[]" class="form-control" placeholder="Tiêu đề">
					<textarea name="footer_content[]" id="ftc2" rows="10" placeholder="Nội dung" class="form-control"></textarea>
				</div>
				<div class="form-group">
					<label>Nội dung 3</label>
					<input type="text" name="footer_title[]" class="form-control" placeholder="Tiêu đề">
					<textarea name="footer_content[]" id="ftc3" rows="10" placeholder="Nội dung" class="form-control"></textarea>
				</div>
				@else
				@foreach($options as $key => $option)
				@php
					$value = json_decode($option->meta_value);
				@endphp
				<div class="form-group">
					<label>Nội dung {{$key+1}}</label>
					<input type="text" name="footer_title[]" class="form-control" placeholder="Tiêu đề" value="{{$value->title}}">
					<textarea name="footer_content[]" id="ftc{{$key+1}}" rows="10" placeholder="Nội dung" class="form-control">{!! $value->content !!}</textarea>
				</div>
				@endforeach
				@endif
			</div>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
				<button class="btn btn-primary btn-md">Lưu</button>
			</div>
		</div>
	</form>
</div>

@endsection
@section('script')

<script type="text/javascript">
	CKEDITOR.replace('ftc1');
	CKEDITOR.replace('ftc2');
	CKEDITOR.replace('ftc3');
</script>

@endsection