<style>
	.btn-submit-birthday
	{
		text-transform: uppercase;
		letter-spacing: 1px;
		font-size: 14px;
		border-radius: 0;
		background-color: #dab19d;
		box-shadow: inset 0 1px 3px 1px rgba(207, 153, 127, 0.8);
		color: #fff;
		padding: 9px 15px;
		margin-top: 20px;
		display: inline-block;
		cursor: pointer;
	}
</style>
@if(empty(Auth::user()->birthday))
<p>Vui lòng cung cấp ngày sinh của bạn để nhận {{$earn->point}} điểm khi đến ngày sinh nhật tới của bạn</p>
<div class="form-group" id="form_birthday">
	<input type="date" name="birthday" class="form-control" style="width: 50%;margin: 0 auto;">
</div>
<div class="text-center">
	<span class="btn-submit-birthday">Lưu ngày sinh</span>
</div>
<script type="text/javascript">
	jQuery('.btn-submit-birthday').on('click',function(){
		var $this = jQuery(this);
		var birthday = jQuery('input[name=birthday]').val();
		if(birthday.length == 0)
		{
			alert("Vui lòng nhập ngày sinh !!");
			return false;
		}
		jQuery.ajax({
			headers: {
				'X-CSRF-TOKEN': '{{ csrf_token() }}',
			},
			url: '{{route('client.account.birthday')}}',
			type: 'post',
			dataType: 'json',
			data: {
				birthday: birthday
			},
			beforeSend: function(){
				$this.html('<img src="{{asset('assets/uploads/images/loading.gif')}}" style="width: 15px;height: 15px;">');
			},
			success: function(res){
				if(res.status == 'success')
				{
					$this.parents('.modal-body').html(res.msg);
				}
			},
			errors: function(errors){
				console.log(errors);
			}
		});
	});
</script>
@else
@php
$now = \Carbon\Carbon::now();

$curyear_bd = \Carbon\Carbon::createFromFormat('Y-m-d', Auth::user()->birthday)->setYear($now->year);
$now > $curyear_bd->endOfDay() ? $next_bd = $curyear_bd->addYear(1) : $next_bd = $curyear_bd;

$date = $now->diffInDays($next_bd);
@endphp
<p>Bạn sẽ nhận được {{$earn->point}} điểm sau {{$date}} ngày</p>
@endif