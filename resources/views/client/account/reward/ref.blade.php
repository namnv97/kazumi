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
				<a href="https://twitter.com/intent/tweet?url={{Auth::user()->short_link}}&text=Tham gia ngay với tôi&via={{route('home')}}&hashtags=Kazumi" target="_blank" class="lion-referral-share-button lion-referral-share-button--twitter"><i class="fa fa-twitter" aria-hidden="true"></i> TWEET </a>
				<a href="https://api.whatsapp.com/send?text={{Auth::user()->short_link}}" class="lion-referral-share-button lion-referral-share-button--whatsapp" target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i> whatsapp </a>
				<a href="http://www.facebook.com/dialog/send?app_id=381461119271778&amp;link={{Auth::user()->short_link}}&amp;redirect_uri={{route('home')}}&amp;display=popup" class="lion-referral-share-button lion-referral-share-button--facebook-messenger" target="_blank">messenger </a>
				<a href="https://www.facebook.com/sharer.php?u={{Auth::user()->short_link}}" class="lion-referral-share-button lion-referral-share-button--facebook" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i> SHARE </a>
				<a href="mailto:?subject=Tham gia cùng tôi&amp;body=Đăng ký ngay tại {{Auth::user()->short_link}}." class="lion-referral-share-button lion-referral-share-button--email" target="_blank"><i class="fa fa-envelope" aria-hidden="true"></i> email </a>
			</div>
			<div class="lion-referral-widget-main__share-link">
				<div class="lion-referral-widget-main__share-link-text">Hoặc Sao chép link bên dưới và chia sẻ nó ở bất cứ đâu</div>
				<div class="lion-referral-widget-main__share-link-container">
					<div class="lion-referral-widget-main__share-link-url" style="text-transform: none;">{{Auth::user()->short_link}}</div>
					<button class="lion-copy-to-clipboard-button btn" data-clipboard-text="{{Auth::user()->short_link}}" title="Copy to clipboard">
						<i class="fa fa-clipboard" aria-hidden="true"></i>
						<i class="fa fa-check" aria-hidden="true"></i>
					</button>
				</div>
			</div>
		</div>
	</div>
</div>