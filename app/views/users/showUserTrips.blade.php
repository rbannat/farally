@extends('layouts.main')
@section('content')
<body>
	@include('partials.header')
	<section class="section main">
		<div class="section_container list">
			<h3 class="section_container_title_small ">Your Trips</h3>
			@if(count($trips))
				@foreach ($trips as $trip)
				<article class="list_item">
					<header >
						<a href="{{ URL::route('trips.one', $trip->id) }}">
							<h3 class="list_item_title"><i class="fa fa-paper-plane fa-1x"></i>{{{ $trip->title }}}</h3>
						</a>
					</header>

					<div class="content">
						<p class="list_item_text"><i class="fa fa-location-arrow fa-1x"></i>{{{ $trip->destination }}}</p>
						<p class="list_item_text">
							<a class="" href="{{ URL::route('users.one', $trip->user->id) }}">
							@if($trip->user->profile_pic)
								<img src="{{{$trip->user->profile_pic}}}" alt="">

								@else
								<i class="fa fa-user fa-1x"></i>
								@endif
								{{{ $trip->user->username }}}
							</a>
						</p>
					</div>
				</article>
				@endforeach
			@endif
		</div>
	</section>
	{{ HTML::script('0.1/js/jquery/jquery-2.1.3.min.js') }}
	{{ HTML::script('0.1/js/main.js')}}
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>

</body>
@stop
