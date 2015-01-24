@extends('layouts.main')
@section('content')
<body>
	@include('partials.header', array('title'=>'' . $trip->title))
	<section class="section trip">
		<header class="section_header">
			<div class="overlay"></div>
			<div class="map_embed" style="width: 100%; overflow: hidden;">
				<div id="map-canvas" class="embed_map"></div>
			</div>
			<div class="section_container">
				<div class="header-toggle">
					<i class="fa fa-expand fa-2x"></i>
					<i class="fa fa-compress fa-2x"></i>
				</div>
				<div class="section_container_head">
					<h1 class="section_container_title">{{{ $trip->title }}}<br><small><i class="fa fa-user fa-1x"></i>{{{ $trip->username}}}</small></h1>
					<p id="destination">{{{ $trip->destination }}}</p>
				</div>
			</div>
		</header>
	</section>
	<section class="section content">
		<div class="section_metabox">
			<ul class="section_metabox_list list">
				<li class="section_metabox_list_item destination"><i class="fa fa-location-arrow"></i>{{{ $trip->destination }}}</li>
				<li class="section_metabox_list_item start_date"><i class="fa fa-calendar"></i>{{{ $trip->start_date }}} - {{{ $trip->end_date }}}</li>
				<li class="section_metabox_list_item transport"><i class="fa fa-car"></i>{{{ $trip->transport }}}</li>
			</ul>
		</div>
		<div class="section_container">
			<article>
				<h3 class="section_container_subtitle">Description</h3>
				<p>{{{ $trip->description }}}</p>
				<h3 class="section_container_subtitle">Travellers</h3>
					<p> / {{{ $trip->max_travellers }}}</p>
			</article>
		</div>
	</section>
		{{ HTML::script('0.1/js/jquery/jquery-2.1.3.min.js') }}
		{{ HTML::script('0.1/js/main.js')}}
		<script type="text/javascript">
			$('.header-toggle').click(function() {
		    	$('.section_header').toggleClass('expand');
		    });
		</script>
		<script>

			function initialize() {
				var geocoder, map;
				var address = document.getElementById('destination').innerHTML;
			    geocoder = new google.maps.Geocoder();
			    geocoder.geocode({
			        'address': address
			    }, function(results, status) {
			        if (status == google.maps.GeocoderStatus.OK) {
			            var myOptions = {
			                zoom: 10,
			                center: results[0].geometry.location,
			                mapTypeId: google.maps.MapTypeId.ROADMAP,
			    			disableDefaultUI: true
			            }
			            map = new google.maps.Map(document.getElementById('map-canvas'), myOptions);

			            var marker = new google.maps.Marker({
			                map: map,
			                position: results[0].geometry.location
			            });
			        }
			    });
			}

			function loadScript() {
				var script = document.createElement('script');
				script.type = 'text/javascript';
				script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&' + 'callback=initialize';
				document.body.appendChild(script);
			}

			window.onload = loadScript;

		</script>
</body>
@stop
