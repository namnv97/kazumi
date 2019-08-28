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

	.tab-content
	{
		padding: 15px;
		background: #fff;
		border: thin #ddd solid;
	}
	

	#list_program .item .img
	{
		display: none;
		position: relative;
		margin-bottom: 10px;
	}

	#list_program .item .img img
	{
		width: 100%;
	}

	#list_program .item .img i
	{
		position: absolute;
		top: 0;
		right: 0;
		padding: 5px;
		border-radius: 100%;
		background: #fff;
		color: #000;
		font-weight: bold;
		cursor: pointer;
	}
	
	#list_program .item .img.active
	{
		display: block;
	}

	#list_program .item label
	{
		display: block;
	}

	#list_program .item
	{
		display: flex;
		align-items: flex-start;
		margin-bottom: 15px;
	}

	#list_program .item .image
	{
		width: 15%;
	}

	#list_program .item .txt
	{
		width: 60%;
		padding: 0 30px;
	}

	#list_program .item .remove
	{
		width: 10%;
		padding-top: 30px;
	}

</style>

<ul class="nav nav-tabs">
	<li class="active"><a data-toggle="tab" href="#tab_banner">Banner</a></li>
	<li><a data-toggle="tab" href="#pro">Nội dung</a></li>
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
			<input type="text" name="page_title" placeholder="Tiêu đề" class="form-control">
		</div>
		<diiv class="form-group">
			<label>Mô tả</label>
			<textarea name="page_description" rows="5" class="form-control" style="resize: none;" placeholder="Mô tả"></textarea>
		</diiv>
	</div>
	<div id="pro" class="tab-pane fade in">
		<div class="form-group">
			<label>Tiêu đề</label>
			<input type="text" name="pro_title" placeholder="Tiêu đề" class="form-control">
		</div>
		<div class="form-group">
			<label>Mô tả</label>
			<textarea name="pro_description" rows="5" class="form-control" placeholder="Mô tả" style="resize: none;"></textarea>
		</div>
		<div class="form-group">
			<label>Các chương trình</label>
			<div id="list_program">
				<div class="text-right">
					<span class="btn btn-sm btn-info btn-more">Thêm</span>
				</div>
			</div>
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

		jQuery('#banner').on('click','i',function(){
			if(confirm("Bạn muốn xóa ảnh này ?"))
			{
				jQuery('#banner').removeClass('active');
				jQuery('input[name=banner]').val('');

			}
		})

		jQuery('#list_program').on('click','.item .image span.btn-add_program',function(){
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

		jQuery('#list_program').on('click','.item .image .img i',function(){
			var cur = jQuery(this).parent();
			if(confirm("Bạn muốn xóa ảnh này ?"))
			{
				cur.removeClass('active');
				cur.find('img').removeAttr('src');
				cur.find('input').val('');
			}
		});

		jQuery('#list_program').on('click','.item span.fa-trash',function(){
			if(confirm("Bạn muốn xóa dòng này ?"))
			{
				jQuery(this).parents('.item').first().remove();
			}
		});

		jQuery('#list_program').on('click','span.btn-more',function(){
			var i = 0;
			jQuery('#list_program .item').each(function(){
				i ++;
			});
			if(i > 2) return false;
			jQuery(this).parent().before(`
				<div class="item">
					<div class="image">
						<label>Hình ảnh</label>
						<div class="img">
							<img src="" alt="">
							<input type="hidden" name="program_img[]">
							<i class="fa fa-times"></i>
						</div>
						<span class="btn btn-sm btn-info btn-add_program">Chọn ảnh</span>
					</div>
					<div class="txt">
						<label>Text</label>
						<input type="text" name="program_name[]" class="form-control" placeholder="Text">
					</div>
					<div class="remove">
						<span class="btn btn-sm btn-danger fa fa-trash"></span>
					</div>
				</div>
				`);
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

			var pro_title = jQuery('input[name=pro_title]').val();
			if(pro_title.length == 0)
			{
				alert("Tiêu đề chương trình không được để trống");
				return false;
			}
		})
	})
</script>