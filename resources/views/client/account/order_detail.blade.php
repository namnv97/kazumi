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
			<td>{{$key + 1}}</td>
			<td>{{$item->packs()->product()->name}} / {{$item->packs()->name}}</td>
			<td>{{(!empty($item->color_id))?$item->color()->name:FALSE}}</td>
			<td>{{number_format($item->price)}}VND</td>
			<td>{{$item->quantity}}</td>
			<td>{{number_format($item->quantity*$item->price)}}VND</td>
		</tr>
		@endforeach
	</tbody>
	<tfoot>
		<tr>
			<td colspan="6" class="text-center">
				Tổng cộng : <strong>{{number_format($total)}}VNĐ</strong>
			</td>
		</tr>
	</tfoot>
	@endif
</table>