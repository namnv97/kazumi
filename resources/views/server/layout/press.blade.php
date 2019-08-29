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
	
	.content-partner .item
	{
		display: inline-block;
		width: 15%;
		margin-right: 10px;
		position: relative;
	}

	.content-partner .item img
	{
		width: 100%;
	}

	.content-partner .item i
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

	.list_user .item
	{
		display: flex;
		align-items: flex-start;
		margin-bottom: 15px;
	}

	.list_user .item .image
	{
		width: 30%;
	}

	.list_user .item .image .img
	{
		display: none;
	}

	.list_user .item .image .img.active
	{
		display: block;
		position: relative;
	}

	.list_user .item .image .img img
	{
		max-width: 100%;
	}

	.list_user .item .image .img i
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

	.list_user .item .text
	{
		width: 60%;
		padding: 0 30px;
	}
	
	.list_user .item .remove
	{
		width: 10%;
		text-align: center;
		padding-top: 30px;
	}

</style>
<ul class="nav nav-tabs">
	<li class="active"><a data-toggle="tab" href="#tab_banner">Banner</a></li>
	<li><a data-toggle="tab" href="#partner">Đối tác</a></li>
	<li><a data-toggle="tab" href="#user">Người dùng</a></li>
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
		<div class="form-group">
			<label>Mô tả</label>
			<textarea name="page_description" rows="5" class="form-control" style="resize: none;" placeholder="Mô tả"></textarea>
		</div>
	</div>
	<div id="partner" class="tab-pane fade in">
		<div class="form-group">
			<label>Danh sách đối tác</label>
			<div class="content-partner">
				
			</div>
			<span class="btn btn-sm btn-info add-partner">Thêm ảnh</span>
		</div>
	</div>
	<div id="user" class="tab-pane fade in">
		<div class="form-group">
			<label>Tiêu đề</label>
			<input type="text" name="as_title" placeholder="Tiêu đề" class="form-control">
		</div>
		<div class="form-group">
			<label>Danh sách người dùng</label>
			<div class="list_user">
				
			</div>
			<span class="btn btn-sm btn-info btn-user">Thêm người dùng</span>
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

		jQuery('.add-partner').click(function(){
			var cur = jQuery(this).prev();
			CKFinder.popup( {
				chooseFiles: true,
				onInit: function( finder ) {
					finder.on( 'files:choose', function( evt ) {
						var file = evt.data.files;
						file.forEach(function(e){
							cur.append(`
								<div class="item">
									<img src="`+e.getUrl()+`">
									<input type="hidden" name="partner[]" value="`+e.getUrl()+`">
									<i class="fa fa-times"></i>
								</div>
								`);
						});
					} );
				}
			} );
		});

		jQuery('.content-partner').on('click','.item i',function(){
			if(confirm("Bạn muốn xóa ảnh này ?"))
			{
				jQuery(this).parent().remove();
			}
		})

		jQuery('.list_user').on('click','.item .image span.btn-add__image',function(){
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
		})

		jQuery('.list_user').on('click','.item .image .img i',function(){
			if(confirm("Bạn muốn xóa ảnh này ?"))
			{
				jQuery(this).parent().removeClass('active');
				jQuery(this).parent().find('img').removeAttr('src');
				jQuery(this).parent().find('input').val('');
			}
		});



		var asid = 0;
		jQuery('.btn-user').click(function(){
			jQuery(this).prev().append(`
				<div class="item">
					<div class="image">
						<div class="img">
							<img src="" alt="">
							<input type="hidden" name="as_image[]">
							<i class="fa fa-times"></i>
						</div>
						<span class="btn btn-sm btn-info btn-add__image">Chọn ảnh</span>
					</div>
					<div class="text">
						<textarea name="as_content[]" rows="5" id="as`+asid+`" placeholder="Nội dung"></textarea>
					</div>
					<div class="remove">
						<span class="btn btn-sm btn-danger fa fa-trash"></span>
					</div>
				</div>
				`);

			CKEDITOR.replace('as'+asid);
			asid ++;
		});

		jQuery('.list_user').on('click','.item .remove span.fa-trash',function(){
			Swal.fire({
				title: 'Bạn muốn xóa người dùng này?',
				type: 'success',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Xóa',
				cancelButttonText: 'Hủy'
			}).then((result) => {
				if (result.value) {
					jQuery(this).parents('.item').remove();
				}
			})
		});

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
				alert("Banner không được để trống");
				return false;
			}

			var page_title = jQuery('input[name=page_title]').val();
			if(page_title.length == 0)
			{
				alert("Tiêu đề không được để trống");
				return false;
			}

			var page_description = jQuery('input[name=page_description]').val();
			if(page_description.length == 0)
			{
				alert("Mô tả không được để trống");
				return false;
			}

			var as_title = jQuery('input[name=as_title]').val();
			if(as_title.length == 0)
			{
				alert("Tiêu đề người dùng không được để trống");
				return false;
			}

			var err = jQuery('form').find('.errors');
			if(err.length > 0)
			{
				alert("Có thông tin không hợp lệ. Vui lòng kiểm tra lại");
				return false;
			}
		});



	});
</script>
