@extends('layouts.server')
@section('title')
Quản lý đơn hàng
@endsection
@section('css')
<style>
	.flex-row
	{
		display: flex;
		align-items: flex-start;
	}

	.flex-row .item
	{
		width: 50%;
	}
</style>
@endsection
@section('content')
<div class="page-order-edit">
	<h1>Cập nhật đơn hàng : #{{$cart->id}}</h1>
	@if(session('msg'))
	<div class="alert alert-success">
		<i class="fa fa-times"></i>
		<p>{{session('msg')}}</p>
	</div>
	@endif
	<div class="row">
		<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
			<h3>Đơn hàng</h3>
			<table class="table">
				<thead>
					<tr>
						<th>STT</th>
						<th>Tên sản phẩm</th>
						<th>Màu</th>
						<th>Giá</th>
						<th>Số lượng</th>
						<th>Thành tiền</th>
					</tr>
				</thead>
				<tbody>
					@foreach($cart->cart_item() as $key => $item)
					<tr>
						<td>{{$key+1}}</td>
						<td>{{$item->packs()->product()->name}}</td>
						<td>{{(!empty($item->color_id))?$item->color()->name:FALSE}}</td>
						<td>{{number_format($item->price)}}VND</td>
						<td>{{$item->quantity}}</td>
						<td>{{number_format($item->price * $item->quantity)}}VND</td>
					</tr>
					@endforeach
				</tbody>
				<tfoot>
					<tr>
						<td colspan="2" class="text-right"><strong>Phí giao hàng</strong></td>
						<td colspan="4">30.000VND</td>
					</tr>
					@if(!empty($cart->discount_id))
					<tr>
						<td colspan="2" class="text-right"><strong>Giảm giá</strong></td>
						<td colspan="4">-{{number_format($cart->discount()->discount_value)}}{{($cart->discount()->type == 'percent')?'%':'VNĐ'}}</td>
					</tr>
					@endif
					<tr>
						<td colspan="2" class="text-right"><strong>Tổng cộng</strong></td>
						<td colspan="4">{{number_format($cart->total)}}VND</td>
					</tr>
				</tfoot>
			</table>
		</div>
		<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
			<h3>Thông tin giao hàng</h3>
			@if(session('errors'))
			<div class="alert alert-warning">
				@foreach(session('errors')->all() as $msg)
				<p>{{$msg}}</p>
				@endforeach
			</div>
			@endif
			<form action="" method="post">
				@csrf
				<div class="form-group flex-row">
					<div class="item">
						<label>Họ</label>
						<input type="text" name="first_name" value="{{$cart->first_name}}" class="form-control" placeholder="Họ">
					</div>
					<div class="item">
						<label>Tên</label>
						<input type="text" name="last_name" value="{{$cart->last_name}}" class="form-control" placeholder="Tên">
					</div>
				</div>
				<div class="form-group">
					<label>Công ty</label>
					<input type="text" name="company" value="{{$cart->company}}" class="form-control" placeholder="Công ty">
				</div>
				<div class="form-group">
					<label>Địa chỉ 1</label>
					<input type="text" name="address1" class="form-control" placeholder="Địa chỉ 1" value="{{$cart->address1}}">
				</div>
				<div class="form-group">
					<label>Địa chỉ 2</label>
					<input type="text" name="address2" class="form-control" placeholder="Địa chỉ 2" value="{{$cart->address2}}">
				</div>
				<div class="form-group">
					<label>Tỉnh / Thành phố</label>
					<input type="text" name="city" class="form-control" placeholder="Tỉnh/Thành phố" value="{{$cart->city}}">
				</div>
				<div class="form-group">
					<label>Số điện thoại</label>
					<input type="text" name="phone" class="form-control" placeholder="Số điện thoại" value="{{$cart->phone}}">
				</div>
				<div class="form-group">
					<label>Trạng thái thanh toán</label>
					<select name="payment_status" class="form-control">
						<option value="0" {{($cart->payment_status == 0)?'selected':FALSE}}>Chưa thanh toán</option>
						<option value="1" {{($cart->payment_status == 1)?'selected':FALSE}}>Đã thanh toán</option>
					</select>
				</div>
				<div class="form-group">
					<label>Trạng thái đơn hàng</label>
					@if(in_array($cart->status,['3,4']) )
					@php
					$arr = [
					3 => 'Giao hàng thành công',
					4 => 'Đơn hàng bị hủy'
					]; 
					@endphp
					<span class="form-control">{{$arr[$cart->status]}}</span>
					@else
					<select name="status" class="form-control">
						<option value="0" {{($cart->status == 0)?'selected':FALSE}}>Chờ duyệt</option>
						<option value="1" {{($cart->status == 1)?'selected':FALSE}}>Chờ giao hàng</option>
						<option value="2" {{($cart->status == 2)?'selected':FALSE}}>Đang giao hàng</option>
						<option value="3" {{($cart->status == 3)?'selected':FALSE}}>Giao hàng thành công</option>
						<option value="4" {{($cart->status == 4)?'selected':FALSE}}>Đơn hàng bị hủy</option>
					</select>
					@endif
				</div>
				<div class="text-center">
					<button class="btn btn-md btn-primary" type="submit">Cập nhật</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
@section('script')

@endsection