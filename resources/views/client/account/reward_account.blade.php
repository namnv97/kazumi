@extends('layouts.client')
@section('title')
Tài khoản
@endsection
@section('css')

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
						<ul class="nav nav-tabs">
    						<li class="active diamond">
    							<a data-toggle="tab" href="#graded"><i class="fa fa-diamond" aria-hidden="true"></i> Bạc</a>
    						</li>
    						<li><a data-toggle="tab" href="#earn-points">Thêm điểm</a></li>
    						<li><a data-toggle="tab" href="#get-rewards">Đổi điểm</a></li>
    						<li><a data-toggle="tab" href="#refer-friends">Giới thiệu bạn bè</a></li>
    						<li><a data-toggle="tab" href="#graded">Cấp bậc</a></li>
    						<li><a data-toggle="tab" href="#account">Hoạt động</a></li>
    						<li><a data-toggle="tab" href="#help">Giúp đỡ</a></li>
  						</ul>
					</div>
				</div>
				<div class="col-md-9 col-xs-12 col-sm-12">
					<div class="tab-content">
					    <div id="graded" class="tab-pane fade in active">
					      	@include('client.account.reward.grade')
					    </div>
					    <div id="earn-points" class="tab-pane fade">
					      	@include('client.account.reward.earn_point')					      	
					    </div>
					    <div id="get-rewards" class="tab-pane fade">
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
	});
</script>
@endsection