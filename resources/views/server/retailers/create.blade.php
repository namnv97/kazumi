@extends('layouts.server')
@section('title')
Thêm mới
@endsection
@section('css')

@endsection
@section('content')
<div class="page-retailers">
	<h1>Thêm mới đại lý</h1>
	@if(session('errors'))
	<div class="alert alert-warning">
		@foreach(session('errors')->all() as $msg)
		<p>{{$msg}}</p>
		@endforeach
	</div>
	@endif
	<form action="{{route('admin.retailers.create')}}" method="post">
		@csrf
		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<h3>Thông tin đại lý</h3>
				<div class="form-group">
					<label>Tên đại lý</label>
					<input type="text" name="name" class="form-control" placeholder="Tên đại lý" value="{{old('name')}}">
				</div>
				<div class="form-group">
					<label>Số điện thoại</label>
					<input type="text" name="phone" class="form-control" placeholder="Số điện thoại" value="{{old('phone')}}">
				</div>
				<div class="form-group">
					<label>Website</label>
					<input type="text" name="website" class="form-control" placeholder="Website" value="{{old('website')}}">
				</div>
				<div class="form-group">
					<label>Năm hoạt động</label>
					<input type="number" name="bussiness_year" class="form-control" placeholder="Số năm hoạt động" value="{{old('bussiness_year')}}">
				</div>
				<div class="form-group">
					<label>Địa chỉ</label>
					<textarea name="address" rows="2" style="resize: vertical;" placeholder="Số 1 ngõ 1 Hoàng Cầu, Đống Đa, Hà Nội" class="form-control">{{old('address')}}</textarea>
				</div>
				<div class="form-group">
					<label>Tỉnh/Thành phố</label>
					<select name="city_id" class="form-control">
						<option value="">Chọn Tỉnh/Thành phố</option>
						@if(count($cities) > 0)
						@foreach($cities as $city)
						<option value="{{$city->id}}" {{(old('city_id') == $city->id)?'selected':FALSE}}>{{$city->name}}</option>
						@endforeach
						@endif
					</select>
				</div>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<h3>Thông tin người đăng ký</h3>
				<div class="form-group">
					<label>Họ tên</label>
					<input type="text" name="fullname" class="form-control" placeholder="Họ tên">
				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="text" name="email" class="form-control" placeholder="Email">
				</div>
				<div class="text-center">
					<button class="btn btn-md btn-primary" type="submit">Thêm</button>
				</div>
			</div>
		</div>
	</form>
</div>
@endsection
@section('script')

@endsection