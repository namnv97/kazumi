@extends('layouts.client')
@section('title')
{{$page->name}}
@endsection
@section('css')

@endsection

@section('content')

<div class="apply-care program bg-grey">
	<div class="bn-learn" style="background-image: url('{{asset($banner->meta_value)}}')">
		<div class="bn-learn-content">
			<h1 class="title-large">{{$page_title->meta_value}}</h1>
			<p>{{$page_description->meta_value}}</p>
		</div>
	</div>
	<div class="program-content">
		<div class="container-learn">
			<div class="title-home">
				<h2 class="title-large">{{$pro_title->meta_value}}</h2>
				<p>{{$pro_description->meta_value}}</p>
			</div>
			<div class="row">
				@if(count($programs) > 0)
				@foreach($programs as $program)
				<div class="col-md-4 col-sm-4 col-xs-12">
					@php
					$item = json_decode($program->meta_value,true);
					@endphp
					<div class="program-info">
						<img src="{{asset($item['image'])}}" alt="{{$item['name']}}">
						<p><strong>{{$item['name']}}</strong></p>
					</div>
				</div>
				@endforeach
				@endif
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
								<span>WEBSITE/PORTFOLIO*</span>
								<input type="text" name="" class="form-control">
							</div>
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
									<option value="Afghanistan"> Afghanistan </option>
									<option value="Albania"> Albania </option>
								</select>
							</div>
						</div>
						<div class="col-xs-12 col-md-12 col-sm-12">
							<div class="form-group">
								<span>YEARS OF EXPERIENCE*</span>
								<select name="Years of experience" class="form-control" id="">
									<option value=""> Please Select </option>
									<option value="1-3 Years"> 1-3 Years </option>
									<option value="3-5 Years"> 3-5 Years </option>
									<option value="5-10 Years"> 5-10 Years </option>
									<option value="10 Years +"> 10 Years + </option>
								</select>
							</div>
						</div>
						<div class="col-xs-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label>Upload a certificate or diploma</label>
								<input type="file" name="">
							</div>
						</div>
					</div>
					<div class="form_captcha_div" style="min-height: 95px; text-align: left;">
						<div class="g-recaptcha" data-sitekey="6LfsfFQUAAAAAHH7cZMWqPdqf2LizZ5-rq7zd8h5" data-callback="onSubmit" style="transform: scale(1);"><div style="width: 304px; height: 78px;"><div><iframe src="https://www.google.com/recaptcha/api2/anchor?ar=1&amp;k=6LfsfFQUAAAAAHH7cZMWqPdqf2LizZ5-rq7zd8h5&amp;co=aHR0cHM6Ly9mb3JtYnVpbGRlci5odWxrYXBwcy5jb206NDQz&amp;hl=vi&amp;v=v1563777128698&amp;size=normal&amp;cb=c0zklkqy9ono" width="304" height="78" role="presentation" name="a-xjx8r97j4b8m" frameborder="0" scrolling="no" sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox"></iframe></div><textarea id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 40px; border: 1px solid rgb(193, 193, 193); margin: 10px 25px; padding: 0px; resize: none; display: none;"></textarea></div></div>
					</div>
					<button type="submit" class="btn">Submit</button>
				</form>
			</div>
		</div>
	</div>

</div>

@endsection
@section('script')

@endsection