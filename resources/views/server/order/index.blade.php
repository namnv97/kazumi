@extends('layouts.server')
@section('title')
Quản lý đơn hàng
@endsection
@section('css')

@endsection
@section('content')
<div class="page-order">
	<h1>Đơn hàng</h1>
	<div class="search_order">
		<form action="">
			<input type="text" name="s">
			<button type="submit">Tìm kiếm</button>
		</form>
	</div>
	<table class="table">
		<thead>
			<tr>
				<th>Đơn hàng</th>
				<th>Tổng</th>
				<th>Trạng thái</th>
				<th>Ngày đặt</th>
			</tr>
		</thead>
		@if(count($carts) > 0)
		<tbody>
			@foreach($carts as $key => $cart)
			<tr>
				<td><a href="{{route('admin.orders.edit',['id' => $cart->id])}}">#{{$cart->id.' - '.$cart->fullname}}</a></td>
				<td>{{number_format($cart->total)}} VNĐ</td>
				<td>Chờ duyệt</td>
				<td>{{\Carbon\Carbon::parse($cart->created_at)->format('d/m/Y')}}</td>
			</tr>
			@endforeach
		</tbody>
		@endif
	</table>
</div>
@endsection
@section('script')

@endsection