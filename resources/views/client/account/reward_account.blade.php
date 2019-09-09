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
								<lionpoints>{{Auth::user()->point_reward}}</lionpoints>
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
					      	<div class="lion-loyalty-panel-content">
					      		<div class="lion-loyalty-panel-content__header">Cấp bậc</div>
					      		<div class="row">
					      			@if(count($grades) > 0)
					      			@foreach($grades as $grade)
					      			@if($user_tier->tier_id == $grade->id)
					      			<div class="col-md-4 col-sm-4 col-xs-12">
					      				<div class="lion-loyalty-panel-tier-item lion-loyalty-panel-tier-item--current">
					      					<div class="lion-loyalty-panel-tier-item__header">
					      						<div class="lion-loyalty-panel-tier-item__name">{{$grade->name}}</div>
					      						<div class="lion-loyalty-panel-tier-item__context">Bạn đang ở cấp tài khoản này</div>
					      					</div>
					      					<div class="lion-loyalty-panel-tier-item__accent" style="background-color: rgb(193, 225, 197);">
					      						
					      					</div>
					      					<div class="lion-loyalty-panel-tier-item__inner">
					      						<div class="lion-loyalty-panel-tier-item__list-container">
					      							{!! $grade->tier_content !!}
					      						</div>
					      					</div>
					      				</div>
					      			</div>
					      			@else
					      			<div class="col-md-4 col-sm-4 col-xs-12">
					      				<div class="lion-loyalty-panel-tier-item">
					      					<div class="lion-loyalty-panel-tier-item__header">
					      						<div class="lion-loyalty-panel-tier-item__name">{{$grade->name}}</div>
					      						<div class="lion-loyalty-panel-tier-item__context">
					      							<span data-i18n-key="ui.dashboard.tiers.spend_until_next_tier">
					      								{!! $grade->title !!}
					      							</span>
					      						</div>
					      					</div>
					      					<div class="lion-loyalty-panel-tier-item__accent" style="background-color: rgb(193, 225, 197);">
					      						
					      					</div>
					      					<div class="lion-loyalty-panel-tier-item__inner">
					      						<div class="lion-loyalty-panel-tier-item__list-container">
					      							{!! $grade->tier_content !!}
					      						</div>
					      					</div>
					      				</div>
					      			</div>
					      			@endif
					      			@endforeach
					      			@endif
					      		</div>
					      	</div>
					    </div>
					    <div id="earn-points" class="tab-pane fade">
					      	<div class="lion-loyalty-panel-content">
					      		<div class="lion-loyalty-panel-content__header">Thêm điểm</div>
					      		<div class="row">
						      		<div class="col-md-6 col-sm-6 col-xs-12">
						      			<div class="lion-loyalty-panel-rule-item" data-toggle="modal" data-target="#myModal-account">
						      				<div class="lion-loyalty-panel-rule-item__icon" style="background: url(https://cdn.shopify.com/s/files/1/0250/1519/files/esq-rewards-program-icons-shopping-bag.svg) center/30px no-repeat #fff;"></div>
						      				<div class="lion-loyalty-panel-rule-item__title">Make a purchase</div>
						      				<div class="lion-loyalty-panel-rule-item__points"><span data-i18n-key="ui.dashboard.earn_points.points_per"><span class="value">30</span> <span class="text">points per <span class="lion-currency"><span class="lion-currency__value">$1</span></span></span></span></div>
						      			</div>
						      		</div>
						      		<div class="col-md-6 col-sm-6 col-xs-12">
						      			<div class="lion-loyalty-panel-rule-item" data-toggle="modal" data-target="#myModal-account">
						      				<div class="lion-loyalty-panel-rule-item__icon" style="background: url(https://cdn.shopify.com/s/files/1/0250/1519/files/esq-rewards-program-icons-refer-friend.svg) center/30px no-repeat #fff;"></div>
						      				<div class="lion-loyalty-panel-rule-item__title">REFER A FRIEND</div>
						      				<div class="lion-loyalty-panel-rule-item__points"><span data-i18n-key="ui.dashboard.earn_points.points_per"><span class="value">30</span> <span class="text">points per <span class="lion-currency"><span class="lion-currency__value">$1</span></span></span></span></div>
						      			</div>
						      		</div>
						      		<div class="col-md-6 col-sm-6 col-xs-12">
						      			<div class="lion-loyalty-panel-rule-item" data-toggle="modal" data-target="#myModal-account">
						      				<div class="lion-loyalty-panel-rule-item__icon" style="background: url(https://cdn.shopify.com/s/files/1/0250/1519/files/esq-rewards-program-icons-birthday.svg) center/30px no-repeat #fff;"></div>
						      				<div class="lion-loyalty-panel-rule-item__title">HAPPY BIRTHDAY</div>
						      				<div class="lion-loyalty-panel-rule-item__points"><span data-i18n-key="ui.dashboard.earn_points.points_per"><span class="value">30</span> <span class="text">points per <span class="lion-currency"><span class="lion-currency__value">$1</span></span></span></span></div>
						      			</div>
						      		</div>
						      		<div class="col-md-6 col-sm-6 col-xs-12">
						      			<div class="lion-loyalty-panel-rule-item" data-toggle="modal" data-target="#myModal-account">
						      				<div class="lion-loyalty-panel-rule-item__icon" style="background: url(https://cdn.shopify.com/s/files/1/0250/1519/files/esq-rewards-program-icons-newsletter.svg) center/30px no-repeat #fff;"></div>
						      				<div class="lion-loyalty-panel-rule-item__title">Make a purchase</div>
						      				<div class="lion-loyalty-panel-rule-item__points"><span data-i18n-key="ui.dashboard.earn_points.points_per"><span class="value">30</span> <span class="text">points per <span class="lion-currency"><span class="lion-currency__value">$1</span></span></span></span></div>
						      			</div>
						      		</div>
						      		<div class="col-md-6 col-sm-6 col-xs-12">
						      			<div class="lion-loyalty-panel-rule-item">
						      				<div class="lion-loyalty-panel-rule-item__icon" style="background: url(https://cdn.shopify.com/s/files/1/0250/1519/files/esq-rewards-program-icons-shopping-bag.svg) center/30px no-repeat #fff;"></div>
						      				<div class="lion-loyalty-panel-rule-item__title">Make a purchase</div>
						      				<div class="lion-loyalty-panel-rule-item__points"><span data-i18n-key="ui.dashboard.earn_points.points_per"><span class="value">30</span> <span class="text">points per <span class="lion-currency"><span class="lion-currency__value">$1</span></span></span></span></div>
						      			</div>
						      		</div>
						      		<div class="col-md-6 col-sm-6 col-xs-12">
						      			<div class="lion-loyalty-panel-rule-item">
						      				<div class="lion-loyalty-panel-rule-item__icon" style="background: url(https://cdn.shopify.com/s/files/1/0250/1519/files/esq-rewards-program-icons-shopping-bag.svg) center/30px no-repeat #fff;"></div>
						      				<div class="lion-loyalty-panel-rule-item__title">Make a purchase</div>
						      				<div class="lion-loyalty-panel-rule-item__points"><span data-i18n-key="ui.dashboard.earn_points.points_per"><span class="value">30</span> <span class="text">points per <span class="lion-currency"><span class="lion-currency__value">$1</span></span></span></span></div>
						      			</div>
						      		</div>
						      		<div class="col-md-6 col-sm-6 col-xs-12">
						      			<div class="lion-loyalty-panel-rule-item">
						      				<div class="lion-loyalty-panel-rule-item__icon" style="background: url(https://cdn.shopify.com/s/files/1/0250/1519/files/esq-rewards-program-icons-shopping-bag.svg) center/30px no-repeat #fff;"></div>
						      				<div class="lion-loyalty-panel-rule-item__title">Make a purchase</div>
						      				<div class="lion-loyalty-panel-rule-item__points"><span data-i18n-key="ui.dashboard.earn_points.points_per"><span class="value">30</span> <span class="text">points per <span class="lion-currency"><span class="lion-currency__value">$1</span></span></span></span></div>
						      			</div>
						      		</div>
						      	</div>
					      	</div>
					      	
					    </div>
					    <div id="get-rewards" class="tab-pane fade">
					      	<div class="lion-loyalty-panel-content">
					      		<div class="lion-loyalty-panel-content__header">Đổi điểm</div>
					      		<div class="row">
						      		<div class="col-md-6 col-sm-6 col-xs-12">
						      			<div class="lion-loyalty-panel-rule-item">
						      				<div class="lion-loyalty-panel-reward-item__content">
						      					<div class="lion-loyalty-panel-reward-item__title">Free Eyelash Glue</div>
						      					<div class="lion-loyalty-panel-reward-item__meta"></div>
						      					<div class="lion-loyalty-panel-reward-item__links">
						      						<div class="lion-loyalty-panel-reward-item__more-info-url">
						      							<a href="#">View product</a>
						      						</div>
						      					</div>
						      					<div class="lion-action-button lion-loyalty-panel-reward-item__redeem-button lion-loyalty-panel-reward-item__redeem-button--disabled">
						      						<span class="lion-loyalty-panel-reward-item__redeem-button-text">More points needed</span>
						      					</div>
						      				</div>
						      			</div>
						      		</div>
						      		<div class="col-md-6 col-sm-6 col-xs-12">
						      			<div class="lion-loyalty-panel-rule-item">
						      				<div class="lion-loyalty-panel-reward-item__content">
						      					<div class="lion-loyalty-panel-reward-item__title">$5 VOUCHER</div>
						      					<div class="lion-loyalty-panel-reward-item__meta">
						      						<span class="lion-loyalty-panel-reward-item__cost">
						      							<span>
						      								<span>
						      									<span class="value">1,000</span> 
						      									<span class="text">points</span>
						      								</span>
						      							</span>
						      						</span>
						      					</div>
						      					<div class="lion-action-button lion-loyalty-panel-reward-item__redeem-button lion-loyalty-panel-reward-item__redeem-button--disabled">
						      						<span class="lion-loyalty-panel-reward-item__redeem-button-text">More points needed</span>
						      					</div>
						      				</div>
						      			</div>
						      		</div>
						      		<div class="col-md-6 col-sm-6 col-xs-12">
						      			<div class="lion-loyalty-panel-rule-item">
						      				<div class="lion-loyalty-panel-reward-item__content">
						      					<div class="lion-loyalty-panel-reward-item__title">$5 VOUCHER</div>
						      					<div class="lion-loyalty-panel-reward-item__meta">
						      						<span class="lion-loyalty-panel-reward-item__cost">
						      							<span>
						      								<span>
						      									<span class="value">1,000</span> 
						      									<span class="text">points</span>
						      								</span>
						      							</span>
						      						</span>
						      					</div>
						      					<div class="lion-action-button lion-loyalty-panel-reward-item__redeem-button lion-loyalty-panel-reward-item__redeem-button--disabled">
						      						<span class="lion-loyalty-panel-reward-item__redeem-button-text">More points needed</span>
						      					</div>
						      				</div>
						      			</div>
						      		</div>
						      		<div class="col-md-6 col-sm-6 col-xs-12">
						      			<div class="lion-loyalty-panel-rule-item">
						      				<div class="lion-loyalty-panel-reward-item__content">
						      					<div class="lion-loyalty-panel-reward-item__title">$5 VOUCHER</div>
						      					<div class="lion-loyalty-panel-reward-item__meta">
						      						<span class="lion-loyalty-panel-reward-item__cost">
						      							<span>
						      								<span>
						      									<span class="value">1,000</span> 
						      									<span class="text">points</span>
						      								</span>
						      							</span>
						      						</span>
						      					</div>
						      					<div class="lion-action-button lion-loyalty-panel-reward-item__redeem-button lion-loyalty-panel-reward-item__redeem-button--disabled">
						      						<span class="lion-loyalty-panel-reward-item__redeem-button-text">More points needed</span>
						      					</div>
						      				</div>
						      			</div>
						      		</div>
						      	</div>
					      	</div>
					      	
					    </div>
					    <div id="refer-friends" class="tab-pane fade">
					    	<div class="lion-loyalty-panel-content">
					      		<div class="lion-loyalty-panel-content__header">Giới thiệu bạn bè</div>
					      		<div class="lion-referral-widget-panel lion-referral-widget-main">
					      			<div class="lion-referral-widget-main__icon" style="background: url(https://cdn.shopify.com/s/files/1/0250/1519/files/esq-rewards-program-icons-refer-friend.svg) center/50px no-repeat #fff;"></div>
					      			<div class="lion-referral-widget-main__intro">
					      				<span>Give a friend 
					      					<span class="lion-currency">
					      						<span class="lion-currency__value">$5</span>
					      					</span> off their first purchase and earn 3,000 points if they spend over 
					      					<span class="lion-currency">
					      						<span class="lion-currency__value">$15</span>
						      				</span>
						      			</span>
						      		</div>
						      		<div class="lion-referral-widget-main__share-controls">
						      			<div class="lion-referral-widget-main__share-buttons">
						      				<a href="#" class="lion-referral-share-button lion-referral-share-button--twitter"><i class="fa fa-twitter" aria-hidden="true"></i> TWEET </a>
						      				<a href="#" class="lion-referral-share-button lion-referral-share-button--whatsapp"><i class="fa fa-whatsapp" aria-hidden="true"></i> whatsapp </a>
						      				<a href="#" class="lion-referral-share-button lion-referral-share-button--facebook-messenger">messenger </a>
						      				<a href="#" class="lion-referral-share-button lion-referral-share-button--facebook"><i class="fa fa-facebook" aria-hidden="true"></i> SHARE </a>
						      				<a href="#" class="lion-referral-share-button lion-referral-share-button--email"><i class="fa fa-envelope" aria-hidden="true"></i> email </a>
						      			</div>
						      			<div class="lion-referral-widget-main__share-link">
						      				<div class="lion-referral-widget-main__share-link-text">Or copy your link and share it anywhere</div>
						      				<div class="lion-referral-widget-main__share-link-container">
						      					<div class="lion-referral-widget-main__share-link-url" style="text-transform: none;">https://prz.io/DxyLJPf1</div>
						      					<button class="lion-copy-to-clipboard-button btn" data-clipboard-text="https://prz.io/DxyLJPf1" title="Copy to clipboard"><i class="fa fa-clipboard" aria-hidden="true"></i></button>
						      				</div>
						      			</div>
						      		</div>
					      		</div>
					      	</div>
					    </div>
					    <div id="account" class="tab-pane fade">
					      	<div class="lion-loyalty-panel-content">
					      		<div class="lion-loyalty-panel-content__header">Hoạt động</div>
					      		<div class="lion-loyalty-panel-page-history">
					      			<table class="lion-customer-history-table table">
					      				<thead>
					      					<tr>
					      						<th data-i18n-key="ui.general.date" class="lion-customer-history-table__header-cell">Ngày</th>
					      						<th data-i18n-key="ui.general.type" class="lion-customer-history-table__header-cell">Kiểu</th>
					      						<th data-i18n-key="ui.general.action" class="lion-customer-history-table__header-cell">Hành động</th>
					      						<th data-i18n-key="ui.general.points_plural" class="lion-customer-history-table__header-cell">Điểm</th>
					      						<th data-i18n-key="ui.general.status" class="lion-customer-history-table__header-cell lion-customer-history-table__header-cell--centre-aligned">Trạng thái</th>
					      					</tr>
					      				</thead>
					      				<tbody>
					      					@foreach($rewards as $reward)
					      					<tr class="lion-customer-history-table__row">
					      						<td class="lion-customer-history-table__row-cell lion-customer-history-table__row-date">{{\Carbon\Carbon::parse($reward->created_at)->format('d/m/Y')}}</td>
					      						<td data-i18n-key="ui.general.activity" class="lion-customer-history-table__row-cell">Activity</td>
					      						<td class="lion-customer-history-table__row-cell">{{$reward->action}}</td>
					      						<td class="lion-customer-history-table__row-cell">{{$reward->point}}</td>
					      						<td class="lion-customer-history-table__row-cell lion-customer-history-table__row-status">
					      							<div class="lion-customer-history-table__bubble lion-history-state-bubble lion-history-state-bubble--approved">{{($reward->status == 'approved')?'Chấp nhận':'Chờ duyệt'}}</div>
					      						</td>
					      					</tr>
					      					@endforeach
					      				</tbody>
					      			</table>
					      		</div>
					      	</div>
					    </div>
					    <div id="help" class="tab-pane fade">
					      	<div class="lion-loyalty-panel-content">
					      		<div class="lion-loyalty-panel-content__header">Giúp đỡ</div>
					      		<div class="lion-loyalty-panel-page-help__content">
					      			{!! (!empty($reward))?$reward_help->meta_value:FALSE !!}
					      		</div>
					      	</div>
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
        <h4 class="modal-title">MAKE A PURCHASE</h4>
      </div>
      <div class="modal-body">
        	<p>Earn 3,000 points every time you refer a friend who spends over $15</p>
        	<a href="#">REFER FRIENDS</a>
      </div>
    </div>

  </div>
</div>
@endsection
@section('script')

@endsection