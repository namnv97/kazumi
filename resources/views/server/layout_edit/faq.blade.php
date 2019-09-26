@extends('layouts.server')
@section('title')
Cập nhật trang
@endsection
@section('css')
<style>
	.template .item
	{
		display: inline-block;
		width: 33%;
		padding: 0 10px 10px 10px;
		margin-bottom: 15px;
		cursor: pointer;
	}

	.template .item:hover
	{
		background: #fff;
		-webkit-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
		-moz-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
		box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.75);
	}

	.template .item .image
	{
		height: 300px;
		overflow-y: auto;
	}

	.template .item .image img
	{
		width: 100%;
	}

	
	.template .item .image::-webkit-scrollbar-track
	{
		-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
		background-color: #F5F5F5;
	}

	.template .item .image::-webkit-scrollbar
	{
		width: 6px;
		background-color: #F5F5F5;
	}

	.template .item .image::-webkit-scrollbar-thumb
	{
		background-color: #000000;
	}
	
	p.errors
	{
		padding-left: 15px;
		color: red;
	}
	
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
@endsection
@section('content')
<div class="page-pages">
	<h1>Cập nhật trang</h1>
	@if(session('errors'))
	<div class="alert alert-warning">
		<i class="fa fa-times"></i>
		@foreach(session('errors')->all() as $msg)
		<p>{{$msg}}</p>
		@endforeach
	</div>
	@endif
	@if(session('msg'))
	<div class="alert alert-success">
		<i class="fa fa-times"></i>
		<p>{{session('msg')}}</p>
	</div>
	@endif
	<form action="{{route('admin.pages.post_edit_faq')}}" method="post">
		@csrf
		<input type="hidden" name="id" value="{{$page->id}}">
		<div class="form-group">
			<label>Tiêu đề trang</label>
			<input type="text" class="form-control" name="name" placeholder="Tiêu đề trang" value="{{$page->name}}">
		</div>
		<div class="form-group">
			<label>Đường dẫn trang</label>
			<input type="text" name="slug" placeholder="Đường dẫn trang" class="form-control" value="{{$page->slug}}">
		</div>
		<div class="page-content">
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
						<input type="text" name="shipping_title" placeholder="Tiêu đề" class="form-control" value="{{$shipping_title->meta_value}}">
					</div>
					<div class="list_faq">
						@if(count($shipping) > 0)
						@foreach($shipping as $sp)
						@php
						$item = json_decode($sp->meta_value,true);
						@endphp
						<div class="item">
							<div class="form-group">
								<label>Câu hỏi</label>
								<input type="text" name="shipping_question[]" placeholder="Câu hỏi" class="form-control" value="{{$item['question']}}">
							</div>
							<div class="form-group">
								<label>Câu trả lời</label>
								<textarea name="shipping_anw[]" class="form-control editor" rows="10" style="resize: none;" placeholder="Câu trả lời">{!! $item['anws'] !!}</textarea>
							</div>
						</div>
						@endforeach
						@endif
					</div>
					<div class="text-right">
						<span class="btn btn-sm btn-info btn-add_question" data-value="shipping">Thêm</span>
					</div>
				</div>
				<div id="returnex" class="tab-pane fade in">
					<div class="form-group">
						<label>Tiêu đề</label>
						<input type="text" name="returnex_title" placeholder="Tiêu đề" class="form-control" value="{{$returnex_title->meta_value}}">
					</div>
					<div class="list_faq">
						@if(count($returnex) > 0)
						@foreach($returnex as $sp)
						@php
						$item = json_decode($sp->meta_value,true);
						@endphp
						<div class="item">
							<div class="form-group">
								<label>Câu hỏi</label>
								<input type="text" name="returnex_question[]" placeholder="Câu hỏi" class="form-control" value="{{$item['question']}}">
							</div>
							<div class="form-group">
								<label>Câu trả lời</label>
								<textarea name="returnex_anw[]" class="form-control editor" rows="10" style="resize: none;" placeholder="Câu trả lời">{!! $item['anws'] !!}</textarea>
							</div>
						</div>
						@endforeach
						@endif
					</div>
					<div class="text-right">
						<span class="btn btn-sm btn-info btn-add_question" data-value="returnex">Thêm</span>
					</div>
				</div>
				<div id="product" class="tab-pane fade in">
					<div class="form-group">
						<label>Tiêu đề</label>
						<input type="text" name="product_title" placeholder="Tiêu đề" class="form-control" value="{{$product_title->meta_value}}">
					</div>
					<div class="list_faq">
						@if(count($product) > 0)
						@foreach($product as $sp)
						@php
						$item = json_decode($sp->meta_value,true);
						@endphp
						<div class="item">
							<div class="form-group">
								<label>Câu hỏi</label>
								<input type="text" name="product_question[]" placeholder="Câu hỏi" class="form-control" value="{{$item['question']}}">
							</div>
							<div class="form-group">
								<label>Câu trả lời</label>
								<textarea name="product_anw[]" class="form-control editor" rows="10" style="resize: none;" placeholder="Câu trả lời">{!! $item['anws'] !!}</textarea>
							</div>
						</div>
						@endforeach
						@endif
					</div>
					<div class="text-right">
						<span class="btn btn-sm btn-info btn-add_question" data-value="product">Thêm</span>
					</div>
				</div>
				<div id="payment" class="tab-pane fade in">
					<div class="form-group">
						<label>Tiêu đề</label>
						<input type="text" name="payment_title" placeholder="Tiêu đề" class="form-control" value={{$payment_title->meta_value}}>
					</div>
					<div class="list_faq">
						@if(count($payment) > 0)
						@foreach($payment as $sp)
						@php
						$item = json_decode($sp->meta_value,true);
						@endphp
						<div class="item">
							<div class="form-group">
								<label>Câu hỏi</label>
								<input type="text" name="payment_question[]" placeholder="Câu hỏi" class="form-control" value="{{$item['question']}}">
							</div>
							<div class="form-group">
								<label>Câu trả lời</label>
								<textarea name="payment_anw[]" class="form-control editor" rows="10" style="resize: none;" placeholder="Câu trả lời">{!! $item['anws'] !!}</textarea>
							</div>
						</div>
						@endforeach
						@endif
					</div>
					<div class="text-right">
						<span class="btn btn-sm btn-info btn-add_question" data-value="payment">Thêm</span>
					</div>
				</div>
				<div id="contact" class="tab-pane fade in">
					<div class="form-group">
						<label>Tiêu đề</label>
						<input type="text" name="contact_title" placeholder="Tiêu đề" class="form-control" value="{{$contact_title->meta_value}}">
					</div>
					<div class="list_faq">
						@if(count($contact) > 0)
						@foreach($contact as $sp)
						@php
						$item = json_decode($sp->meta_value,true);
						@endphp
						<div class="item">
							<div class="form-group">
								<label>Câu hỏi</label>
								<input type="text" name="contact_question[]" placeholder="Câu hỏi" class="form-control" value="{{$item['question']}}">
							</div>
							<div class="form-group">
								<label>Câu trả lời</label>
								<textarea name="contact_anw[]" class="form-control editor" rows="10" style="resize: none;" placeholder="Câu trả lời">{!! $item['anws'] !!}</textarea>
							</div>
						</div>
						@endforeach
						@endif
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
		</div>
	</form>
</div>
@endsection
@section('script')
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('.template .item').on('click',function(){
			if(confirm("Layout sẽ chỉ được chọn 1 lần. Bạn chắc chắn chọn layout này ?"))
			{
				var template = jQuery(this).data('template');
				jQuery('form').attr('action','{{route('admin.pages.index')}}'+'/'+template);
				jQuery('form').prepend('<input type="hidden" name="template" value="'+template+'">');
				jQuery.ajax({
					url: '{{route('admin.pages.get_template')}}',
					type: 'get',
					dataType: 'html',
					data: {
						template: template
					},
					beforeSend: function(){

					},
					success: function(res){
						jQuery('.page-content').html(res);
						jQuery('.template').remove();
					},
					errors: function(e){
						console.log(e);
					}
				});
			}
		});

		jQuery('input[name=name]').on('change',function(){
			var name = jQuery(this).val();
			jQuery('input[name=slug]').val(ChangeToSlug(name));
			jQuery('input[name=slug]').trigger('change');
		});

		jQuery('input[name=slug]').on('change',function(){
			jQuery('form').find('.errors').remove();
			var slug = jQuery(this).val();
			jQuery.ajax({
				url: '{{route('admin.pages.check_slug')}}',
				type: 'get',
				dataType: 'json',
				data: {
					slug: slug
				},
				beforeSend: function(){

				},
				success: function(res){
					if(res.status == 'errors')
					{
						jQuery('input[name=slug]').after('<p class="errors">'+res.msg+'</p>');
					}
				},
				errors: function(e){
					console.log(e);
				}
			});
		});
	});

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
						<textarea name="`+name+`_anw[]" id="asp`+asp+`" class="form-control" rows="10" style="resize: none;" placeholder="Câu trả lời"></textarea>
					</div>
				</div>
				`);
			CKEDITOR.replace('asp'+asp);
			asp++;
		});

		jQuery('form').on('submit',function(){
			jQuery('form .errors').remove();
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
			// 	console.log(val);
			// 	if(val.length == 0)
			// 	{
			// 		jQuery(this).after('<p class="errors">Trường này không được để trống</p>');
			// 		err ++;
			// 	}
			// })

			if(err > 0)
			{
				alert("Có thông tin sai. Vui lòng kiểm tra lại");
				return false;
			}


		});

		CKEDITOR.replaceClass = "editor";


	});
</script>
@endsection