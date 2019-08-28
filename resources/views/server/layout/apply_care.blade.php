<style>
	#banner
	{
		display: none;
		position: relative;
		margin-bottom: 10px;
	}

	#banner.active
	{
		display: block;
	}

	#banner img
	{
		width: 100%;
		max-width: 100%;
	}

	#banner i
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

	.list_apply .item
	{
		padding-bottom: 15px;
		border-bottom: thin #ddd solid;
		margin-bottom: 15px;
	}

	.list_apply .image
	{
		display: table-cell;
		width: 30%;
	}

	.list_apply .image .img
	{
		display: none;
		position: relative;
	}

	.list_apply .image .img img
	{
		width: 100%;
	}

	.list_apply .image .img.active
	{
		display: block;
	}

	.list_apply .image label
	{
		display: block;
	}

	.list_apply .image .img i
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

	.list_apply .item .text
	{
		display: table-cell;
		width: 60%;
	}

	.list_apply .item .remove
	{
		display: table-cell;
		text-align: center;
		width: 10%;
		vertical-align: middle;
	}

	.list_apply .item .remove i
	{
		cursor: pointer;
		font-size: 20px;
		color: red;
	}

	.tab-content
	{
		padding: 15px;
		background: #fff;
		border: thin #ddd solid;
	}

	



</style>

	<ul class="nav nav-tabs">
		<li class="active"><a data-toggle="tab" href="#tab_banner">Banner</a></li>
		<li><a data-toggle="tab" href="#apply">Sử dụng</a></li>
		<li><a data-toggle="tab" href="#remove">Xóa bỏ</a></li>
		<li><a data-toggle="tab" href="#care">Chăm sóc</a></li>
	</ul>

	<div class="tab-content">
		<div id="tab_banner" class="tab-pane fade in active">
			<div class="form-group">
				<label>Banner</label>
				<div id="banner">
					<img>
					<i class="fa fa-times"></i>
				</div>
				<span class="btn btn-success btn-sm btn-add_banner">Chọn ảnh</span>
				<input type="hidden" name="banner">
			</div>
			<div class="form-group">
				<label>Tiêu đề</label>
				<input type="text" name="page_title" class="form-control" placeholder="Tiêu đề">
			</div>
			<div class="form-group">
				<label>Mô tả ngắn</label>
				<input type="text" name="description" class="form-control" placeholder="Mô tả ngắn">
			</div>
		</div>
		<div id="apply" class="tab-pane fade">
			<div class="form-group">
				<label>Video</label>
				<input type="text" name="apply_video" class="form-control" placeholder="Link Video Youtube">
			</div>
			<h3>Các bước</h3>
			<div class="list_apply">
				<div class="text-right">
					<span class="btn btn-sm btn-info add_more" data-name="apply_content[]" data-image="apply_image[]">Thêm bước</span>
				</div>
			</div>
		</div>
		<div id="remove" class="tab-pane fade">
			<div class="form-group">
				<h3>Các bước</h3>
				<div class="list_apply">
					<div class="text-right">
						<span class="btn btn-sm btn-info add_more" data-name="remove_content[]" data-image="remove_image[]">Thêm bước</span>
					</div>
				</div>
			</div>
		</div>
		<div id="care" class="tab-pane fade">
			<div class="form-group">
				<h3>Các bước</h3>
				<div class="list_apply">
					<div class="text-right">
						<span class="btn btn-sm btn-info add_more" data-name="care_content[]" data-image="care_image[]">Thêm bước</span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<hr>
	<div class="form-group text-center">
		<button class="btn btn-lg btn-primary" type="submit">Lưu</button>
	</div>
</div>

<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('.btn-add_banner').click(function(){
			CKFinder.popup( {
				chooseFiles: true,
				onInit: function( finder ) {
					finder.on( 'files:choose', function( evt ) {
						var file = evt.data.files.first();
						jQuery('#banner img').attr('src',file.getUrl());
						jQuery('input[name=banner]').val(file.getUrl());
						jQuery('#banner').addClass('active');
					} );
				}
			} );
		});


		jQuery('body').on('click','.list_apply .btn-add_image',function(){
			var cur = jQuery(this);
			CKFinder.popup( {
				chooseFiles: true,
				onInit: function( finder ) {
					finder.on( 'files:choose', function( evt ) {
						var file = evt.data.files.first();
						cur.prev().find('img').attr('src',file.getUrl());
						cur.next().val(file.getUrl());
						cur.prev().addClass('active');
					} );
				}
			} );
		});

		jQuery('body').on('click','.list_apply .image i',function(){
			var cur = jQuery(this).parent();
			if(confirm('Bạn muốn xóa ảnh này ?'))
			{
				cur.find('img').removeAttr('src');
				cur.removeClass('active');
				cur.next().next().val('');
			}
		});

		jQuery('#banner').on('click','i',function(){
			if(confirm("Bạn muốn xóa ảnh này ?"))
			{
				jQuery('#banner').removeClass('active');
				jQuery('input[name=banner]').val('');

			}
		})

		var auj = 0;
		jQuery('.add_more').on('click',function(){
			var image = jQuery(this).data('image');
			var content = jQuery(this).data('name');
			jQuery(this).parent().before(`
				<div class="item">
				<div class="image">
				<label>Hình ảnh</label>
				<div class="img">
				<img>
				<i class="fa fa-times"></i>
				</div>
				<span class="btn btn-sm btn-success btn-add_image">Chọn ảnh</span>
				<input type="hidden" name="`+image+`">
				</div>
				<div class="text">
				<label>Nội dung</label>
				<textarea name="`+content+`" rows="10" class="editor" id="app`+auj+`"></textarea>
				</div>
				<div class="remove"><i class="fa fa-trash"></i></div>
				</div>
				`);
			CKEDITOR.replace('app'+auj);
			auj ++;
		});

		jQuery('.list_apply').on('click','.remove i',function(){
			if(confirm("Bạn muốn xóa bước này ?"))
			{
				jQuery(this).parents('.item').remove();
			}
		});

		jQuery('form').on('submit',function(){
			var name = jQuery('input[name=name]').val();
			if(name.length == 0)
			{
				alert("Tiêu đề không được để trông");
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
				alert("Banner không được để trống");
				return false;
			}

			var page_title = jQuery('input[name=page_title]').val();
			if(page_title.length == 0)
			{
				alert('Tiêu đề banner không được để trống');
				return false;
			}

			var err = jQuery('form').find('.errors');
			if(err.length > 0) return false;


		});
	})
</script>