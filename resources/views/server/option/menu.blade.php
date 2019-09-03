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

	.list_choose .list ul li span
	{
		display: block;
		padding: 5px 0;
		text-align: center;
	}



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
						<li>
							<span>Trang</span>
						</li>
						<li>
							<span>Trang</span>
						</li>
						<li>
							<span>Trang</span>
						</li>
					</ul>
				</div>
				<div class="list">
					<h3>Trang</h3>
					<ul>
						<li>
							<span>Trang</span>
						</li>
						<li>
							<span>Trang</span>
						</li>
						<li>
							<span>Trang</span>
						</li>
					</ul>
				</div>
				<div class="list">
					<h3>Sản phẩm</h3>
					<ul>
						<li>
							<span>Trang</span>
						</li>
						<li>
							<span>Trang</span>
						</li>
						<li>
							<span>Trang</span>
						</li>
						<li>
							<span>Trang</span>
						</li>
					</ul>
				</div>
				<div class="list">
					<h3>Bài viết</h3>
					<ul>
						<li>
							<span>Trang</span>
						</li>
						<li>
							<span>Trang</span>
						</li>
						<li>
							<span>Trang</span>
						</li>
						<li>
							<span>Trang</span>
						</li>
						<li>
							<span>Trang</span>
						</li>
					</ul>
				</div>
				<div class="list">
					<h3>Linh tùy chọn</h3>
					<div class="custom_link">
						<ul>
							<input type="text" class="form-control" placeholder="Tiêu đề">
							<input type="text" class="form-control" placeholder="Đường dẫn">
							<li class="text-right">
								<button class="add-to-menu btn btn-sm btn-primary">Thêm</button>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
			
		</div>
	</div>
</div>

@endsection
@section('script')
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('.list_choose .list h3').on('click',function(){
			if(jQuery(this).hasClass('active'))
			{
				jQuery(this).next().slideUp();
				jQuery(this).removeClass('active');
			}
		});
	});
</script>
@endsection