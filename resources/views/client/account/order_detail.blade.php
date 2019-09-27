<table class="table">
	<thead>
		<tr>
			<th>STT</th>
			<th>Tên sản phẩm</th>
			<th>Màu sắc</th>
			<th>Đơn giá</th>
			<th>Số lượng</th>
			<th>Thành tiền</th>
		</tr>
	</thead>
	@if(count($carts)> 0)
	<tbody>
		@foreach($carts as $key => $item)
		<tr>
			<td><strong>STT :&ensp;</strong>{{$key + 1}}</td>
			<td><strong>Tên sản phẩm :&ensp;</strong>{{$item->packs()->product()->name}} / {{$item->packs()->name}}</td>
			<td><strong>Màu sắc :&ensp;</strong>{{(!empty($item->color_id))?$item->color()->name:FALSE}}</td>
			<td><strong>Đơn giá :&ensp;</strong>{{number_format($item->price)}}VND</td>
			<td><strong>Số lượng :&ensp;</strong>{{$item->quantity}}</td>
			<td><strong>Thành tiền :&ensp;</strong>{{number_format($item->quantity*$item->price)}}VND</td>
		</tr>
		@endforeach
	</tbody>
	<tfoot>
		<tr>
			<td colspan="6" class="text-center">
				Giao hàng : <strong>30.000VND</strong>
			</td>
		</tr>
		@if(!empty($cart->discount_id))
		<tr>
			<td colspan="6" class="text-center">
				Giảm giá : <strong>-{{number_format($cart->discount()->discount_value)}}{{($cart->discount()->type == 'percent')?'%':'VNĐ'}}</strong>
			</td>
		</tr>
		@endif
		@if(!empty($cart->voucher_id))
		<tr>
			<td colspan="6" class="text-center">
				Giảm giá : <strong>-{{number_format($cart->get_voucher()->discount_value)}}{{($cart->get_voucher()->type == 'percent')?'%':'VNĐ'}}</strong>
			</td>
		</tr>
		@endif
		<tr>
			<td colspan="6" class="text-center">
				Tổng cộng : <strong>{{number_format($cart->total)}}VNĐ</strong>
			</td>
		</tr>
	</tfoot>
	@endif
</table>