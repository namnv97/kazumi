@extends('layouts.client')
@section('title')
{{$page->name}}
@endsection
@section('css')

@endsection

@section('content')

<div class="apply-care program retailers">
	<div class="bn-learn" style="background-image: url('{{asset($banner->meta_value)}}')">
		<div class="bn-learn-content">
			<h1 class="title-large">{{$page_title->meta_value}}</h1>
			<p>{{$page_description->meta_value}}</p>
		</div>
	</div>
	<div class="apply-care-content retailers-content">
		<div class="container">
			<ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#search_retailer">Tìm nhà bán lẻ</a></li>
				<li><a data-toggle="tab" href="#reg_retailer">Đăng ký trở thành nhà bán lẻ</a></li>
			</ul>

			<div class="tab-content">
				<div id="search_retailer" class="tab-pane fade in active">
					<div class="row">
						@if(count($retailers) > 0)
						@foreach($retailers as $retailer)
						<div class="col-md-4 col-sm-4 col-xs-12">
							<div class="retailers-logo">
								<img src="{{asset($retailer->meta_value)}}" alt="Nhà bán lẻ">
							</div>
						</div>
						@endforeach
						@endif
					</div>
					
				</div>
				<div id="reg_retailer" class="tab-pane fade in">
					<div class="program-content">
						<div class="title-home">
							<h2 class="title-large">{{$become_title->meta_value}}</h2>
							<p>{{$become_description->meta_value}}</p>
						</div>
						<div class="form-program jdgm-form-wrapper">
							<form>
								<div class="row">
									<div class="col-xs-12 col-md-6 col-sm-6">
										<div class="form-group">
											<span>FIRST NAME*</span>
											<input type="text" name="" class="form-control">
										</div>
									</div>
									<div class="col-xs-12 col-md-6 col-sm-6">
										<div class="form-group">
											<span>LAST NAME*</span>
											<input type="text" name="" class="form-control">
										</div>
									</div>
									<div class="col-xs-12 col-md-6 col-sm-6">
										<div class="form-group">
											<span>EMAIL*</span>
											<input type="email" name="" class="form-control">
										</div>
									</div>
									<div class="col-xs-12 col-md-6 col-sm-6">
										<div class="form-group">
											<span>CONTACT #*</span>
											<input type="text" name="" class="form-control">
										</div>
									</div>
									<div class="col-xs-12 col-md-6 col-sm-6">
										<div class="form-group">
											<span>WEBSITE/PORTFOLIO*</span>
											<input type="text" name="" class="form-control">
										</div>
									</div>
									<div class="col-xs-12 col-md-6 col-sm-6">
										<div class="form-group">
											<span>TAX ID</span>
											<input type="text" name="" class="form-control">
										</div>
									</div>
									<div class="col-xs-12 col-md-6 col-sm-6">
										<div class="form-group">
											<span>BUSINESS TYPE*</span>
											<select class="form-control">
												<option value=""> Please Select </option>
												<option value="Afghanistan"> Afghanistan </option>
												<option value="Albania"> Albania </option>
											</select>
										</div>
									</div>
									<div class="col-xs-12 col-md-6 col-sm-6">
										<div class="form-group">
											<span>YEARS IN BUSINESS*</span>
											<input type="number" name="" class="form-control">
										</div>
									</div>
									<div class="col-xs-12 col-md-12 col-sm-12">
										<p><strong>BUSINESS ADDRESS*</strong></p>
									</div>
									<div class="col-xs-12 col-md-12 col-sm-12">
										<div class="form-group">
											<span>ADDRESS LINE 1</span>
											<input type="text" name="" class="form-control">
										</div>
									</div>
									<div class="col-xs-12 col-md-12 col-sm-12">
										<div class="form-group">
											<span>ADDRESS LINE 2</span>
											<input type="text" name="" class="form-control">
										</div>
									</div>
									<div class="col-xs-12 col-md-6 col-sm-6">
										<div class="form-group">
											<span>CITY</span>
											<input type="text" name="" class="form-control">
										</div>
									</div>
									<div class="col-xs-12 col-md-6 col-sm-6">
										<div class="form-group">
											<span>PROVINCE</span>
											<input type="text" name="" class="form-control">
										</div>
									</div>
									<div class="col-xs-12 col-md-6 col-sm-6">
										<div class="form-group">
											<span>ZIP CODE</span>
											<input type="text" name="" class="form-control">
										</div>
									</div>
									<div class="col-xs-12 col-md-6 col-sm-6">
										<div class="form-group">
											<span>COUNTRY</span>
											<select class="form-control">
												<option value="">- Country -</option>
												@if(count($regions) > 0)
												@foreach($regions as $reg)
												<option value="{{$reg->country_code}}">{{$reg->country_name}}</option>
												@endforeach
												@endif
											</select>
										</div>
									</div>
								</div>
								<div class="form_captcha_div" style="min-height: 95px; text-align: left;">
									<div class="g-recaptcha" data-sitekey="6LfsfFQUAAAAAHH7cZMWqPdqf2LizZ5-rq7zd8h5" data-callback="onSubmit" style="transform: scale(1);"><div style="width: 304px; height: 78px;"><div><iframe src="https://www.google.com/recaptcha/api2/anchor?ar=1&amp;k=6LfsfFQUAAAAAHH7cZMWqPdqf2LizZ5-rq7zd8h5&amp;co=aHR0cHM6Ly9mb3JtYnVpbGRlci5odWxrYXBwcy5jb206NDQz&amp;hl=vi&amp;v=v1563777128698&amp;size=normal&amp;cb=c0zklkqy9ono" width="304" height="78" role="presentation" name="a-xjx8r97j4b8m" frameborder="0" scrolling="no" sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox"></iframe></div><textarea id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 40px; border: 1px solid rgb(193, 193, 193); margin: 10px 25px; padding: 0px; resize: none; display: none;"></textarea></div></div>
								</div>
								<button type="submit" class="btn">Gửi</button>
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
	<div class="retailers-location bg-grey">
		<div class="container">
			<h2 class="title-large">STORE LOCATOR</h2>
			<div class="form-search-location">
				<form>
					<input type="text" name="" class="form-control" placeholder="Type a postcode or address...">
					<button type="button" class="btn"><i class="fa fa-search" aria-hidden="true"></i></button>
				</form>
			</div>
			<div class="row">
				<div class="col-md-9 col-xs-12 col-sm-8">
					<div class="location">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d953718.708129574!2d105.09215784260897!3d20.97404152711355!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135008e13800a29%3A0x2987e416210b90d!2zSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1566382065633!5m2!1svi!2s" width="100%" height="580" frameborder="0" style="border:0" allowfullscreen class="maps"></iframe>
					</div>
				</div>
				<div class="col-md-3 col-xs-12 col-sm-4">
					<div class="info-location">
						<ul>
							<li>
								<span><i class="fa fa-map-marker" aria-hidden="true"></i></span>
								<div class="stockist-result-name">
									<p><strong>Coiffure LA BROSSE</strong></p>
									<p>United States</p>
									<p>003 526 9127-0592</p>
									<p>makeupbytessy.com</p>
								</div>
							</li>
							<li>
								<span><i class="fa fa-map-marker" aria-hidden="true"></i></span>
								<div class="stockist-result-name">
									<p><strong>Coiffure LA BROSSE</strong></p>
									<p>United States</p>
									<p>003 526 9127-0592</p>
									<p>makeupbytessy.com</p>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
@section('script')

@endsection