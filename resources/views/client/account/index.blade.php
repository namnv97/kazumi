@extends('layouts.client')
@section('title')
Tài khoản
@endsection
@section('css')

@endsection
@section('content')
<div class="contact bg-grey account">
	<div class="container">
		<div class="title-acount">
			<a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ĐĂNG XUẤT</a>
			<form action="{{route('logout')}}" method="post" id="logout-form">
				@csrf
			</form>
			<h1 class="title-large">TÀI KHOẢN CỦA TÔI</h1>
			<p>Chào mừng quay lại, {{$user->name}}!</p>
		</div>
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
									<th>Tổng đơn hàng</th>
									<th>Trạng thái đơn hàng</th>
								</tr>
							</thead>
							<tbody>
						@foreach($cart as $key => $cartitem)
							<tr>
								<td>{{$key + 1}}</td>
								<td>{{$cartitem->fullname}}</td>
								<td>{{$cartitem->address}}</td>
								<td>{{number_format($cartitem->total)}}VND</td>
								<td>
									@php
										$arr = [
											1 => 'Chờ giao hàng',
											2 => 'Đang giao hàng',
											3 => 'Giao hàng thành công',
											4 => 'Đơn hàng bị hủy'
										];
										echo $arr[$cartitem->status];
									@endphp
								</td>
							</tr>
						@endforeach
							</tbody>
						</table>
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
           					<span class="account-loyalty-points-value" data-lion-points="">{{$user->point_reward}}</span>
           					<span class="account-loyalty-points-label Heading">Điểm</span>
         				</div>
         				<a href="{{route('client.account.reward')}}" class="Button Button--primary">Thêm điểm</a>
       				</div>
					<div class="Segment">
						<h2 class="Segment__Title Heading u-h7">Địa chỉ</h2>
          				<div class="Segment__Content">
            				<p>Chưa có địa chỉ nào được lưu</p>
	            			<div class="Segment__ButtonWrapper">
	              				<a href="#" class="Button Button--primary">Quản lý địa chỉ</a>
	            			</div>
	          			</div>
	          		</div>
	    		</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('script')

@endsection