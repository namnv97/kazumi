<style>
	#banner, #banner_title
	{
		display: none;
		position: relative;
		margin-bottom: 10px;
	}

	#banner.active, #banner_title.active
	{
		display: block;
	}

	#banner img, #banner_title img
	{
		width: 100%;
		max-width: 100%;
	}

	#banner i, #banner_title i, #earn_image i
	{
		position: absolute;
		top: 0;
		right: 0;
		padding: 5px;
		display: inline-block;
		border-radius: 100%;
		background: #fff;
		color: #000;
		font-weight: bold;
		cursor: pointer;
	}

	.tab-content
	{
		padding: 15px;
		background: #fff;
		border: thin #ddd solid;
	}
	
	#tab_banner label, #shop label
	{
		display: block;
	}
	
	#earn_image
	{
		display: none;
		width: 300px;
		position: relative;
	}

	#earn_image.active
	{
		display: block;
	}

	#earn_image img
	{
		width: 100%;
	}





</style>


<ul class="nav nav-tabs">
	<li class="active"><a data-toggle="tab" href="#tab_banner">Banner</a></li>
	<li><a data-toggle="tab" href="#shop">Mua hàng - Tích điểm</a></li>
</ul>

<div class="tab-content">
	<div id="tab_banner" class="tab-pane fade in active">
		<div class="form-group">
			<label>Banner</label>
			<div id="banner">
				<img>
				<i class="fa fa-times remove"></i>
				<input type="hidden" name="banner">
			</div>
			<span class="btn btn-success btn-sm btn-add_banner">Chọn ảnh</span>
		</div>
		<div class="form-group">
			<label>Banner tiêu đề</label>
			<div id="banner_title">
				<img>
				<input type="hidden" name="banner_title">
				<i class="fa fa-times remove"></i>
			</div>
			<span class="btn btn-success btn-sm btn-add_banner">Chọn ảnh</span>
		</div>
	</div>
	<div id="shop" class="tab-pane fade in">
		<div class="form-group">
			<label>Tiêu đề</label>
			<input type="text" name="earn_title" placeholder="Tiêu đề" class="form-control">
		</div>
		<div class="form-group">
			<label>Mô tả</label>
			<textarea name="earn_description" rows="5" placeholder="Mô tả" class="form-control" style="resize: none;"></textarea>
		</div>
		<div class="form-group">
			<label>Hình ảnh</label>
			<div id="earn_image">
				<img src="" alt="">
				<input type="hidden" name="earn_img">
				<i class="fa fa-times remove"></i>
			</div>
			<span class="btn btn-sm btn-info btn-add_banner">Chọn ảnh</span>
		</div>
	</div>
</div>
<hr>
<div class="form-group text-center">
	<button class="btn btn-lg btn-primary" type="submit">Lưu</button>
</div>

<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('.btn-add_banner').click(function(){
			var cur = jQuery(this).prev();
			CKFinder.popup( {
				chooseFiles: true,
				onInit: function( finder ) {
					finder.on( 'files:choose', function( evt ) {
						var file = evt.data.files.first();
						cur.find('img').attr('src',file.getUrl());
						cur.find('input').val(file.getUrl());
						cur.addClass('active');
					} );
				}
			} );
		});

		jQuery('.tab-content').on('click','i.remove',function(){
			if(confirm("Bạn muốn xóa ảnh này ?"))
			{
				jQuery(this).parent().removeClass('active');
				jQuery(this).parent().find('input').val('');
				jQuery(this).parent().find('img').removeAttr('src');

			}
		})

		jQuery('form').on('submit',function(){
			var name = jQuery('input[name=name]').val();
			if(name.length == 0)
			{
				alert("Tiêu đề trang không được để trống");
				return false;
			}

			var slug = jQuery('input[name=slug]').val();
			if(slug.length == 0)
			{
				alert("Đường dẫn trang không được để trống");
				return false;
			}

			var banner = jQuery('input[name=banner]').val();
			if(banner.length == 0)
			{
				alert('Banner không được để trống');
				return false;
			}

			var banner_title = jQuery('input[name=banner_title]').val();
			if(banner_title.lenth == 0)
			{
				alert("Banner tiêu đề không được để trống");
				return false;
			}

			var earn_title = jQuery('input[name=earn_title]').val();
			if(earn_title.length == 0)
			{
				alert("Tiêu đề tích điểm không được để trống");
				return false;
			}

			var err = jQuery('form').find('.errors');
			if(err.length > 0)
			{
				alert("Có thông tin chưa chính xác. Vui lòng kiểm tra lại các thông tin.");
				return false;
			}

		})
	})
</script>