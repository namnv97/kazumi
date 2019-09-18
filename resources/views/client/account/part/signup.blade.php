@if($earn->check_point())
<style>
	.btn-signup	
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
<p>Đăng ký ngay để nhận nhưng thông tin mới nhất</p>
<span class="btn-signup">Đăng ký ngay</span>
<script type="text/javascript">
	jQuery('.btn-signup').on('click',function(){
		var $this= jQuery(this);
		jQuery.ajax({
			url: '{{route('client.account.signup')}}',
			type: 'get',
			dataType: 'json',
			beforeSend: function(){
				$this.html('<img src="{{asset('assets/uploads/images/loading.gif')}}" style="width: 20px;height: 20px;">');
			},
			success: function(res){
				$this.parents('.modal-body').html(res.msg);
			},
			errors: function(errors){
				console.log(errors);
			}
		})
	});
</script>
@else
<p>Cảm ơn bạn đã đăng ký Email nhận thông tin từ chúng tôi !</p>
@endif