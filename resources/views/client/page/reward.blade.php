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
			<div class="rewards-box">
				<div class="rewards-title">
					<h3 class="title-large">MORE WAYS TO EARN</h3>
					<p>Get rewarded sooner by completing the bonus objectives below!</p>
				</div>
				<div class="rewards-box-info">
					<div class="row">
						<div class="col-md-4 col-xs-12 col-sm-6">
							<div class="rewards-item">
								<div class="rewards-img">
									<img src="https://media.pagefly.io/file/get/esqrewardsprogramiconsreferfriendsvg-1550720094253.svg" alt="">
								</div>
								<div class="rewards-item-content">
									<h4>REFER A FRIEND</h4>
									<p>3000 Points</p>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-xs-12 col-sm-6">
							<div class="rewards-item">
								<div class="rewards-img">
									<img src="https://media.pagefly.io/file/get/esqrewardsprogramiconsbirthdaysvg-1550720140175.svg" alt="">
								</div>
								<div class="rewards-item-content">
									<h4>REFER A FRIEND</h4>
									<p>3000 Points</p>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-xs-12 col-sm-6">
							<div class="rewards-item">
								<div class="rewards-img">
									<img src="https://media.pagefly.io/file/get/esqrewardsprogramiconsnewslettersvg-1550720145710.svg" alt="">
								</div>
								<div class="rewards-item-content">
									<h4>REFER A FRIEND</h4>
									<p>3000 Points</p>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-xs-12 col-sm-6">
							<div class="rewards-item">
								<div class="rewards-img">
									<img src="https://media.pagefly.io/file/get/esqrewardsprogramiconsreviewsvg-1550720540303.svg" alt="">
								</div>

								<div class="rewards-item-content">
									<h4>REFER A FRIEND</h4>
									<p>3000 Points</p>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-xs-12 col-sm-6">
							<div class="rewards-item">
								<div class="rewards-img">
									<img src="https://media.pagefly.io/file/get/esqrewardsprogramiconsfacebooksvg-1550720543429.svg" alt="">
								</div>
								<div class="rewards-item-content">
									<h4>REFER A FRIEND</h4>
									<p>3000 Points</p>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-xs-12 col-sm-6">
							<div class="rewards-item">
								<div class="rewards-img">
									<img src="https://media.pagefly.io/file/get/esqrewardsprogramiconsinstagramsvg-1550720547519.svg" alt="">
								</div>
								<div class="rewards-item-content">
									<h4>REFER A FRIEND</h4>
									<p>3000 Points</p>
								</div>
							</div>
						</div>
					</div>

				</div>
				<div class="rewards-line">
					<span><i class="fa fa-star" aria-hidden="true"></i></span>
				</div>
			</div>
			<div class="rewards-box">
				<div class="rewards-title">
					<h3 class="title-large">REWARDS</h3>
					<p>Redeem your points for these great rewards!</p>
				</div>
				<div class="rewards-box-info">
					<div class="row">
						<div class="col-md-4 col-xs-12 col-sm-6">
							<div class="rewards-item">
								<div class="rewards-img">
									<img src="https://media.pagefly.io/file/get/esqrewardsprogramiconsrewardcompaniongluesvg-1550720805497.svg" alt="">
								</div>
								<div class="rewards-item-content">
									<h4>FREE COMPANION LASH GLUE</h4>
									<p>1,500 Points</p>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-xs-12 col-sm-6">
							<div class="rewards-item">
								<div class="rewards-img">
									<img src="https://media.pagefly.io/file/get/esqrewardsprogramiconsreward5vouchersvg-1550720832941.svg" alt="">
								</div>
								<div class="rewards-item-content">
									<h4>$5 VOUCHER</h4>
									<p>1,000 Points</p>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-xs-12 col-sm-6">
							<div class="rewards-item">
								<div class="rewards-img">
									<img src="https://media.pagefly.io/file/get/esqrewardsprogramiconsreward8vouchersvg-1550720864995.svg" alt="">
								</div>
								<div class="rewards-item-content">
									<h4>$10 VOUCHER</h4>
									<p>2,000 Points</p>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-xs-12 col-sm-6">
							<div class="rewards-item">
								<div class="rewards-img">
									<img src="https://media.pagefly.io/file/get/esqrewardsprogramiconsreward25vouchersvg-1550720886828.svg" alt="">
								</div>

								<div class="rewards-item-content">
									<h4>REFER A FRIEND</h4>
									<p>3000 Points</p>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-xs-12 col-sm-6">
							<div class="rewards-item">
								<div class="rewards-img">
									<img src="https://media.pagefly.io/file/get/esqrewardsprogramiconsreward50vouchersvg-1550720897490.svg" alt="">
								</div>
								<div class="rewards-item-content">
									<h4>REFER A FRIEND</h4>
									<p>3000 Points</p>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-xs-12 col-sm-6">
							<div class="rewards-item">
								<div class="rewards-img">
									<img src="https://media.pagefly.io/file/get/esqrewardsprogramiconsreward100vouchersvg-1550720899527.svg" alt="">
								</div>
								<div class="rewards-item-content">
									<h4>REFER A FRIEND</h4>
									<p>3000 Points</p>
								</div>
							</div>
						</div>
					</div>

				</div>
				<div class="rewards-line">
					<span><i class="fa fa-star" aria-hidden="true"></i></span>
				</div>
			</div>
			<div class="rewards-box">
				<div class="rewards-title">
					<h3 class="title-large">START EARNING TODAY</h3>
					<p>Create a free account and start earning points with every purchase!</p>
				</div>
				<div class="rewards-box-info">
					<a href="#" class="login-btn">LOGIN</a>
					<a href="#">SIGN UP</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('script')

@endsection