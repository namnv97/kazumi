<div class="jdgm-rev jdgm-divider-top jdgm--done-setup"> 
	<div class="jdgm-rev__header"> 
		<div class="jdgm-rev__icon">
			<img src="{{Avatar::create($rate->name)->toBase64()}}" alt="{{$rate->name}}">
		</div> 
		<span class="jdgm-rev__rating">
			@for($i = 1; $i <= 5; $i ++)
			<i class="fa {{($i <= $rate->rate_star)?'fa-star':'fa-star-o'}}" aria-hidden="true"></i>
			@endfor
		</span> 
		<span class="jdgm-rev__timestamp">{{Carbon\Carbon::parse($rate->created_at)->format('d/m/Y')}}</span> 
		<div class="jdgm-rev__br"></div> 
		<span class="jdgm-rev__buyer-badge-wrapper">  
			<span class="jdgm-rev__buyer-badge">{{($rate->status == 'pending')?'Chờ duyệt':'Đã xác minh'}}</span>  
		</span> 
		<span class="jdgm-rev__author-wrapper"> 
			<span class="jdgm-rev__author">{{$rate->name}}</span> 
			<span class="jdgm-rev__location"></span> 
		</span> 
	</div> 
	<div class="jdgm-rev__content"> 
		<div class="jdgm-rev__custom-form">  </div> 
		<b class="jdgm-rev__title">{{$rate->title}}</b> 
		<div class="jdgm-rev__body">
			<p>{{$rate->comment}}</p>
		</div> 
	</div> 
</div>