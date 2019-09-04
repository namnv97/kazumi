<form>
	<div class="form-group">
		<span>Họ tên</span>
		<input type="text" name="review_name" class="form-control" placeholder="Họ tên">
	</div>
	<div class="form-group">
		<span>Email</span>
		<input type="email" name="review_email" class="form-control" placeholder="Email">
	</div>
	<div class="form-group">
		<span>Đánh giá</span>
		<input type="hidden" name="rating">
		<p class="jdgm-form__rating" style="cursor: pointer;">
			<i class="fa fa-star" aria-hidden="true"></i>
			<i class="fa fa-star" aria-hidden="true"></i>
			<i class="fa fa-star" aria-hidden="true"></i>
			<i class="fa fa-star" aria-hidden="true"></i>
			<i class="fa fa-star" aria-hidden="true"></i>
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
</form>