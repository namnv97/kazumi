@extends('layouts.server')
@section('title')
Voucher giảm giá
@endsection
@section('css')

@endsection
@section('content')
<div class="page-voucher">
	<h1>Voucher giảm giá</h1>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
			<h3>Thêm Voucher</h3>
			<form action="{{route('admin.voucher.create')}}" method="post">
				@csrf
				<div class="form-group">
					<label>Tiêu đề</label>
					<input type="text" name="name" class="form-control" placeholder="Tiêu đề">
				</div>
				<div class="form-group">
					<label>Điểm quy đổi</label>
					<input type="text" name="point" class="form-control" placeholder="Điểm quy đổi">
				</div>
				<div class="text-center">
					<button class="btn btn-md btn-primary" type="submit">Thêm</button>
				</div>
			</form>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
			<h3>Danh sách Voucher</h3>
			<table class="table">
				<thead>
					<tr>
						<th>STT</th>
						<th>Voucher</th>
						<th>Điểm</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>1</td>
						<td>Voucher giảm giá 100.000VNĐ</td>
						<td>1000</td>
						<td>
							<span class="btn btn-sm btn-danger" title="Xóa voucher">
								<i class="fa fa-trash"></i> Xóa
							</span>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection
@section('script')
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('input[name=point]').on('keypress',function(e){
			if(e.keyCode < 48 || e.keyCode > 57) return false;
		});
	});
</script>
@endsection