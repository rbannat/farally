@extends('layouts.main')
@section('content')
<body>
	@include('partials.header')
	<section class="section main">
		<div class="section_container">
			@if(count($trips))
			<ul class="list">
				@foreach ($trips as $trip)
				<li class="list_item">
					<a href="{{ URL::route('trips.one', $trip->id) }}">
						<h3 class="list_item_title"><i class="fa fa-paper-plane fa-1x"></i>{{{ $trip->title }}}</h3>
						<p class="list_item_text"><i class="fa fa-location-arrow fa-1x"></i>{{{ $trip->destination }}}</p>
						<p class="list_item_text"><i class="fa fa-user fa-1x"></i>{{{ $trip->user->username }}}</p>
					</a>
				</li>
				@endforeach
			</ul>
			@endif
		</div>
	</section>
	{{ HTML::script('0.1/js/jquery/jquery-2.1.3.min.js') }}
	{{ HTML::script('0.1/js/main.js')}}
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>

</body>
@stop
