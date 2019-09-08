<h1>{{config('app.name', 'Laravel')}} vừa có sản phẩm mới</h1>
Xem ngay tại <a href="{{route('client.product.index',['slug' => $product->slug])}}">đây</a>
<p>Mail được gửi từ <a href="{{route('home')}}">{{config('app.name', 'Laravel')}}</a></p>