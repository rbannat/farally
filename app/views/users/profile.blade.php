@extends('layouts.main')
@section('content')
<body>
	@include('partials.header')
	<section class="section trip">
		<header class="section_header">
			<div class="overlay"></div>
			
			<div class="section_container">
				<div class="section_container_head">
					<figure class="profile-image">
						<img src="{{{ $user->profile_pic }}}" alt="" >
					</figure>
					<h1 class="section_container_title">{{{ $user->forename }}} {{{$user->lastname }}}<br><small><i class="fa fa-user fa-1x"></i>{{{ $user->username}}}</small></h1>
					@if (Auth::id() == $user->id)
					<!-- edit this user (uses the edit method found at GET /users/{id}/edit -->
					<a class="button" href="{{ URL::to('users/' . $user->id . '/edit') }}">Edit Profile</a>
					@endif
				</div>
			</div>
		</header>
		<div class="section_container list">
			<h3 class="section_container_subtitle">Contact</h3>
			<p>
				{{{ $user->email }}}
			</p>
			<h3 class="section_container_subtitle">About</h3>
			<p>
				{{{ $user->about }}}
			</p>
			<h3 class="section_container_subtitle">Hosted Trips</h3>
				@foreach ($trips as $trip)
				<article class="list_item ">
					<header >
						<a href="{{ URL::route('trips.one', $trip->id) }}">
							<h3 class="list_item_title"><i class="fa fa-paper-plane fa-1x"></i>{{{ $trip->title }}}</h3>
						</a>
					</header>

					<div class="content">
						<p class="list_item_text"><i class="fa fa-location-arrow fa-1x"></i>{{{ $trip->destination }}}</p>
						<p class="list_item_text">
							<a class="" href="{{ URL::route('users.one', $trip->user->id) }}">
							@if($user->profile_pic)
								<img src="{{{$user->profile_pic}}}" alt="">

								@else
								<i class="fa fa-user fa-1x"></i>
								@endif
								{{{ $trip->user->username }}}
							</a>
						</p>
					</div>
				</article>
				@endforeach
		</div>
	</section>
	{{ HTML::script('0.1/js/jquery/jquery-2.1.3.min.js') }}
	{{ HTML::script('0.1/js/main.js')}}
</body>
@stop

