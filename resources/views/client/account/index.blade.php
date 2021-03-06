@extends('layouts.client')
@section('title')
Tài khoản
@endsection
@section('css')
<style>
	.table tbody td>strong
	{
		display: none;
	}

	.alert
	{
		position: relative;
	}

	.alert>i.fa-times
	{
		position: absolute;
		top: 2px;
		right: 2px;
		cursor: pointer;
		color: #fff;
		padding: 3px;
	}
	@media(max-width: 991px)
	{
		.table thead
		{
			display: none;
		}

		.table td
		{
			display: block;
		}

		.table tbody td>strong
		{
			display: inline-block;
		}

		.modal-content
		{
			padding-top: 30vh;
		}

		
	}
</style>
@endsection
@section('content')
<div class="contact bg-grey account">
	<div class="container">
		<div class="title-acount">
			@if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('superadmin'))
			<a href="{{route('admin.dashboard')}}" target="_blank">Trang quản trị</a>&ensp;|&ensp;
			@endif
			<a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ĐĂNG XUẤT</a>
			<form action="{{route('logout')}}" method="post" id="logout-form">
				@csrf
			</form>
			<h1 class="title-large">TÀI KHOẢN CỦA TÔI</h1>
			<p>Chào mừng quay lại, <a href="{{route('client.account.profile')}}">{{$user->name}}!</a></p>
		</div>
		@if(isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] == route('client.checkout',['step' => 'payment']))
		<div class="alert alert-success">
			<i class="fa fa-times"></i>
			<p>Đặt hàng thành công. Chúng tôi sẽ xác nhận và lên đơn sớm cho bạn</p>
		</div>
		@endif
		<div class="row">
			<div class="col-md-8 col-sm-12 col-xs-12">
				<div class="PageLayout__Section Account__Main">
					<div class="Segment">
						<h2 class="Segment__Title Heading u-h7">Đơn đặt hàng</h2>
						@if(count($cart) > 0)
						<table class="table">
							<thead>
								<tr>
									<th>STT</th>
									<th>Họ tên</th>
									<th>Địa chỉ</th>
									<th>Tổng</th>
									<th>Trạng thái</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@foreach($cart as $key => $cartitem)
								<tr>
									<td><strong>STT :&ensp;</strong>{{$key + 1}}</td>
									<td><strong>Họ tên :&ensp;</strong>{{$cartitem->fullname}}</td>
									<td><strong>Địa chỉ :&ensp;</strong>{{$cartitem->address}}</td>
									<td><strong>Tổng :&ensp;</strong>{{number_format($cartitem->total)}}VND</td>
									<td><strong>Trạng thái :&ensp;</strong>
										@php
										$arr = [
										0 => 'Chờ duyệt',
										1 => 'Chờ giao hàng',
										2 => 'Đang giao hàng',
										3 => 'Giao hàng thành công',
										4 => 'Đơn hàng bị hủy'
										];
										echo $arr[$cartitem->status];
										@endphp
									</td>
									<td><span class="btn btn-sm btn-info btn-detail" data-value="{{$cartitem->id}}"><i class="fa fa-eye"></i> Chi tiết</span></td>
								</tr>
								@endforeach
							</tbody>
						</table>
						<div id="order_detail" class="modal fade" role="dialog">
							<div class="modal-dialog modal-lg">

								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">Mã đơn hàng: <span class="order_code"></span></h4>
									</div>
									<div class="modal-body">

									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</div>
								</div>

							</div>
						</div>
						@else
						<div class="Segment__Content">
							<p>Bạn chưa có đơn hàng nào</p>
						</div>
						@endif
					</div>
				</div>
			</div>

			<div class="col-md-4 col-sm-12 col-xs-12">
				<div class="PageLayout__Section  Account__Sidebar PageLayout__Section--secondary">

					<div class="Segment">
						<h2 class="Segment__Title Heading u-h7">Điểm thưởng</h2>
						<div class="account-loyalty-points">
							<span class="account-loyalty-points-value" data-lion-points="">{{$user->point()->point}}</span>
							<span class="account-loyalty-points-label Heading">Điểm</span>
						</div>
						<a href="{{route('client.account.reward')}}" class="Button Button--primary">Thêm điểm</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('script')
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('.btn-detail').on('click',function(){
			var id = jQuery(this).data('value');
			jQuery.ajax({
				url: '{{route('client.order.order_detail')}}',
				type: 'get',
				dataType: 'html',
				data: {
					id: id
				},
				beforeSend: function(){

				},
				success: function(res){
					jQuery('#order_detail span.order_code').text('#'+id);
					jQuery('#order_detail .modal-body').html(res);
					jQuery('#order_detail').modal('show');
				},
				errors: function(errors){
					console.log(errors);
				}
			});

		});

		jQuery('body').on('click','i.fa-times',function(){
			jQuery(this).parent().remove();
		});
	});
</script>
@endsection