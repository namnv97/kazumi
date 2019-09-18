@if($earn->check_point())
<div class="fb-page" data-href="https://www.facebook.com/Nam-Nguy&#x1ec5;n-Web-2074291362669976/" data-tabs="" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Nam-Nguy&#x1ec5;n-Web-2074291362669976/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Nam-Nguy&#x1ec5;n-Web-2074291362669976/">Nam Nguyễn Web</a></blockquote></div>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v4.0&appId=381461119271778&autoLogAppEvents=1"></script>
<script type="text/javascript">
	jQuery.ajax({
		url: '{{route('client.account.likefacebook')}}',
		type: 'get'
	});
</script>
@else
<p>Cảm ơn bạn đã Like page</p>
@endif