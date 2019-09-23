<style>
	.background_image .image
	{
		display: table-cell;
		width: 30%;
	}

	.background_image .image .img
	{
		display: none;
		position: relative;
	}

	.background_image .image .img img
	{
		width: 100%;
	}

	.background_image .image .img.active
	{
		display: block;
	}

	.background_image .image label
	{
		display: block;
	}

	.background_image .image .img i
	{
		position: absolute;
		top: 0;
		right: 0;
		padding: 5px;
		text-align: center;
		color: #000;
		background: #fff;
		border-radius: 100%;
		font-weight: bold;
		cursor: pointer;
	}
</style>
<div class="form-group background_image">
	<label>Ảnh nền</label>
	<div class="image">
		<div class="img">
			<img src="">
			<input type="hidden" name="background">
			<i class="fa fa-times"></i>
		</div>
		<span class="btn btn-sm btn-success btn-add-image">Chọn ảnh</span>
	</div>
</div>
<div class="form-group">
	<label>Tiêu đề nhỏ</label>
	<input type="text" name="sub_title" class="form-control" placeholder="Tiêu đề nhỏ" value="{{old('sub_title')}}">
</div>
<div class="form-group">
	<label>Mô tả</label>
	<textarea name="description" rows="3" class="form-control" style="resize: vertical;">{{old('description')}}</textarea>
</div>
<div class="text-center">
	<button class="btn btn-md btn-primary" type="submit">Thêm</button>
</div>
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('body').on('click','.btn-add-image',function(){
			var cur = jQuery(this);
			CKFinder.popup( {
				chooseFiles: true,
				onInit: function( finder ) {
					finder.on( 'files:choose', function( evt ) {
						var file = evt.data.files.first();
						cur.prev().find('img').attr('src',file.getUrl());
						cur.prev().find('input').val(file.getUrl());
						cur.prev().addClass('active');
					} );
				}
			} );
		});

		jQuery('body').on('click','.background_image .image i',function(){
			var cur = jQuery(this).parent();
			if(confirm('Bạn muốn xóa ảnh này ?'))
			{
				cur.find('img').removeAttr('src');
				cur.removeClass('active');
				cur.next().next().val('');
			}
		});

		jQuery('form').on('submit',function(){
			var name = jQuery('form input[name=name]').val();
			if(name.length == 0)
			{
				alert("Tiêu đề trang không được để trống");
				return false;
			}

			var slug = jQuery('form input[name=slug]').val();
			if(slug.length == 0)
			{
				alert('Đường dẫn trang không được để trống');
				return false;
			}

			var background = jQuery('form input[name=background]').val();

			if(background.length == 0)
			{
				alert("Ảnh nền không được để trống");
				return false;
			}

			var sub_title = jQuery('form input[name=sub_title]').val();
			if(sub_title.length == 0)
			{
				alert("Tiêu đề nhỏ không được để trống");
				return false;
			}

			var description = jQuery('form textarea[name=description]').val();
			if(description.length == 0)
			{
				alert("Mô tả không được để trống");
				return false;
			}


		});


	})
</script>