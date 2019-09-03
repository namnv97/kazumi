@extends('layouts.server')
@section('title')
Thiết lập Menu
@endsection
@section('css')
<style>
	.list_choose .list
	{
		margin-bottom: 15px;
		border-bottom-right-radius: 10px;
		border-bottom-left-radius: 10px;
		background: #fff;
		border: thin #ddd solid;
	}

	.list_choose .list h3
	{
		text-align: center;
		margin: 0;
		background: #eee;
		color: #000;
		font-weight: bold;
		padding: 5px 0;
		cursor: pointer;
	}

	.list_choose .list ul
	{
		padding: 0;
		margin: 0;
		display: none;
	}

	.list_choose .list ul li
	{
		border-bottom: thin #ddd solid;
		cursor: pointer;
		list-style-type: square;
		list-style: none;
	}
	
	.list_choose .list ul li.active
	{
		background: #3c8dbc;
		color: #fff;
	}

	.list_choose .list ul li span
	{
		display: block;
		padding: 5px 0;
		text-align: center;
	}

	.add-to-menu
	{
		margin: 10px;
	}

	.loading
	{
		display: none;
	}

	.loading.active
	{
		display: inline-block;
	}

	/*Nested Sortable*/
		#demo pre,code {
			font-size: 12px;
		}

		#demo pre {
			width: 100%;
			overflow: auto;
		}

		#demo small {
			font-size: 90%;
		}

		#demo small code {
			font-size: 11px;
		}

		#demo .placeholder {
			outline: 1px dashed #4183C4;
		}

		#demo .mjs-nestedSortable-error {
			background: #fbe3e4;
			border-color: transparent;
		}

		.sortable #tree {
			width: 550px;
			margin: 0;
		}

		#demo ol {
			padding-left: 25px;
		}

		#demo ol.sortable,ol.sortable ol {
			list-style-type: none;
		}

		#demo li div {
			border: 1px solid #d4d4d4;
			-webkit-border-radius: 3px;
			-moz-border-radius: 3px;
			border-radius: 3px;
			cursor: move;
			border-color: #D4D4D4 #D4D4D4 #BCBCBC;
			margin: 0;
			padding: 3px;
		}

		#demo li.mjs-nestedSortable-collapsed.mjs-nestedSortable-hovering div {
			border-color: #999;
		}

		#demo .disclose, .expandEditor {
			cursor: pointer;
			width: 20px;
			display: none;
		}

		#demo li.mjs-nestedSortable-collapsed > ol {
			display: none;
		}

		#demo li.mjs-nestedSortable-branch > div > .disclose {
			display: inline-block;
		}

		#demo span.ui-icon {
			display: inline-block;
			margin: 0;
			padding: 0;
		}

		#demo .menuDiv {
			background: #EBEBEB;
		}

		#demo .menuEdit {
			background: #FFF;
		}

		#demo .itemTitle {
			vertical-align: middle;
			cursor: pointer;
		}

		#demo .deleteMenu {
			float: right;
			cursor: pointer;
		}

		#demo code {
			background: #e5e5e5;
		}

		#demo input {
			vertical-align: text-bottom;
		}

		#demo .notice {
			color: #c33;
		}
		/*End*/



	</style>
	@endsection
	@section('content')

	<div class="page-settings">
		<h1>Thiết lập Menu</h1>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
				<div class="list_choose">
					<div class="list">
						<h3>Danh mục</h3>
						<ul>
							@if(count($collections) > 0)
							@foreach($collections as $collection)
							<li data-url="{{$collection->slug}}">
								<span>{{$collection->name}}</span>
							</li>
							@endforeach
							<li class="text-right">
								<button class="btn btn-sm btn-primary add-to-menu">Thêm</button>
							</li>
							@endif
						</ul>

					</div>
					<div class="list">
						<h3>Trang</h3>
						<ul>
							@if(count($pages) > 0)
							@foreach($pages as $page)
							<li data-url="{{route('client.page.index',['slug' => $page->slug])}}">
								<span>{{$page->name}}</span>
							</li>
							@endforeach
							<li class="text-right">
								<button class="btn btn-sm btn-primary add-to-menu">Thêm</button>
							</li>
							@endif
						</ul>
					</div>
					<div class="list">
						<h3>Sản phẩm</h3>
						<ul>
							@if(count($products) > 0)
							@foreach($products as $product)
							<li data-url="{{$product->slug}}">
								<span>{{$product->name}}</span>
							</li>
							@endforeach
							<li class="text-right">
								<button class="btn btn-sm btn-primary add-to-menu">Thêm</button>
							</li>
							@endif
						</ul>
					</div>
					<div class="list">
						<h3>Bài viết</h3>
						<ul>
							@if(count($articles) > 0)
							@foreach($articles as $articles)
							<li data-url="{{$page->slug}}">
								<span>{{$page->title}}</span>
							</li>
							@endforeach
							<li class="text-right">
								<button class="btn btn-sm btn-primary add-to-menu">Thêm</button>
							</li>
							@endif
						</ul>
					</div>
					<div class="list">
						<h3>Linh tùy chọn</h3>
						<ul class="custom_link">
							<input type="text" class="form-control" placeholder="Tiêu đề">
							<input type="text" class="form-control" placeholder="Đường dẫn">
							<li class="text-right">
								<button class="custom-add-to-menu btn btn-sm btn-primary">Thêm</button>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
				<h3 class="text-center">Main menu</h3>

				<section id="demo">
					<ol class="sortable ui-sortable mjs-nestedSortable-branch mjs-nestedSortable-expanded">
						@if(!empty($menus))
						@php
						$menus = json_decode($menus->meta_value,true)
						@endphp
						@foreach($menus as $key => $menu)
						<li style="display: list-item;" class="mjs-nestedSortable-leaf" id="menuItem_{{$key}}">
							<div class="menuDiv">
								<span title="Click to show/hide children" class="disclose ui-icon ui-icon-minusthick">
									<span></span>
								</span>
								<span title="Click to show/hide item editor" data-id="3" class="expandEditor ui-icon ui-icon-triangle-1-n">
									<span></span>
								</span>
								<span>
									<span data-id="{{$key}}" data-href="{{$menu['url']}}" class="itemTitle">{{$menu['text']}}</span>
									<span title="Click to delete item." data-id="{{$key}}" class="deleteMenu ui-icon ui-icon-closethick">
										<span></span>
									</span>
								</span>
								<div id="key{{$key}}" class="menuEdit">
									<p>
										Link gốc: <a href="{{$menu['url']}}">{{$menu['url']}}</a>
									</p>
								</div>
							</div>
							@if(isset($menu['children']))
							<ol>
								@foreach($menu['children'] as $keyy => $item)
								<li style="display: list-item;" class="mjs-nestedSortable-leaf" id="menuItem_{{$keyy}}">
									<div class="menuDiv">
										<span title="Click to show/hide children" class="disclose ui-icon ui-icon-minusthick">
											<span></span>
										</span>
										<span title="Click to show/hide item editor" data-id="3" class="expandEditor ui-icon ui-icon-triangle-1-n">
											<span></span>
										</span>
										<span>
											<span data-id="{{$key}}" data-href="{{$item['url']}}" class="itemTitle">{{$item['text']}}</span>
											<span title="Click to delete item." data-id="{{$keyy}}" class="deleteMenu ui-icon ui-icon-closethick">
												<span></span>
											</span>
										</span>
										<div id="keyy{{$keyy}}" class="menuEdit">
											<p>
												Link gốc: <a href="{{$item['url']}}">{{$item['url']}}</a>
											</p>
										</div>
									</div>
								</li>
								@endforeach
							</ol>
							@endif
						</li>
						@endforeach

						@endif
					</ol>
					<div class="text-center">
						<img src="{{asset('/assets/uploads/images/loading.gif')}}" alt="loading" style="width: 30px;height: 30px;" class="loading"><button class="btn btn-md btn-primary btn__submit">Lưu</button>
					</div>
				</section>
			</div>
		</div>
	</div>

	@endsection
	@section('script')
	<script type="text/javascript" src="{{asset('/assets/admin/js/nested.sortable.js')}}"></script>
	<script>
		function load_menu()
		{
			$().ready(function(){
				var ns = $('ol.sortable').nestedSortable({
					forcePlaceholderSize: true,
					handle: 'div',
					helper:	'clone',
					items: 'li',
					opacity: .6,
					placeholder: 'placeholder',
					revert: 250,
					tabSize: 25,
					tolerance: 'pointer',
					toleranceElement: '> div',
					maxLevels: 2,
					isTree: true,
					expandOnHover: 700,
					startCollapsed: false,
					excludeRoot: true,
					rootID:"root"
				});

				$('.expandEditor').attr('title','Click to show/hide item editor');
				$('.disclose').attr('title','Click to show/hide children');
				$('.deleteMenu').attr('title', 'Click to delete item.');

				$('.disclose').on('click', function() {
					$(this).closest('li').toggleClass('mjs-nestedSortable-collapsed').toggleClass('mjs-nestedSortable-expanded');
					$(this).toggleClass('ui-icon-plusthick').toggleClass('ui-icon-minusthick');
				});

				$('.expandEditor, .itemTitle').click(function(){
					var id = $(this).attr('data-id');
					$('#menuEdit'+id).toggle();
					$(this).toggleClass('ui-icon-triangle-1-n').toggleClass('ui-icon-triangle-1-s');
				});

				$('.deleteMenu').click(function(){
					var id = $(this).attr('data-id');
					$('#menuItem_'+id).remove();
				});
			});	
		}	

		load_menu();
	</script>
	<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery('.list_choose .list h3').on('click',function(){
				if(jQuery(this).hasClass('active'))
				{
					jQuery(this).next().slideUp(400);
					jQuery(this).removeClass('active');
				}
				else
				{
					jQuery(this).addClass('active');
					jQuery(this).next().slideDown(400);
				}
			});


			jQuery('.list_choose .list ul li').not('.text-right').on('click',function(){
				jQuery(this).parent().find('li').not('.text-right').removeClass('active');
				jQuery(this).addClass('active');
			});

			var i = 100;

			jQuery('.add-to-menu').on('click',function(){
				var url = jQuery(this).parents('ul').first().find('li.active').data('url');
				var text = jQuery(this).parents('ul').first().find('li.active').find('span').text();
				if(typeof url !== "undefined" && text.length > 0)
				{
					jQuery('ol.sortable').append(`
						<li style="display: list-item;" class="mjs-nestedSortable-leaf" id="menuItem_`+i+`">
						<div class="menuDiv">
						<span title="Click to show/hide children" class="disclose ui-icon ui-icon-minusthick">
						<span></span>
						</span>
						<span title="Click to show/hide item editor" data-id="3" class="expandEditor ui-icon ui-icon-triangle-1-n">
						<span></span>
						</span>
						<span>
						<span data-id="`+i+`" data-href="`+url+`" class="itemTitle">`+text+`</span>
						<span title="Click to delete item." data-id="`+i+`" class="deleteMenu ui-icon ui-icon-closethick">
						<span></span>
						</span>
						</span>
						<div id="`+i+`" class="menuEdit">
						<p>
						Link gốc: <a href="`+url+`">`+url+`</a>
						</p>
						</div>
						</div>
						</li>
						`);
					jQuery(this).parents('ul').first().find('li.active').removeClass('active');
					load_menu();
					i ++;
				}
			});

			jQuery('.custom-add-to-menu').on('click',function(){
				var text = jQuery(this).parents('.custom_link').find('input').first().val();
				var url = jQuery(this).parents('.custom_link').find('input').last().val();
				if(url.length > 0 && text.length > 0)
				{
					jQuery('ol.sortable').append(`
						<li style="display: list-item;" class="mjs-nestedSortable-leaf" id="menuItem_`+i+`">
						<div class="menuDiv">
						<span title="Click to show/hide children" class="disclose ui-icon ui-icon-minusthick">
						<span></span>
						</span>
						<span title="Click to show/hide item editor" data-id="3" class="expandEditor ui-icon ui-icon-triangle-1-n">
						<span></span>
						</span>
						<span>
						<span data-id="`+i+`" data-href="`+url+`" class="itemTitle">`+text+`</span>
						<span title="Click to delete item." data-id="`+i+`" class="deleteMenu ui-icon ui-icon-closethick">
						<span></span>
						</span>
						</span>
						<div id="`+i+`" class="menuEdit">
						<p>
						Link gốc: <a href="`+url+`">`+url+`</a>
						</p>
						</div>
						</div>
						</li>
						`);
					jQuery(this).parents('ul').first().find('li.active').removeClass('active');
					load_menu();
					i ++;
					jQuery(this).parents('.custom_link').find('input').val('');
				}
				else
				{
					alert("Vui lòng nhập thông tin trước khi thêm");
				}
			});

			jQuery('#menu').sortable();

			jQuery('.btn__submit').on('click',function(e){
				var loading = jQuery(this).prev();
				hiered = jQuery('ol.sortable').nestedSortable('toHierarchy', {startDepthCount: 0});
				var menu = [];
				hiered.forEach(function(e){
					var item = {};
					var url = jQuery('span[data-id='+e.id+']').data('href');
					var text = jQuery('span[data-id='+e.id+']').text();
					text = text.replace('/  /gi',' ');
					item.url = url;
					item.text = text;
					if(typeof e.children != "undefined")
					{
						var child = [];
						e.children.forEach(function(ev){
							var urle = jQuery('span[data-id='+ev.id+']').data('href');
							var texte = jQuery('span[data-id='+ev.id+']').text();
							child.push({'url':urle,'text':texte});
						})
						item.children = child;
					}

					menu.push(item);
				});
				jQuery.ajax({
					headers: {
						'X-CSRF-TOKEN': '{{ csrf_token() }}',
					},
					url: '{{route('admin.options.menu')}}',
					type: 'post',
					dataType: 'json',
					data: {
						data: menu
					},
					beforeSend: function(){
						loading.addClass('active');
					},
					success: function(res){
						loading.parent().after('<div class="alert alert-success">'+res.msg+'</div>');
						loading.removeClass('active');
					},
					errors: function(errors){
						console.log(errors);
					}
				});

			})


		});
	</script>
	@endsection