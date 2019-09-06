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
</script>
@endsection