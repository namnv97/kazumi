@extends('layouts.server')
@section('title')
Cập nhật 
@endsection
@section('css')
<style>
	/*.btn-danger
	{
		background-color: #ef5c6a!important;
    	border: 1px solid #ef5c6a!important;
	}*/
	
	.gallery .img
	{
		display: block;
		padding: 5px;
		margin-bottom: 10px;
		position: relative;
	}
	.gallery .img i
	{
		position: absolute;
		top: 0;
		right: 0;
		display: inline-block;
		padding: 3px;
		background: #fff;
		color: #000;
		font-weight: bold;
		cursor: pointer;
		border-radius: 100%;
	}
	.gallery .img img
	{
		max-width: 100%;
	}
	.gallery::after
	{
		content: '';
		clear: both;
		display: table;
	}
	.tab {
	  overflow: hidden;
	  border: 1px solid #ccc;
	  background-color: #f1f1f1;
	}
	/* Style the buttons that are used to open the tab content */
	.tab button {
	  background-color: inherit;
	  float: left;
	  border: none;
	  outline: none;
	  cursor: pointer;
	  padding: 14px 16px;
	  transition: 0.3s;
	}
	/* Change background color of buttons on hover */
	.tab button:hover {
	  background-color: #ddd;
	}
	/* Create an active/current tablink class */
	.tab button.active {
	  background-color: #ccc;
	}
	/* Style the tab content */
	.tab-content {
	  padding: 15px;
	  background: #fff;
	}

	.item_p
	{
		display: flex;
		align-items: center;
	}

	.item_p>span
	{
		margin: 0 5px;
	}

	.action_addtaskcol
	{
		padding: 0 15px;
		clear: both;
	}
</style>
@endsection
@section('content')
<div class="content_container">
	<h1>Cập nhật </h1>
	<hr>
	<div class="dashboard_home">
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
		<form action="" method="post" enctype="multipart/form-data" >
			@csrf
			<ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#slide">Ảnh nền</a></li>
				<li><a data-toggle="tab" href="#product">Sản phẩm bán chạy</a></li>
				<li><a data-toggle="tab" href="#collection">Bộ sưu tập</a></li>
				<li><a data-toggle="tab" href="#about">Giới thiệu</a></li>
				<li><a data-toggle="tab" href="#video">Video</a></li>
				<li><a data-toggle="tab" href="#shoplook">Sản phẩm</a></li>
			</ul>

			<!-- Tab content -->
			<div class="tab-content">
			
				<div id="slide" class="tab-pane fade in active">
					<h3>Ảnh nền  <span class="btn btn-success addTaskSlide" ><i class="fa fa-plus"></i></span></h3>
					@if(count($slide) > 0)
					
					<div id="list_more_slide">
						@foreach($slide as $key => $value)
						<div class="item_slide1">
							<div class="form-group">
					          	
					    		<div class="gallery">
					    			<div class="img">
										<img src="{{$value->meta_value}}" alt="image">
										<input type="hidden" name="gallery[]" value="{{$value->meta_value}}">
										
									</div>
					    		</div>
					    		<span style="height: 34px; line-height: 25px; font-size: 14px;" class="choose_gallery btn btn-sm btn-success">Chọn ảnh</span>
					        </div>
					        <span class="btn btn-danger removeTaskSlide" ><i class="fa fa-times"></i></span>
					        <span class="btn btn-success addTaskSlide" ><i class="fa fa-plus"></i></span>
				   		</div>
				   		@endforeach
				   	</div>
				   	
				   	@else
				   	<div id="list_more_slide">
						<div class="item_slide1">
							<div class="form-group">
					          	<input type="hidden" name="text-input" value="A"/>
					    		<div class="gallery">
					    			<div class="img">
						    			<img src="" />
						    		</div>
					    		</div>
					    		<span style="height: 34px; line-height: 25px; font-size: 14px;" class="choose_gallery btn btn-sm btn-success">Chọn ảnh</span>
					        </div>
					        <span class="btn btn-danger removeTaskSlide" ><i class="fa fa-times"></i></span>
					        <span class="btn btn-success addTaskSlide" ><i class="fa fa-plus"></i></span>
				   		</div>
				   	</div>
				   	@endif
				</div>
				<div id="product" class="tab-pane fade in" >
					<h3>Sản phẩm bán chạy <span class="btn btn-success addTask" ><i class="fa fa-plus"></i></span></h3>
					<div class="form-group">
						<label>Link xem tất cả</label>
						<input type="text" name="view_best_seller" class="form-control" style="width: 50%;" value="{{(!empty($view_best_seller))?$view_best_seller->meta_value:FALSE}}">
					</div>
					@if(count($product) > 0)
					
			   		<div id="list_more">
			   			@foreach($product as $key => $pro)
						<div class="row item_p">
							<div class="col-md-6">
					          	<div class="form-group">
									<label>Sản phẩm: </label>
									<select name="product_id[]" class="form-control select2" style="width: 100%;">
										@if(!empty($products))
										@foreach($products as $value)

										<option value="{{$value->id}}" 
											
											@if($pro->meta_value == $value->id)
												{{'selected'}}
											@endif
										>{{$value->name}}</option>
										@endforeach
										@endif
									</select>
								</div>
							</div>
							<span class="btn btn-danger removeTask" ><i class="fa fa-times"></i></span>
				   			<span class="btn btn-success addTask" ><i class="fa fa-plus"></i></span>
						</div>
						@endforeach
					</div>
					
					@else
					<div id="list_more">
						<div class="row item_p">
							<div class="col-md-6">
					          	<div class="form-group">
									<label>Sản phẩm: </label>
									<select name="product_id[]" class="form-control select2" style="width: 100%;">
										@if(!empty($products))
										@foreach($products as $value)
										<option value="{{$value->id}}">{{$value->name}}</option>
										@endforeach
										@endif
									</select>
								</div>
							</div>
							<span class="btn btn-danger removeTask" ><i class="fa fa-times"></i></span>
				   			<span class="btn btn-success addTask" ><i class="fa fa-plus"></i></span>
						</div>
					</div>
					@endif
				</div>
				<div id="collection" class="tab-pane fade in" >
					<h3>Bô sưu tập <span class="btn btn-success removeTaskCol" ><i class="fa fa-plus"></i></span></h3>
					@if(count($collection) > 0)
					
			   		<div id="list_more_col" style="padding-left: 20px;">
			   			@foreach($collection as $k => $col)
						<div class="row item_col">
							<div class="col-md-6">
							
					          	<div class="form-group">
									<label>Bộ sưu tập: </label>
									<select name="collecttion[]" class="form-control select2" style="width: 100%;">
										@if(!empty($collections))
										@foreach($collections as $value)
										<option value="{{$value->id}}"
											@if($col->meta_value == $value->id)
											selected
											@endif
										>{{$value->name}}</option>
										@endforeach
										@endif
									</select>
								</div>
								<div class="form-group">
									<label>Tiêu đề</label>
					          		<input type="text" name="collection_title[]" value="{{$collection_title[$k]->meta_value}}" class="form-control">
								</div>
							</div>
							<div class="col-md-6">
								<label>Ảnh</label>
								<div class="gallery">
					    			<div class="img">
										<img src="{{$collection_gallery[$k]->meta_value}}">
										<input type="hidden" name="gallery_col[]" value="{{$collection_gallery[$k]->meta_value}}">
										
									</div>
					    		</div>
			    				<span style="height: 34px; line-height: 25px; font-size: 14px;" class="choose_gallery_col btn btn-sm btn-success">Chọn ảnh</span>
							</div>
							<div class="action_addtaskcol">
								<span class="btn btn-danger removeTaskCol" ><i class="fa fa-times"></i></span>

								<span class="btn btn-success addTaskCol" ><i class="fa fa-plus"></i></span>
							</div>
						</div>
						@endforeach
					</div>
					
					@else
					<div id="list_more_col">
						<div class="row item_col">
							<div class="col-md-6">
							
					          	<div class="form-group">
									<label>Bộ sưu tập: </label>
									<select name="collecttion[]" class="form-control select2" style="width: 100%;">
										@if(!empty($collections))
										@foreach($collections as $value)
										<option value="{{$value->id}}">{{$value->name}}</option>
										@endforeach
										@endif
									</select>
								</div>
								<div class="form-group">
									<label>Tiêu đề</label>
					          		<input type="text" name="collection_title[]" class="form-control">
								</div>
							</div>
							<div class="col-md-6">
								<label>Ảnh</label>
								<div class="gallery">
					    			<div class="img" style="width: 400px; height: 250px;">
						    			<img src="" style="width: 100%; height: 250px;" />
						    		</div>
					    		</div>
			    				<span style="height: 34px; line-height: 25px; font-size: 14px;" class="choose_gallery_col btn btn-sm btn-success">Chọn ảnh</span>
							</div>
							<span class="btn btn-danger removeTaskCol" ><i class="fa fa-times"></i></span>
				   			<span class="btn btn-success addTaskCol" ><i class="fa fa-plus"></i></span>
						</div>
					</div>
					@endif
				</div>
				<div id="about" class="tab-pane fade in" >
					<h3>Giới thiệu <span class="btn btn-success re addTaskAbout" ><i class="fa fa-plus"></i></span></h3>
					@if(count($about_title1) > 0)
					
					<div id="list_more_about">
						@foreach($about_title1 as $k => $col)
						<div class="row item_about" style="padding-left: 20px;">
							<div class="row">
								<div class="col-md-6">
						          	<div class="form-group">
						          		<label>Tiêu đề 1</label>
										<input type="text" name="about_title1[]" value = "{{$about_title1[$k]->meta_value}}" class="form-control" />
									</div>
									<div class="form-group">
						          		<label>Tiêu đề 2</label>
										<input type="text" name="about_title2[]" value = "{{$about_title2[$k]->meta_value}}" class="form-control" />
									</div>
									<div class="form-group">
						          		
						          		<label>Nội dung</label>
										<textarea type="text" rows="7" name="about_content[]" value = "" class="form-control">{{$about_content[$k]->meta_value}}</textarea>
									</div>
								</div>
								<div class="col-md-6">
									<label>Ảnh</label>
									<div class="gallery">
						    			<img src="{{$about_gallery[$k]->meta_value}}" alt="image" style="width: 50%;">
											<input type="hidden" name="gallery_about[]" value="{{$about_gallery[$k]->meta_value}}">
						    		</div>
				    				<span style="height: 34px; line-height: 25px; font-size: 14px;" class="choose_gallery_about btn btn-sm btn-success">Chọn ảnh</span>
								</div>
							</div>
							<span class="btn btn-danger re removeTaskAbout" ><i class="fa fa-times"></i></span>
							<span class="btn btn-success re addTaskAbout" ><i class="fa fa-plus"></i></span>
				   		</div>
				   		@endforeach
				   	</div>
				   	
				   	@else
				   	<div id="list_more_about">
						<div class="row item_about" style="padding-left: 20px;">
							<div class="row">
								<div class="col-md-6">
								
						          	<div class="form-group">
						          		<label>Tiêu đề 1</label>
										<input type="text" name="about_title1[]" class="form-control" />
									
									</div>
									<div class="form-group">
						          		
						          		<label>Tiêu đề 2</label>
										<input type="text" name="about_title2[]" class="form-control" />
									</div>
									<div class="form-group">
						          		
						          		<label>Nội dung</label>
										<textarea type="text" rows="7" name="about_content[]" class="form-control"></textarea>
									</div>
								</div>
								<div class="col-md-6">
									<label>Ảnh</label>
									<div class="gallery">
						    			<div class="img" style="width: 400px; height: 250px;">
							    			<img src="" style="width: 100%; height: 250px;" />
							    		</div>
						    		</div>
				    				<span style="height: 34px; line-height: 25px; font-size: 14px;" class="choose_gallery_about btn btn-sm btn-success">Chọn ảnh</span>
								</div>
							</div>
							<span class="btn btn-danger re removeTaskAbout" ><i class="fa fa-times"></i></span>
							<span class="btn btn-success re addTaskAbout" ><i class="fa fa-plus"></i></span>
				   		</div>
				   	</div>
				   	@endif
				</div>
				<div id="video" class="tab-pane fade in" >
					<h3>Video</h3>
					<div data-repeater-list="">
						<div data-repeater-item style="margin-bottom: 20px;">
							<div class="row">
								<div class="col-md-6 form-group">
									<label>Ảnh đại diện video</label>
									<div class="gallery">
										@if(empty($video_gallery))
						    			<div class="img">
							    			<img src="" style="width: 100%" />
							    		</div>
							    		@else
							    		<div class="img">
											<img src="{{$video_gallery->meta_value}}">
											<input type="hidden" name="video_gallery" value="{{$video_gallery->meta_value}}">
										</div>
										@endif
						    		</div>
						    		<span style="height: 34px; line-height: 25px; font-size: 14px;" class="choose_gallery_video btn btn-sm btn-success">Chọn ảnh</span>
			         			</div>
			         			<div class="col-md-6 form-group">
			         				<label>Link video</label>
			         				<input type="text" name="video" @if(!empty($video)) value="{{$video->meta_value}}" @endif class="form-control">
			         			</div>
			         			<div class="col-md-6 form-group">
			         				<label>Tiêu đề 1</label>
			         				<input type="text" name="video_title1" @if(!empty($video_title1)) value="{{$video_title1->meta_value}}" @endif class="form-control">
			         			</div>
			         			<div class="col-md-6 form-group">
			         				<label>Tiêu đề 2</label>
			         				<input type="text" name="video_title2" @if(!empty($video_title2)) value="{{$video_title2->meta_value}}" @endif class="form-control">
			         			</div>
							</div>
				        </div>
			   		</div>
				</div>
				<div id="shoplook" class="tab-pane fade in" style="padding-left: 20px;">
					<h3>Sản phẩm hot<span class="btn btn-success addTaskH" ><i class="fa fa-plus"></i></span></h3>
					<div id="list_moreh">
						<div class="row">
							<div class="col-md-6">
								<label>Tiêu đề 1</label>
								<input type="text" name="look_title1"  @if(!empty($look_title1)) value="{{$look_title1->meta_value}}" @endif class="form-control">
							</div>
							<div class="col-md-6">
								<label>Tiêu đề 2</label>
								<input type="text" name="look_title2"  @if(!empty($look_title2)) value="{{$look_title2->meta_value}}"  @endif class="form-control">
							</div>
						</div>
						@if(count($product_look_product) > 0)
						@foreach($product_look_product as $k => $pro)
						<div class="row item_h" style="padding-top: 40px;">

							<div class="col-md-6">
							
					          	<div class="form-group">
									<label>Sản phẩm: </label>
									<select name="product_id_look[]" class="form-control select2" style="width: 100%;">
										@if(!empty($products))
										@foreach($products as $value)
										<option value="{{$value->id}}"
											@if($pro->meta_value == $value->id)
												selected
											@endif

										>{{$value->name}}</option>
										@endforeach
										@endif
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<label>Ảnh</label>
								<div class="gallery">
					    			<div class="img">
										<img src="{{$product_look_gallery[$k]->meta_value}}" alt="image">
										<input type="hidden" name="gallery_look[]" value="{{$product_look_gallery[$k]->meta_value}}">
									</div>
					    		</div>
			         
			          
			    				<span style="height: 34px; line-height: 25px; font-size: 14px;" class="choose_gallery_look btn btn-sm btn-success">Chọn ảnh</span>
							</div>
							<span class="btn btn-danger removeTaskH" ><i class="fa fa-times"></i></span>
							<span class="btn btn-success addTaskH" ><i class="fa fa-plus"></i></span>
							
						</div>
						@endforeach
						@else
						<div class="row item_h" style="margin-top: 20px;">

							<div class="col-md-6">
							
					          	<div class="form-group">
									<label>Sản phẩm: </label>
									<select name="product_id_look[]" class="form-control select2" style="width: 100%;">
										@if(!empty($products))
										@foreach($products as $value)
										<option value="{{$value->id}}">{{$value->name}}</option>
										@endforeach
										@endif
										

									</select>
								</div>
							</div>
							<div class="col-md-6">
								<label>Ảnh</label>
								<div class="gallery">
					    			<div class="img">
						    			<img src="" style="width: 100%;" />
						    		</div>
					    		</div>
			         
			          
			    				<span style="height: 34px; line-height: 25px; font-size: 14px;" class="choose_gallery_look btn btn-sm btn-success">Chọn ảnh</span>
							</div>
							<span class="btn btn-danger removeTaskH" ><i class="fa fa-times"></i></span>
							<span class="btn btn-success addTaskH" ><i class="fa fa-plus"></i></span>
							
						</div>
						@endif
					</div>
				</div>
			</div>
			<button class="btn btn-primary" style="margin-top: 30px;">-- Lưu --</button>
		</form>		
	</div>
</div>

@endsection
@section('script')


<script type="text/javascript">
	jQuery(document).ready(function(){
		
		jQuery('body').on('click','.choose_gallery',function(){
				var a = $(this);
				CKFinder.popup( {
					chooseFiles: true,
					onInit: function( finder ) {
						finder.on( 'files:choose', function( evt ) {
							var file = evt.data.files;
							file.forEach(function(e){
								var url = e.getUrl();
								a.closest("div").find('.gallery').eq(0).text('');
								a.closest("div").find('.gallery').eq(0).append(`
								<div class="img">
									<img src="`+url+`" alt="image">
									<input type="hidden" name="gallery[]" value="`+url+`">
									
								</div>
								`)
							});
						} );
					}
				} );
		});
		jQuery('body').on('click','.choose_gallery_about',function(){
				var a = $(this);
				CKFinder.popup( {
					chooseFiles: true,
					onInit: function( finder ) {
						finder.on( 'files:choose', function( evt ) {
							var file = evt.data.files;
							file.forEach(function(e){
								var url = e.getUrl();
								a.closest("div").find('.gallery').eq(0).text('');
								a.closest("div").find('.gallery').eq(0).append(`
								<div class="img">
									<img src="`+url+`" alt="image">
									<input type="hidden" name="gallery_about[]" value="`+url+`">
									
								</div>
								`)
							});
						} );
					}
				} );
		});
		jQuery('body').on('click','.choose_gallery_col',function(){
				var a = $(this);
				CKFinder.popup( {
					chooseFiles: true,
					onInit: function( finder ) {
						finder.on( 'files:choose', function( evt ) {
							var file = evt.data.files;
							file.forEach(function(e){
								var url = e.getUrl();
								a.closest("div").find('.gallery').eq(0).text('');
								a.closest("div").find('.gallery').eq(0).append(`
								<div class="img">
									<img src="`+url+`" alt="image">
									<input type="hidden" name="gallery_col[]" value="`+url+`">
									
								</div>
								`)
							});
						} );
					}
				} );
		});
		jQuery('body').on('click','.choose_gallery_look',function(){
				var a = $(this);
				CKFinder.popup( {
					chooseFiles: true,
					onInit: function( finder ) {
						finder.on( 'files:choose', function( evt ) {
							var file = evt.data.files;
							file.forEach(function(e){
								var url = e.getUrl();
								a.closest("div").find('.gallery').eq(0).text('');
								a.closest("div").find('.gallery').eq(0).append(`
								<div class="img">
									<img src="`+url+`" alt="image">
									<input type="hidden" name="gallery_look[]" value="`+url+`">
									
								</div>
								`)
							});
						} );
					}
				} );
		});
		jQuery('body').on('click','.choose_gallery_video',function(){
				var a = $(this);
				CKFinder.popup( {
					chooseFiles: true,
					onInit: function( finder ) {
						finder.on( 'files:choose', function( evt ) {
							var file = evt.data.files;
							file.forEach(function(e){
								var url = e.getUrl();
								a.closest("div").find('.gallery').eq(0).text('');
								a.closest("div").find('.gallery').eq(0).append(`
								<div class="img">
									<img src="`+url+`" alt="image">
									<input type="hidden" name="video_gallery" value="`+url+`">
									
								</div>
								`)
							});
						} );
					}
				} );
		});
		
		
	});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		jQuery('.select2').select2();
		$('body').on('click', '.addTask', function(){
			
	        let html = `<div class="row item_p">
						<div class="col-md-6">
						
				          	<div class="form-group">
								<label>Sản phẩm: </label>
								<select name="product_id[]" class="form-control select2" style="width: 100%;">
									@if(!empty($products))
									@foreach($products as $value)
									<option value="{{$value->id}}">{{$value->name}}</option>
									@endforeach
									@endif
									
								</select>
							</div>
						</div>
						<span class="btn btn-danger removeTask" ><i class="fa fa-times"></i></span>
			   			<span class="btn btn-success addTask" ><i class="fa fa-plus"></i></span>
					</div>`;
	        $('#list_more').append(html);
	        $('.select2').select2();
	    });
	    $('body').on('click', '.removeTask', function(){
	        $(this).parents('.item_p').remove();
	    });
	    $('body').on('click', '.addTaskH', function(){
			
	        let html = `<div class="row item_h">
					<div class="col-md-6">
					
			          	<div class="form-group">
							<label>Sản phẩm: </label>
							<select name="product_id_look[]" class="form-control select2" style="width: 100%;">
								@if(!empty($products))
								@foreach($products as $value)
								<option value="{{$value->id}}">{{$value->name}}</option>
								@endforeach
								@endif
								
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label>Ảnh</label>
						<div class="gallery">
			    			<div class="img"">
				    			<img src="" style="width: 100%;" />
				    		</div>
			    		</div>
	    				<span style="height: 34px; line-height: 25px; font-size: 14px;" class="choose_gallery_look btn btn-sm btn-success">Chọn ảnh</span>
					</div>
					<span class="btn btn-danger removeTaskH" ><i class="fa fa-times"></i></span>
					<span class="btn btn-success addTaskH" ><i class="fa fa-plus"></i></span>
				</div>
				`;
	        $('#list_moreh').append(html);
	        $('.select2').select2();
	    });
	    $('body').on('click', '.removeTaskH', function(){
	    	
	        $(this).parents('.item_h').remove();
	    });
	    $('body').on('click', '.addTaskSlide', function(){
	    	console.log('addTaskSlide');
			
	        let html = `<div class="item_slide1">
							<div class="form-group">
					          	<input type="hidden" name="text-input" value="A"/>
					    		<div class="gallery">
					    			<div class="img">
						    			<img src="" />
						    		</div>
					    		</div>		          
					    		<span style="height: 34px; line-height: 25px; font-size: 14px;" class="choose_gallery btn btn-sm btn-success">Chọn ảnh</span>
					        </div>
					        <span class="btn btn-danger removeTaskSlide" ><i class="fa fa-times"></i></span>
					        <span class="btn btn-success addTaskSlide" ><i class="fa fa-plus"></i></span>
				   		</div>`;
	        $('#list_more_slide').append(html);
	        $('.select2').select2();
	    });
	    $('body').on('click', '.removeTaskSlide', function(){
	    	
	        $(this).parents('.item_slide1').remove();
	    });
	    $('body').on('click','.addTaskAbout',function(){
	    	let html = `<div class="item_about" style="padding-left: 20px;">
						<div class="row">
							<div class="col-md-6">
							
					          	<div class="form-group">
					          		<label>Tiêu đề 1</label>
									<input type="text" name="about_title1[]" class="form-control" />
								
								</div>
								<div class="form-group">
					          		
					          		<label>Tiêu đề 2</label>
									<input type="text" name="about_title2[]" class="form-control" />
								</div>
								<div class="form-group">
					          		
					          		<label>Nội dung</label>
									<textarea type="text" rows="7" name="about_content[]" class="form-control"></textarea>
								</div>
							</div>
							<div class="col-md-6">
								<label>Ảnh</label>
								<div class="gallery">
					    			<div class="img">
						    			<img src="" style="width: 100%;" />
						    		</div>
					    		</div>
			         
			          
			    				<span style="height: 34px; line-height: 25px; font-size: 14px;" class="choose_gallery_about btn btn-sm btn-success">Chọn ảnh</span>
							</div>
							
						</div>
						<span class="btn btn-danger re removeTaskAbout" ><i class="fa fa-times"></i></span>
						<span class="btn btn-success re addTaskAbout" ><i class="fa fa-plus"></i></span>
			   		</div>`;
			$('#list_more_about').append(html);
	        //$('.select2').select2();
	    })
	    $('body').on('click', '.removeTaskAbout', function(){
	    	
	        $(this).parents('.item_about').remove();
	    });
	    //
	    $('body').on('click','.addTaskCol',function(){
	    	
	    	let html = `<div class="row item_col">
						<div class="col-md-6">
						
				          	<div class="form-group">
								<label>Bộ sưu tập: </label>
								<select name="collecttion[]" class="form-control select2" style="width: 100%;">
									@if(!empty($collections))
									@foreach($collections as $value)
									<option value="{{$value->id}}">{{$value->name}}</option>
									@endforeach
									@endif
									
								</select>
							</div>
							<div class="form-group">
								<label>Tiêu đề</label>
				          		<input type="text" name="collection_title[]" class="form-control">
							</div>
						</div>
						<div class="col-md-6">
							<label>Ảnh</label>
							<div class="gallery">
				    			<div class="img">
					    			<img src="" style="width: 100%;" />
					    		</div>
				    		</div>
		         
		          
		    				<span style="height: 34px; line-height: 25px; font-size: 14px;" class="choose_gallery_col btn btn-sm btn-success">Chọn ảnh</span>
						</div>
						
						<div class="action_addtaskcol">
							<span class="btn btn-danger removeTaskCol" ><i class="fa fa-times"></i></span>
				   			<span class="btn btn-success addTaskCol" ><i class="fa fa-plus"></i></span>
						</div>
					</div>`;
			$('#list_more_col').append(html);
	        //$('.select2').select2();
	    })
	    $('body').on('click', '.removeTaskCol', function(){
	    	
	        $(this).parents('.item_col').remove();
	    });
	})
</script>
@endsection