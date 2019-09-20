@extends('layouts.client')
@section('title')
Tài khoản
@endsection
@section('css')
<style>
	.fa-copy
	{
		font-size: 20px;
		display: inline-block;
		padding-left: 10px;
		color: red;
		cursor: pointer;
	}
	.my-voucher h3
	{
		border-bottom: thin #ddd solid;
		font-size: 20px;
	}
	.my-voucher .fa-check
	{
		color: #41d683;
		opacity: 0;
	}

	.lion-copy-to-clipboard-button .fa-check
	{
		display: none;
	}

	.lion-copy-to-clipboard-button.active .fa-check
	{
		display: block !important;
	}

	.lion-copy-to-clipboard-button.active .fa-clipboard
	{
		display: none !important;
	}

	.lion-copy-to-clipboard-button.active
	{
		background: #52b740;
		color: #fff;
	}

	.table tbody tr td>strong
	{
		display: none;
	}

	@media(max-width: 991px){
		.table tbody tr td
		{
			display: block;
		}
		.table tbody tr td>strong
		{
			display: inline-block;
		}

		.table thead
		{
			display: none;
		}

		.table tbody tr
		{
			display: block;
			margin: 15px 0;
		}

	}
</style>
@endsection
@section('content')
<div class="contact bg-grey account rewards-account">
	<div class="container">
		<div class="title-acount">
			<h1 class="title-large">Điểm thưởng của bạn</h1>
		</div>
		<div class="rewards-account-content">
			<div class="row">
				<div class="col-md-3 col-xs-12 col-sm-12">
					<div class="lion-loyalty-panel-sidebar">
						<div class="lion-loyalty-panel-sidebar__points">
							<span class="lion-loyalty-panel-sidebar__points-value">
								<lionpoints>{{Auth::user()->point()->point}}</lionpoints>
							</span>
							<span class="lion-loyalty-panel-sidebar__points-text">điểm</span>
						</div>
						<div class="diamond">
							<span>
								<i class="fa fa-diamond" aria-hidden="true"></i> Bạc
							</span>
						</div>
						<ul class="nav nav-tabs">
    						<li><a data-toggle="tab" href="#earn-points">Thêm điểm</a></li>
    						<li class="active"><a data-toggle="tab" href="#get-rewards">Đổi điểm</a></li>
    						<li><a data-toggle="tab" href="#refer-friends">Giới thiệu bạn bè</a></li>
    						<li><a data-toggle="tab" href="#graded">Cấp bậc</a></li>
    						<li><a data-toggle="tab" href="#account">Hoạt động</a></li>
    						<li><a data-toggle="tab" href="#help">Giúp đỡ</a></li>
  						</ul>
					</div>
				</div>
				<div class="col-md-9 col-xs-12 col-sm-12">
					<div class="tab-content">
					    <div id="graded" class="tab-pane fade">
					      	@include('client.account.reward.grade')
					    </div>
					    <div id="earn-points" class="tab-pane fade">
					      	@include('client.account.reward.earn_point')					      	
					    </div>
					    <div id="get-rewards" class="tab-pane fade in active">
					      	@include('client.account.reward.get_reward')					      	
					    </div>
					    <div id="refer-friends" class="tab-pane fade">
					    	@include('client.account.reward.ref')
					    </div>
					    <div id="account" class="tab-pane fade">
					      	@include('client.account.reward.account')
					    </div>
					    <div id="help" class="tab-pane fade">
					      	@include('client.account.reward.help')
					    </div>
				  </div>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="myModal-account" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        	
      </div>
    </div>

  </div>
</div>
@endsection
@section('script')
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v4.0&appId=381461119271778&autoLogAppEvents=1"></script>
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('#earn-points .lion-loyalty-panel-rule-item').on('click',function(){
			var title = jQuery(this).find('.lion-loyalty-panel-rule-item__title').text();
			var key_code = jQuery(this).find('.lion-loyalty-panel-rule-item__title').data('key');
			jQuery('#myModal-account .modal-title').text(title);
			jQuery.ajax({
				url: '{{route('client.account.earn_point_part')}}',
				type: 'get',
				dataType: 'html',
				data: {
					key_code: key_code
				},
				success: function(res){
					jQuery('#myModal-account .modal-body').html(res);
					jQuery('#myModal-account').modal('show');
				},
				errors: function(errors){
					console.log(errors);
				}
			});
			
		});

		jQuery('#get-rewards .item.active').on('click',function(){
			jQuery('#getModal #rgid').remove();
			var txt = jQuery(this).parents('.lion-loyalty-panel-reward-item__content').find('.lion-loyalty-panel-reward-item__title').text();
			var point = jQuery(this).find('span').data('point');
			var id = jQuery(this).find('span').data('value');
			jQuery('#getModal span.title_lost').text(txt);
			jQuery('#getModal span.point_lost').text(point);
			jQuery('#getModal .modal-body').prepend('<input type="hidden" id="rgid" value="'+id+'">');
			jQuery('#getModal').modal('show');
		});

		jQuery('#getModal .action .btn-cancel').on('click',function(){
			jQuery('#getModal').modal('hide');
		})

		jQuery('#getModal .action .btn-access').on('click',function(){
			Swal.fire({
				title: 'Bạn muốn đổi Voucher này?',
				text: "",
				type: 'info',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Đổi ngay',
				cancelButtonText: "Hủy"
			}).then((result) => {
				if (result.value) {
					var id = jQuery('#rgid').val();
					jQuery.ajax({
						headers: {
							'X-CSRF-TOKEN': '{{ csrf_token() }}',
						},
						url: '{{route('client.voucher.create')}}',
						type: 'post',
						dataType: 'json',
						data:{
							id: id
						},
						beforeSend: function(){

						},
						success: function(res){
							if(res.status == 'success') location.reload();
						},
						errors: function(errors){
							console.log(errors);
						}
					});
				}
				else
				{
					jQuery('#getModal').modal('hide');
				}
			})
		})

		jQuery('.lion-loyalty-panel-sidebar div.diamond>span').on('click',function(){
			jQuery('.lion-loyalty-panel-sidebar .nav-tabs>li a[href=#graded]').trigger('click');
		});

		if(jQuery(window).width() < 992)
		{
			jQuery('.lion-loyalty-panel-sidebar .nav-tabs>li').not('.active').hide();
			jQuery('.lion-loyalty-panel-sidebar .nav-tabs').prepend('<span class="fa fa-caret-down muchmore"></span>');
			jQuery('.lion-loyalty-panel-sidebar .nav-tabs').on('click','span.muchmore',function(){
				jQuery(this).toggleClass('active');
				jQuery('.lion-loyalty-panel-sidebar .nav-tabs>li').not('.active').slideToggle(400);
			})
		}

		jQuery('.my-voucher span.fa-copy').on('click',function(){
			var $this = jQuery(this);
			var copyText = $this.prev();
			var textArea = document.createElement("textarea");
			textArea.value = copyText.text();
			document.body.appendChild(textArea);
			textArea.select();
			document.execCommand("Copy");
			textArea.remove();
			$this.next().css('opacity',1);
			setTimeout(function(){
				$this.next().css('opacity',0);
			},1000);
		})

		jQuery('.lion-copy-to-clipboard-button').on('click',function(){
			var $this = jQuery(this);
			var txt = jQuery(this).data('clipboard-text');
			var textArea = document.createElement("textarea");
			textArea.value = txt;
			document.body.appendChild(textArea);
			textArea.select();
			document.execCommand("Copy");
			textArea.remove();
			$this.addClass('active')
			setTimeout(function(){
				$this.removeClass('active');
			},1000);
		});

		function copy_password() {
			var copyText = document.getElementById("pwd_spn");
			var textArea = document.createElement("textarea");
			textArea.value = copyText.textContent;
			document.body.appendChild(textArea);
			textArea.select();
			document.execCommand("Copy");
			textArea.remove();
		}
	});
</script>
@endsection