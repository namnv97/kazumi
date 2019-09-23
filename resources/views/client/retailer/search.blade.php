
<div class="row">
	<div class="col-md-9 col-xs-12 col-sm-8">
		<div class="location">
			<div id="map" style="width: 100%; min-height: 450px;"></div>
		</div>
	</div>
	<div class="col-md-3 col-xs-12 col-sm-4">
		<div class="info-location">
			@if(count($city->retailer()) > 0)
			<ul>
				@foreach($city->retailer() as $key => $retailer)
				<li data-num="{{$key}}">
					<span><i class="fa fa-map-marker" aria-hidden="true"></i></span>
					<div class="stockist-result-name">
						<p><strong>{{$retailer->name}}</strong></p>
						<p>{{$city->name}}</p>
						<p>{{$retailer->phone}}</p>
						<p>{{$retailer->website}}</p>
					</div>
				</li>
				@endforeach
			</ul>
			@else
			<p>
				<i class="fa fa-map-marker" aria-hidden="true"></i> Chưa có cửa hàng tại khu vực này
			</p>
			@endif
		</div>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('.info-location li').on('click',function(){
			var i = jQuery(this).data('num');
			google.maps.event.trigger(markers[i], 'click');
		})
	})
</script>
<script>

	var list = [];
	@if(!empty($city->retailer()))
	@foreach($city->retailer() as $retailer)
	list.push({
		address: '{{$retailer->address}}',
		content: create_content('{{$retailer->address}}','{{$city->name}}','{{$retailer->phone}}','{{$retailer->website}}')
	});
	@endforeach
	@endif
	var markers = [];
	var marker;
	var map;
	var geocoder;

	var mapOptions = {
		zoom: 12,
		center: {lat: 21.0241289,lng: 105.8268598}
	}


	function initMap() {
		map = new google.maps.Map(document.getElementById('map'), mapOptions);
		geocoder = new google.maps.Geocoder();
		if(list.length > 0)
		{
			list.forEach(function(e,v){
				if(v < 10)
				{
					geocodeAddress(geocoder, map,e.address,e.content,v);
				}
				else
				{
					setTimeout(function(){
						geocodeAddress(geocoder, map,e.address,e.content,v);
					},(parseInt(v)-9)*1000);
				}

			});
		}
	}

	function geocodeAddress(geocoder, resultsMap, address,content, $key) {
		var add = address;
		geocoder.geocode({'address': add}, function(results, status) {
			if (status === 'OK') {
				if($key == 0) resultsMap.setCenter(results[0].geometry.location);
				var marker = new google.maps.Marker({
					map: resultsMap,
					draggable: false,
					position: results[0].geometry.location,
					title:"Kazumi",
				});

				markers.push(marker);
				var infowindow = new google.maps.InfoWindow;

				bindInfoW(marker, content, infowindow);
			} else {
				console.log(status);
			}
		});

	}

	function bindInfoW(marker, contentString, infowindow)
	{
		google.maps.event.addListener(marker, 'click', function() {
			infowindow.setContent(contentString);
			infowindow.open(map, marker);
		});
	};

	function create_content(address,city,phone,website)
	{
		return '<p><strong>'+address+'</strong></p><p>'+city+'</p><p><a href="tel:'+phone+'">'+phone+'</a></p><p><a href="'+website+'" target="_blank">'+website+'</a></p><p><a href="https://maps.google.com?daddr='+city+'" target="_blank">Xem trên Google Maps</a></p>';
	}
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAVpy3FtCozHvhWeKU8O3Y8zC1q1nMIGH4&callback=initMap" type="text/javascript"></script>