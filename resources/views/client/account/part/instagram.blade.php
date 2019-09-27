@if($earn->check_point())
<style>
	.btn-follow-instagram
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

	.btn-follow-instagram:hover
	{
		background: #d8703d;
	}
</style>
<p>Theo dõi chúng tôi trên Instagram</p>
<span class="btn-follow-instagram">Theo dõi</span>
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('.btn-follow-instagram').on('click',function(){
			
			jQuery.ajax({
				url: '{{route('client.account.followinstagram')}}',
				type: 'get',
				dataType: 'json',
				beforeSend: function(){
					window.open('{{$instagram->meta_value}}');
				},
				success: function(res){
					if(res.status == 'success')
					{
						setTimeout(function(){
							jQuery('#myModal-account .modal-content .modal-body').html('Cảm ơn bạn đã theo dõi chúng tôi');
						},2000);
					}
				},
				errors: function(errors){
					console.log(errors);
				}
			});
		})
	});
</script>
@else
<p>Cảm ơn bạn đã theo dõi chúng tôi trên Instagram</p>
@endif