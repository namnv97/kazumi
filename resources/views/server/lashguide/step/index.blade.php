@extends('layouts.server')
@section('title')
Các bước
@endsection
@section('css')

@endsection
@section('content')
<div class="page-lashguide">
	<h1>Các bước</h1>
	<div class="row">
		<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
			<h3>Thêm bước</h3>
			<form action="{{route('admin.lashguide.create')}}" method="post">
				@csrf
				<div class="form-group">
					<label>Tên</label>
					<input type="text" name="name" class="form-control" placeholder="Tên bước" value="{{old('name')}}">
				</div>
				<div class="form-group">
					<label>Hình ảnh</label>
					<div class="image">
						<div class="img">
							<img src="">
							<input type="hidden" name="image">
							<i class="fa fa-times"></i>
						</div>
						<span class="btn btn-sm btn-success">Chọn ảnh</span>
					</div>
				</div>
				<div class="form-group">
					<label>Tiêu đề</label>
					<input type="text" name="title" placeholder="Tiêu đề" class="form-control" value="{{old('title')}}">
				</div>
				<div class="form-group">
					<label>Mô tả</label>
					<textarea name="description" rows="3" class="form-control" style="resize: vertical;">{{old('description')}}</textarea>
				</div>
				<div class="text-center">
					<button class="btn btn-sm btn-primary" type="submit">Thêm</button>
				</div>
			</form>
		</div>
		<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
			<h3>Danh sách thuộc tính</h3>
		</div>
	</div>
</div>
@endsection
@section('script')

@endsection