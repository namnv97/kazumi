@extends('layouts.client')
@section('title')
{{$page->name}}
@endsection
@section('css')

@endsection

@section('content')
<div class="rewards bg-grey">
	<div class="bn-learn" style="background-image: url('{{asset($banner->meta_value)}}')">
		<div class="bn-learn-content">
			<img src="{{asset($banner_title->meta_value)}}" alt="{{$page->name}}">
		</div>
	</div>
	<div class="rewards-content">
		<div class="container">
			<div class="rewards-box">
				<div class="rewards-title">
					<h3 class="title-large">{{$earn_title->meta_value}}</h3>
					<p>{{$earn_description->meta_value}}</p>
				</div>
				<div class="rewards-box-info">
					<img src="{{asset($earn_img->meta_value)}}" alt="{{$earn_title->meta_value}}">
				</div>
				<div class="rewards-line">
					<span><i class="fa fa-star" aria-hidden="true"></i></span>
				</div>
			</div>
			@if(count($earn_point) > 0)
			<div class="rewards-box">
				<div class="rewards-title">
					<h3 class="title-large">NHIỀU CÁCH HƠN ĐỂ NHẬN ĐIỂM</h3>
					<p>Nhận thưởng sớm hơn bằng cách hoàn thành các mục tiêu thưởng dưới đây!</p>
				</div>
				<div class="rewards-box-info">
					<div class="row">
						@foreach($earn_point as $item)
						<div class="col-md-4 col-xs-12 col-sm-6">
							<div class="rewards-item">
								<div class="rewards-img">
									<img src="{{asset($item->image)}}" alt="{{$item->title}}">
								</div>
								<div class="rewards-item-content">
									<h4>{{$item->title}}</h4>
									<p>{{number_format($item->point)}} điểm</p>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
				<div class="rewards-line">
					<span><i class="fa fa-star" aria-hidden="true"></i></span>
				</div>
			</div>
			@endif
			@if(count($getrewards) > 0)
			<div class="rewards-box">
				<div class="rewards-title">
					<h3 class="title-large">PHẦN THƯỞNG</h3>
					<p>Sử dụng điểm của bạn để đổi những phần thưởng sau</p>
				</div>
				<div class="rewards-box-info">
					<div class="row">
						@foreach($getrewards as $item)
						<div class="col-md-4 col-xs-12 col-sm-6">
							<div class="rewards-item">
								<div class="rewards-img">
									<img src="{{asset($item->image)}}" alt="{{$item->name}}">
								</div>
								<div class="rewards-item-content">
									<h4>{{$item->name}}</h4>
									<p>{{number_format($item->point)}} điểm</p>
								</div>
							</div>
						</div>
						@endforeach
					</div>

				</div>
				<div class="rewards-line">
					<span><i class="fa fa-star" aria-hidden="true"></i></span>
				</div>
			</div>
			@endif
			@if(!Auth::check())
			<div class="rewards-box">
				<div class="rewards-title">
					<h3 class="title-large">NHẬN ĐIỂM NGAY HÔM NAY</h3>
					<p>Tạo tài khoản miễn phí để nhận điêm ngay hôm nay</p>
				</div>
				<div class="rewards-box-info">
					<a href="{{route('login')}}" class="login-btn" target="_blank">ĐĂNG NHẬP</a>
					<a href="{{route('register')}}" target="_blank">ĐĂNG KÝ</a>
				</div>
			</div>
			@endif
		</div>
	</div>
</div>
@endsection
@section('script')

@endsection