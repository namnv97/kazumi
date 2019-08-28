@extends('layouts.server')
@section('title')
Màu sắc
@endsection

@section('css')
<style>
	#img_color
	{
		display: none;
	}

	#img_color[src] {
		display: inline-block !important;
	}
</style>
@endsection

@section('content')

<div class="page-color">
	<h1>Màu sắc</h1>
	<div class="row">
		<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
			@if(session('msg_add'))
			<div class="alert alert-success">
				<p>{{session('msg_add')}}</p>
			</div>
			@endif
			<h3>Thêm mới</h3>
			<form action="{{route('admin.color.create')}}" method="post">
				@csrf
				<div class="form-group">
					<label>Tên màu</label>
					<input type="text" name="name" class="form-control">
				</div>
				<div class="form-group">
					<label>Ảnh màu</label>
					<br/>
					<img id="img_color" style="width: 50px;height: 50px;">
					<span class="choose_image btn btn-sm btn-success">Thêm ảnh</span>
					<input type="hidden" name="image">
				</div>
				<div class="form-group text-center">
					<button type="submit" class="btn btn-sm btn-primary">Thêm</button>
				</div>
			</form>
		</div>
		<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
			<div class="list_color">
				<h3>Danh sách màu</h3>
				@if(session('msg_del'))
				<div class="alert alert-warning">
					<p>{{session('msg_del')}}</p>
				</div>
				@endif
				<table class="table">
					<thead>
						<tr>
							<th>STT</th>
							<th>Tên màu</th>
							<th>Ảnh màu</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@if(!empty($colors))
						@foreach($colors as $key => $color)
						<tr>
							<td>{{$key+1}}</td>
							<td>{{$color->name}}</td>
							<td>
								<img src="{{asset($color->image)}}" alt="{{$color->name}}" style="width: 50px;height: 50px;">
							</td>
							<td>
								<span class="btn btn-sm btn-danger trash"><i class="fa fa-trash"></i> Xóa</span>
								<form action="{{route('admin.color.delete',['id' => $color->id])}}" method="POST" style="display: none;">
									{{method_field('DELETE')}}
									@csrf             
								</form>
							</td>
						</tr>
						@endforeach
						@endif
					</tbody>
					<tfoot>
						<tr>
							<td colspan="4">{{$colors->links()}}</td>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>

@endsection

@section('script')
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('body').on('click','.choose_image',function(){
			if(jQuery(this).hasClass('btn-success'))
			{
				CKFinder.popup( {
					chooseFiles: true,
					onInit: function( finder ) {
						finder.on( 'files:choose', function( evt ) {
							var file = evt.data.files.first();
							jQuery('#img_color').attr('src',file.getUrl());
							jQuery('.choose_image').next().val(file.getUrl());
							jQuery('.choose_image').removeClass('btn-success');
							jQuery('.choose_image').addClass('btn-danger');
							jQuery('.choose_image').text('Xóa ảnh');
						} );
					}
				} );
			}
			else
			{
				if(confirm("Bạn muốn xóa ảnh này?"))
				{
					jQuery('.choose_image').text('Thêm ảnh');
					jQuery('.choose_image').removeClass('btn-danger');
					jQuery('.choose_image').addClass('btn-success');
					jQuery('#img_color').removeAttr('src');
					jQuery('.choose_image').next().val('');
				}
				
			}
			
		});


		jQuery('.list_color tbody td span.trash').on('click',function(){
			if(confirm("Bạn muốn xóa màu này ?"))
			{
				jQuery(this).next().submit();
			}
		});



	});
</script>
@endsection