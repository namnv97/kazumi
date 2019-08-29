<style>
	.tab-content
	{
		padding: 15px;
		background: #fff;
		border: thin #ddd solid;
	}

	.list_faq .item
	{
		padding-bottom: 15px;
		border-bottom: thin #ddd solid;
		margin-bottom: 10px;
	}
</style>
<ul class="nav nav-tabs">
	<li class="active"><a data-toggle="tab" href="#shipping">Shipping</a></li>
	<li><a data-toggle="tab" href="#returnex">RETURNS & EXCHANGES</a></li>
	<li><a data-toggle="tab" href="#product">Product</a></li>
	<li><a data-toggle="tab" href="#payment">Payment</a></li>
	<li><a data-toggle="tab" href="#contact">Contact Us</a></li>
</ul>

<div class="tab-content">
	<div id="shipping" class="tab-pane fade in active">
		<div class="form-group">
			<label>Tiêu đề</label>
			<input type="text" name="shipping_title" placeholder="Tiêu đề" class="form-control">
		</div>
		<div class="list_faq">
		</div>
		<div class="text-right">
			<span class="btn btn-sm btn-info btn-add_question" data-value="shipping">Thêm</span>
		</div>
	</div>
	<div id="returnex" class="tab-pane fade in">
		<div class="form-group">
			<label>Tiêu đề</label>
			<input type="text" name="returnex_title" placeholder="Tiêu đề" class="form-control">
		</div>
		<div class="list_faq">
		</div>
		<div class="text-right">
			<span class="btn btn-sm btn-info btn-add_question" data-value="returnex">Thêm</span>
		</div>
	</div>
	<div id="product" class="tab-pane fade in">
		<div class="form-group">
			<label>Tiêu đề</label>
			<input type="text" name="product_title" placeholder="Tiêu đề" class="form-control">
		</div>
		<div class="list_faq">
		</div>
		<div class="text-right">
			<span class="btn btn-sm btn-info btn-add_question" data-value="product">Thêm</span>
		</div>
	</div>
	<div id="payment" class="tab-pane fade in">
		<div class="form-group">
			<label>Tiêu đề</label>
			<input type="text" name="payment_title" placeholder="Tiêu đề" class="form-control">
		</div>
		<div class="list_faq">
		</div>
		<div class="text-right">
			<span class="btn btn-sm btn-info btn-add_question" data-value="payment">Thêm</span>
		</div>
	</div>
	<div id="contact" class="tab-pane fade in">
		<div class="form-group">
			<label>Tiêu đề</label>
			<input type="text" name="contact_title" placeholder="Tiêu đề" class="form-control">
		</div>
		<div class="list_faq">
		</div>
		<div class="text-right">
			<span class="btn btn-sm btn-info btn-add_question" data-value="contact">Thêm</span>
		</div>
	</div>
</div>
<hr>
<div class="text-center form-group">
	<button class="btn btn-lg btn-primary" type="submit">Lưu</button>
</div>
<script type="text/javascript">
	jQuery(document).ready(function(){
		var asp = 0;
		jQuery('.btn-add_question').on('click',function(){
			var name = jQuery(this).data('value');
			jQuery(this).parent().prev().append(`
				<div class="item">
					<div class="form-group">
						<label>Câu hỏi</label>
						<input type="text" name="`+name+`_question[]" placeholder="Câu hỏi" class="form-control">
					</div>
					<div class="form-group">
						<label>Câu trả lời</label>
						<textarea name="`+name+`_anw[]" id="asp`+asp+`" class="form-control editor" rows="10" style="resize: none;" placeholder="Câu trả lời"></textarea>
					</div>
				</div>
				`);
			CKEDITOR.replace('asp'+asp);
			asp++;
		});

		jQuery('form').on('submit',function(){
			var err = 0;
			jQuery('form input').each(function(){
				var val = jQuery(this).val();
				if(val.length == 0)
				{
					jQuery(this).after('<p class="errors">Trường này không được để trống</p>');
					err ++;
				}
			});

			// jQuery('form textarea.editor').each(function(){
			// 	var val = jQuery(this).getData();
			// 	if(val.length == 0)
			// 	{
			// 		jQuery(this).after('<p class="errors">Trường này không được để trống</p>');
			// 		err ++;
			// 	}
			// })

			if(err > 0) return false;


		});


	});
</script>