@extends('layouts.server')
@section('title')
Người dùng
@endsection
@section('css')
<style>
	.action
	{
		white-space: nowrap;
		visibility: hidden;
	}

	.action span
	{
		cursor: pointer;
		color: #1179b6;
	}

	.action span:hover
	{
		color: #f00;
	}

	.page-users table tbody tr:hover
	{
		background: #eee;
	}

	.page-users table tbody tr:hover .action
	{
		visibility: visible;
	}

	.page-users table thead th
	{
		white-space: nowrap;
	}
	
	#usermodal .modal-body .errors
	{
		color: red;
		padding-left: 10px;
	}




</style>
@endsection
@section('content')

<div class="page-users">
	<h1>Người dùng</h1>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
			<h3>Thêm mới</h3>
			@if(session('errors'))
			<div class="alert alert-warning">
				@foreach(session('errors')->all() as $msg)
				<p>{{$msg}}</p>
				@endforeach
			</div>
			@endif
			@if(session('msg_add'))
			<div class="alert alert-success">
				<p>{{session('msg_add')}}</p>
			</div>
			@endif
			<form action="{{route('admin.user.create')}}" method="post">
				@csrf
				<div class="form-group">
					<label>Họ tên</label>
					<input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Họ tên">
				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="email" name="email" class="form-control" value="{{old('email')}}" placeholder="Email">
				</div>
				<div class="form-group">
					<label>Mật khẩu</label>
					<input type="password" name="password" class="form-control" value="{{old('password')}}" placeholder="Mật khẩu">
				</div>
				<div class="form-group">
					<label>Nhóm người dùng</label>
					<select name="role" class="form-control">
						<option value="0">Chọn kiểu người dùng</option>
						@if(!empty($roles))
						@foreach($roles as $role)
							<option value="{{$role->id}}">{{$role->name}}</option>
						@endforeach
						@endif
					</select>
				</div>
				<div class="text-center">
					<button class="btn btn-md btn-primary" type="submit">Thêm</button>
				</div>
			</form>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
			<h3>Danh sách người dùng</h3>
			<table class="table">
				<thead>
					<tr>
						<th>STT</th>
						<th>Tên</th>
						<th>Email</th>
						<th>Ngày sinh</th>
						<th>Điểm thưởng</th>
						<th>Refferal</th>
						<th>Kiểu thành viên</th>
					</tr>
				</thead>
				<tbody>
					@if(!empty($users))
					@foreach($users as $key => $user)
						<tr>
							<td>{{($users->currentPage() - 1) * $users->perPage() + $key + 1}}</td>
							<td>
								<b>{{$user->name}}</b>
								<div class="action">
									<span class="edit" data-value="{{$user->id}}"><i class="fa fa-eye"></i> Xem</span>
									<span class="trash"><i class="fa fa-trash"></i> Xóa</span>
									<form action="{{route('admin.user.delete',['id' => $user->id])}}" method="post">
										@method('DELETE')
										@csrf
									</form>
								</div>
							</td>
							<td>{{$user->email}}</td>
							<td>{{ (!empty($user->birthday))?\Carbon\Carbon::parse($user->birthday)->format('d/m/Y'):FALSE}}</td>
							<td>{{$user->point_reward}}</td>
							<td>{{$user->refferal_code}}</td>
							<td>{{$user->role_name}}</td>
						</tr>
					@endforeach
					@endif
				</tbody>
				<tfoot>
					<tr>
						<td colspan="7">{{$users->links()}}</td>
					</tr>
				</tfoot>
			</table>
			<div id="usermodal" class="modal fade" role="dialog">
				<div class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Người dùng : <b></b></h4>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<label>Họ tên</label>
								<input type="text" name="name" placeholder="Họ tên" class="form-control">
							</div>
							<div class="form-group">
								<label>Email</label>
								<span class="form-control email"></span>
							</div>
							<div class="form-group">
								<label>Birthday</label>
								<input type="date" name="birthday" class="form-control">
							</div>
							<div class="form-group">
								<label>Điểm thưởng</label>
								<span class="form-control point_reward"></span>
							</div>
							<div class="form-group">
								<label>Refferal Code</label>
								<span class="form-control refferal_code"></span>
							</div>
							<div class="form-group">
								<label>Kiểu người dùng</label>
								<select name="role" class="form-control">
									<option value="0">Chọn kiểu người dùng</option>
									@if(!empty($roles))
									@foreach($roles as $role)
										<option value="{{$role->id}}">{{$role->name}}</option>
									@endforeach
									@endif
								</select>
							</div>
							<div class="text-center">
								<button class="btn btn-md btn-primary">Cập nhật</button>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>

@endsection
@section('script')
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('.action .edit').on('click',function(){
			var id = jQuery(this).data('value');
			jQuery('#usermodal .modal-body input[name=id]').remove();
			jQuery.ajax({
				url: '{{route('admin.user.get_user')}}',
				type: 'get',
				dataType: 'json',
				data: {
					id: id
				},
				beforeSend: function(){

				},
				success: function(res){
					jQuery('#usermodal h4.modal-title b').text(res.name);
					jQuery('#usermodal input[name=name]').val(res.name);
					jQuery('#usermodal input[name=birthday]').val(res.birthday);
					jQuery('#usermodal .email').text(res.email);
					jQuery('#usermodal .point_reward').text(res.point_reward);
					jQuery('#usermodal .refferal_code').text(res.refferal_code);
					jQuery('#usermodal select[name=role]').val(res.role_id);
					jQuery('#usermodal .modal-body').append('<input type="hidden" name="id" value="'+res.id+'">');
					jQuery('#usermodal').modal('show');
				},
				errors: function(errors){
					console.log($errors);
				}
			});
		});

		jQuery('.action .trash').on('click',function(){
			if(confirm('Bạn muốn xóa người dùng này ?'))
			{
				jQuery(this).next().submit();
			}
		})


		jQuery('#usermodal .modal-body button').on('click',function(){

			jQuery('#usermodal .modal-body .errors').remove();

			var id = jQuery(this).parents('.modal-body').find('input[name=id]').val();

			var name = jQuery(this).parents('.modal-body').find('input[name=name]').val();
			var i = 0;
			if(name.length == 0)
			{
				i ++;
				jQuery(this).parents('.modal-body').find('input[name=name]').after('<p class="errors">Họ tên không được để trống</p>');
			}

			var role = jQuery(this).parents('.modal-body').find('select[name=role]').val();
			if(role == 0)
			{
				i ++;
				jQuery(this).parents('.modal-body').find('select[name=role]').after('<p class="errors">Kiểu người dùng không được để trống</p>');
			}

			if(i > 0) return false;

			var birthday = jQuery(this).parents('.modal-body').find('input[name=birthday]').val();

			jQuery.ajax({
				headers: {
					'X-CSRF-TOKEN': '{{ csrf_token() }}',
				},
				url: '{{route('admin.user.edit')}}',
				type: 'post',
				dataType: 'json',
				data: {
					id: id,
					name: name,
					role: role,
					birthday
				},
				beforeSend: function(){

				},
				success: function(res){
					if(res.status == 'error')
					{
						jQuery('#usermodal .modal-body').prepend('<div class="alert alert-warning"></div>');
						res.list.forEach(function(e){
							jQuery('#usermodal .modal-body .alert-warning').append('<p>'+e+'</p>');
						})
					}
					if(res.status == 'success')
					{
						jQuery('#usermodal .modal-body').prepend('<div class="alert alert-success"><p>'+res.msg+'</p></div>');
						setTimeout(function(){
							window.location.href = '';
						},500);
					}
				},
				errors: function(errors){

				}
			});


		});
	});
</script>
@endsection