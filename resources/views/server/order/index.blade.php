@extends('layouts.server')
@section('title')
Quản lý đơn hàng
@endsection
@section('css')
<style>
	.search_order form
	{
		display: table;
		width: 50%;
	}

	.search_order form input
	{
		display: table-cell;
		width: 35%;
		margin-right: 10px;
		height: 30px;
	}

	.search_order form select
	{
		display: table-cell;
		width: 35%;
		height: 30px;
		margin-right: 10px;
	}

	.search_order form button
	{
		display: table-cell;
		height: 30px;

	}
</style>
@endsection
@section('content')
<div class="page-order">
	<h1>Đơn hàng</h1>
	<div class="search_order">
		<form action="" method="get">
			<input type="text" name="s" placeholder="Nhập tên khách hàng hoặc số điện thoại" title="Nhập tên khách hàng hoặc số điện thoại" value="{{request()->s}}">
			<select name="status">
				<option value="all" {{(request()->status == 'all')?'selected':FALSE}}>Tất cả</option>
				<option value="pending" {{(request()->status == 'pending')?'selected':FALSE}}>Chờ duyệt</option>
				<option value="ship_pending" {{(request()->status == 'ship_pending')?'selected':FALSE}}>Chờ giao hàng</option>
				<option value="shipping" {{(request()->status == 'shipping')?'selected':FALSE}}>Đang giao hàng</option>
				<option value="complete" {{(request()->status == 'complete')?'selected':FALSE}}>Giao hàng thành công</option>
				<option value="cancel" {{(request()->status == 'cancel')?'selected':FALSE}}>Đơn bị hủy</option>
			</select>
			<button type="submit" class="btn btn-success btn-sm">Lọc đơn hàng</button>
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
				<td>
					@php
					$arr = [
					0 => 'Chờ duyệt',
					1 => 'Chờ giao hàng',
					2 => 'Đang giao hàng',
					3 => 'Giao hàng thành công',
					4 => 'Đơn hàng bị hủy'
					]; 
					echo $arr[$cart->status];
					@endphp
				</td>
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