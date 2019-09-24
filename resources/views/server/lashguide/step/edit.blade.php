<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">&times;</button>
	<h4 class="modal-title">Cập nhật: <strong>{{$step->name}}</strong></h4>
</div>
<div class="modal-body">
	<input type="hidden" id="idstep" value="{{$step->id}}">
	<div class="form-group">
		<label>Tên</label>
		<input type="text" name="name" class="form-control" placeholder="Tên bước" value="{{$step->name}}">
	</div>
	<div class="form-group">
		<label>Đường dẫn</label>
		<input type="text" name="slug" class="form-control" placeholder="Đường dẫn" value="{{$step->slug}}">
	</div>
	<div class="form-group background_image">
		<label>Hình ảnh</label>
		<div class="image">
			<div class="img active">
				<img src="{{$step->image}}">
				<input type="hidden" name="image" value="{{$step->image}}">
				<i class="fa fa-times"></i>
			</div>
			<span class="btn btn-sm btn-success btn-add-image">Chọn ảnh</span>
		</div>
	</div>
	<div class="form-group">
		<label>Tiêu đề</label>
		<input type="text" name="title" placeholder="Tiêu đề" class="form-control" value="{{$step->title}}">
	</div>
	<div class="form-group">
		<label>Mô tả</label>
		<textarea name="description" rows="3" class="form-control" style="resize: vertical;">{{$step->description}}</textarea>
	</div>
	<div class="text-center">
		<button class="btn btn-md btn-primary btn-step">Cập nhật</button>
	</div>
</div>
