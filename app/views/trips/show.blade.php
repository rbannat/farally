@extends('layouts.main')
@extends('partials.header')
@section('content')
<body>
	<section class="section trip">
		<div class="section_container">
			<header class="section_content_header">
				<div class="padding">
					<h1 class="section_container_title">{{{ $trip->title }}}<br><small><i class="fa fa-user fa-1x"></i>{{{ $trip->user->username}}}</small></h1>
					<p>{{{ $trip->destination }}}</p>
				</div>
				<div class="overlay"></div>
				<div class="map_embed" style="width: 100%; overflow: hidden; height: 200px;">
					<iframe class="embed_map" width="100%" height="400" frameborder="0" style="border:0; margin-top: -150px;" src="https://www.google.com/maps/embed/v1/place?q={{{ $trip->destination }}}&key=AIzaSyDpAQDFH6Tl19LOSnXuZeSbEyhZrYEmdrw"></iframe>
				</div>
			</header>
			<div class="padding">
				<article>
						<p>{{{ $trip->description }}}</p>
				</article>
			</div>
		</div>
	</section>
		{{ HTML::script('0.1/js/jquery/jquery-2.1.3.min.js') }}
		{{ HTML::script('0.1/js/main.js')}}
		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>

</body>
@stop

