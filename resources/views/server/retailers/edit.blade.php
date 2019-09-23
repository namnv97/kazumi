@extends('layouts.server')
@section('title')
Cập nhật đại lý
@endsection
@section('css')

@endsection
@section('content')
<div class="page-retailers">
	<h1>Cập nhật đại lý</h1>
	<a href="{{route('admin.retailers.create')}}" class="btn btn-sm btn-primary btn-create">Thêm mới</a>
	@if(session('errors'))
	<div class="alert alert-warning">
		@foreach(session('errors')->all() as $msg)
		<p>{{$msg}}</p>
		@endforeach
	</div>
	@endif
	@if(session('msg'))
	<div class="alert alert-success">
		<i class="fa fa-times"></i>
		<p>{{session('msg')}}}</p>
	</div>
	@endif
	<form action="{{route('admin.retailers.edit',['id' => $retailer->id])}}" method="post">
		@csrf
		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<h3>Thông tin đại lý</h3>
				<div class="form-group">
					<label>Tên đại lý</label>
					<input type="text" name="name" class="form-control" placeholder="Tên đại lý" value="{{old('name')?old('name'):$retailer->name}}">
				</div>
				<div class="form-group">
					<label>Số điện thoại</label>
					<input type="text" name="phone" class="form-control" placeholder="Số điện thoại" value="{{old('phone')?old('phone'):$retailer->phone}}">
				</div>
				<div class="form-group">
					<label>Website</label>
					<input type="text" name="website" class="form-control" placeholder="Website" value="{{old('website')?old('website'):$retailer->website}}">
				</div>
				<div class="form-group">
					<label>Năm hoạt động</label>
					<input type="number" name="bussiness_year" class="form-control" placeholder="Số năm hoạt động" value="{{old('bussiness_year')?old('bussiness_year'):$retailer->bussiness_year}}">
				</div>
				<div class="form-group">
					<label>Địa chỉ</label>
					<textarea name="address" rows="2" style="resize: vertical;" placeholder="Số 1 ngõ 1 Hoàng Cầu, Đống Đa, Hà Nội" class="form-control">{{old('address')?old('address'):$retailer->address}}</textarea>
				</div>
				<div class="form-group">
					<label>Tỉnh/Thành phố</label>
					<select name="city_id" class="form-control">
						<option value="">Chọn Tỉnh/Thành phố</option>
						@if(count($cities) > 0)
						@foreach($cities as $city)
						<option value="{{$city->id}}" {{(old('city_id') == $city->id)?'selected':(($retailer->city_id == $city->id)?'selected':FALSE)}}>{{$city->name}}</option>
						@endforeach
						@endif
					</select>
				</div>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<h3>Thông tin người đăng ký</h3>
				<div class="form-group">
					<label>Họ tên</label>
					<input type="text" name="fullname" class="form-control" placeholder="Họ tên" value="{{old('fullname')?old('fullname'):$retailer->fullname}}">
				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="text" name="email" class="form-control" placeholder="Email" value="{{old('email')?old('email'):$retailer->email}}">
				</div>
				<div class="text-center">
					<button class="btn btn-md btn-primary" type="submit">Cập nhật</button>
				</div>
			</div>
		</div>
	</form>
</div>
@endsection
@section('script')

@endsection