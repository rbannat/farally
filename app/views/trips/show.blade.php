@extends('layouts.main')
@extends('partials.header')
@section('content')
<body>
	<section class="section trip">
		<header class="section_header">
			<div class="overlay"></div>
			<div class="map_embed" style="width: 100%; overflow: hidden; height: 100%;">
				<iframe class="embed_map" width="100%" height="1000" frameborder="0" style="border:0; margin-top: -65%;" src="https://www.google.com/maps/embed/v1/place?q={{{ $trip->destination }}}&key=AIzaSyDpAQDFH6Tl19LOSnXuZeSbEyhZrYEmdrw&zoom=12"></iframe>
			</div>
			<div class="section_container">
				<div class="section_container_head">
					<h1 class="section_container_title">{{{ $trip->title }}}<br><small><i class="fa fa-user fa-1x"></i>{{{ $trip->user->username}}}</small></h1>
					<p>{{{ $trip->destination }}}</p>
				</div>
			</div>
		</header>
		<div class="section_container">
			<article>
				<h3 class="section_container_subtitle">Description</h3>
				<p>{{{ $trip->description }}}</p>
				<h3 class="section_container_subtitle">Trave time</h3>
					<p>{{{ $trip->start_date }}}</p>
					<p>{{{ $trip->end_date }}}</p>
				<h3 class="section_container_subtitle">Travellers</h3>
					<p> / {{{ $trip->max_travellers }}}</p>
					<p>{{{ $trip->transport }}}</p>
			</article>
		</div>
	</section>
		{{ HTML::script('0.1/js/jquery/jquery-2.1.3.min.js') }}
		{{ HTML::script('0.1/js/main.js')}}
		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>

</body>
@stop

