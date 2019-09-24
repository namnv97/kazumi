<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">&times;</button>
	<h4 class="modal-title">Cập nhật: <strong>{{$item->title}}</strong></h4>
</div>
<div class="modal-body">
	<input type="hidden" id="itid" value="{{$item->id}}">
	<div class="form-group">
		<label>Tên</label>
		<input type="text" name="title" class="form-control" placeholder="Tên" value="{{$item->title}}">
	</div>
	<div class="form-group background_image">
		<label>Hình ảnh</label>
		<div class="image">
			<div class="img active">
				<img src="{{$item->image}}">
				<input type="hidden" name="image" value="{{$item->image}}">
				<i class="fa fa-times"></i>
			</div>
			<span class="btn btn-sm btn-info btn-add-image">Chọn ảnh</span>
		</div>
	</div>
	<div class="form-group">
		<label>Mô tả</label>
		<textarea name="description" rows="5" class="form-control" placeholder="Mô tả">{{$item->description}}</textarea>
	</div>
	<div class="form-group">
		<label>Bước gợi ý</label>
		<select name="step_id" class="form-control">
			<option value="">Chọn bước</option>
			@if(count($steps) > 0)
			@foreach($steps as $step)
			<option value="{{$step->id}}" {{($step->id == $item->step_id)?'selected':FALSE}}>{{$step->name}}</option>
			@endforeach
			@endif
		</select>
	</div>
	<div class="text-center">
		<button class="btn btn-md btn-primary btn-update">Cập nhật</button>
	</div>
</div>