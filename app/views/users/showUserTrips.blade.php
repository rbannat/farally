@extends('layouts.main')
@section('content')
<body>
	@include('partials.header', array('title'=> 'Your Trips'))
	<section class="section main">
		@include('partials.triplist')

		<section class="section list">
			<div class="section_container">
				<h3 class="section_container_title_small "><i class="fa fa-clock-o fa-1x"></i>Pending Requests</h3>
				@if(count($pendingRequests))

				@foreach ($pendingRequests as $pendingRequest)
				<article class="list_item">
					<header class="list_item_head">
						<a href="{{ URL::route('trips.one', $pendingRequest->id) }}">
							<h3 class="list_item_title"><i class="fa fa-paper-plane fa-1x"></i>{{{ $pendingRequest->title }}}</h3>
						</a>
					</header>
					<div class="list_item_content">
						<p class="list_item_text"><i class="fa fa-location-arrow fa-1x"></i>{{{ $pendingRequest->destination }}}</p>
						<p class="list_item_text">
							<a class="profile-link" href="{{ URL::route('users.one', $pendingRequest->user->id) }}">
								<i class="fa fa-user fa-1x"></i>
								<span>{{{ $pendingRequest->user->username }}}</span>
							</a>
						</p>
					</div>
				</article>
				@endforeach
				@else
				<p>You have sent no requests so far :-(</p>
				@endif

			</div>
		</section>

		<section class="section list">
			<div class="section_container">
				<h3 class="section_container_title_small "><i class="fa fa-clock-o fa-1x"></i>Accepted Requests</h3>
				@if(count($acceptedRequests))

				@foreach ($acceptedRequests as $acceptedRequest)
				<article class="list_item">
					<header class="list_item_head">
						<a href="{{ URL::route('trips.one', $acceptedRequest->id) }}">
							<h3 class="list_item_title"><i class="fa fa-paper-plane fa-1x"></i>{{{ $acceptedRequest->title }}}</h3>
						</a>
					</header>
					<div class="list_item_content">
						<p class="list_item_text"><i class="fa fa-location-arrow fa-1x"></i>{{{ $acceptedRequest->destination }}}</p>
						<p class="list_item_text">
							<a class="profile-link" href="{{ URL::route('users.one', $acceptedRequest->user->id) }}">
								<i class="fa fa-user fa-1x"></i>
								<span>{{{ $acceptedRequest->user->username }}}</span>
							</a>
						</p>
					</div>
				</article>
				@endforeach
				@else
				<p>You have no accepted requests so far :-(</p>
				@endif

			</div>
		</section>

	</section>
	{{ HTML::script('0.1/js/jquery/jquery-2.1.3.min.js') }}
	{{ HTML::script('0.1/js/main.js')}}
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>

</body>
@stop
