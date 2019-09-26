@extends('layouts.server')
@section('title')
{{!empty($head_title)?$head_title:'Form Data'}}
@endsection
@section('css')
<style>
	select[name=form_name]
	{
		max-width: 250px;
	}
</style>
@endsection
@section('content')
<div class="page-forms">
	<h1>{{!empty($head_title)?$head_title:'Form Data'}}</h1>
	<div class="form">
		<form action="{{route('admin.forms.index')}}" method="get">
			<select name="form_name" class="form-control">
				<option value="">Chọn FormData</option>
				<option value="contact" {{(request()->form_name == 'contact')?'selected':FALSE}}>Form Liên hệ</option>
				<option value="register" {{(request()->form_name == 'register')?'selected':FALSE}}>Form Đăng ký Email</option>
				<option value="retail" {{(request()->form_name == 'retail')?'selected':FALSE}}>Form Đăng ký Đại lý</option>
				<option value="program" {{(request()->form_name == 'program')?'selected':FALSE}}>Form Đăng ký Chương trình</option>
			</select>
		</form>
	</div>
	<div class="content_form">
		@if(!empty(request()->form_name))
		@include('server.form.'.request()->form_name)
		@endif
	</div>
</div>
@endsection
@section('script')
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('select[name=form_name]').on('change',function(){
			jQuery(this).parents('form').submit();
		});
	})
	jQuery('body').on('click','.btn-delete',function(){
		if(confirm("Bạn muốn xóa bản ghi này ?"))
		{
			var id = jQuery(this).data('value');
			jQuery.ajax({
				headers: {
					'X-CSRF-TOKEN': '{{ csrf_token() }}',
				},
				url: '{{route('admin.forms.delete')}}',
				type: 'post',
				dataType: 'json',
				data: {
					id: id,
					_method: 'DELETE'
				},
				beforeSend: function(){

				},
				success: function(res){
					if(res.status == 'success') location.reload();
					else alert("Có lỗi xảy ra. Vui lòng thử lại");
				},
				errors: function(errors){
					console.log(errors);
				}
			});
		}
	})
</script>
@endsection