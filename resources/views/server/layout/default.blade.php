<div class="form-group">
	<label>Nội dung</label>
	<textarea name="page_content" id="page_content" rows="10" class="form-control"></textarea>
</div>
<hr>
<div class="text-center">
	<button class="btn btn-md btn-primary" type="submit">Thêm</button>
</div>
<script type="text/javascript">
	jQuery(document).ready(function(){
		CKEDITOR.replace('page_content');
	})
</script>