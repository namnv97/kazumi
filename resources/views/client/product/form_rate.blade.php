@if(Auth::check() && $is_rate)
<div class="form-program">
	<div class="form-group">
		<span>Họ tên</span>
		<span class="form-control">{{Auth::user()->name}}</span>
	</div>
	<div class="form-group">
		<span>Email</span>
		<span class="form-control">{{Auth::user()->email}}</span>
	</div>
	<div class="form-group">
		<span>Đánh giá</span>
		<input type="hidden" name="rating">
		<p class="jdgm-form__rating" style="cursor: pointer;">
			@for($i = 1; $i <= 5; $i++)
			<i class="fa fa-star" data-num="{{$i}}" aria-hidden="true"></i>
			@endfor
		</p>
	</div>
	<div class="form-group">
		<span>Tiêu đề</span>
		<input type="text" name="review_title" class="form-control" placeholder="Tiêu đề đánh giá">
	</div>
	<div class="form-group">
		<span>Nội dung</span>
		<textarea class="form-control" name="review_content" placeholder="Viết đánh giá"></textarea>
	</div>
	<button type="submit" class="btn">Gửi đánh giá</button>
</div>
@endif