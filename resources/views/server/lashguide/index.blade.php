@extends('layouts.server')
@section('title')
Các thuộc tính gợi ý
@endsection
@section('css')

@endsection
@section('content')
<div class="page-lashguide">
	<h1>Các thuộc tính gợi ý</h1>
	<div class="row">
		<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
			<h3>Thêm thuộc tính</h3>
			<form action="{{route('admin.lashguide.create')}}" method="post">
				@csrf
				<div class="form-group">
					<label>Tên</label>
					<input type="text" name="name">
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