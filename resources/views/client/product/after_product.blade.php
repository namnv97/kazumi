<div class="shipping">
	<img src="{{asset('assets/client/img/shipping-icon-1-3.png')}}" alt="">
	<p>@if(!empty($afshipping)) {!! $afshipping->meta_value !!} @endif</p>
</div>
<div class="product-guarantees">
	@if($af_attr->count() > 0)
	@foreach($af_attr as $item)
	@php
		$attr = json_decode($item->meta_value,true);
	@endphp
	<div class="product-guarantee-item">
		<img class="product-guarantee-icon" width="30" height="auto" src="{{$attr['image']}}" alt="{{$attr['title']}}">
		<p>{{$attr['title']}}</p>
	</div>
	@endforeach
	@endif
</div>
<div class="ProductMeta__Description">
	@if(!empty($af_content))
	{!! $af_content->meta_value !!}
	@endif
</div>
<div class="Product__QuickNav hidden-pocket is-flipped">
	<div class="Product__QuickNavWrapper">
		<span class="Heading Link Link--secondary u-h7">Xem ảnh <i class="fa fa-angle-right" aria-hidden="true"></i></span>
	</div>
</div>