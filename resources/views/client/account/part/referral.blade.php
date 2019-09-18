<style>
	.btn-ref
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
<p>Nhận {{$earn->point}} mỗi khi bạn giới thiệu 1 người dùng đăng ký và thanh toán hóa đơn 300.000VNĐ</p>
<span class="btn-ref">Giới thiệu ngay</span>
<script type="text/javascript">
	jQuery('.btn-ref').on('click',function(){
		jQuery('#myModal-account').modal('hide');
		jQuery('a[href=#refer-friends]').trigger('click');
	});
</script>