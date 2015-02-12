@extends('layouts.main')
@section('content')
<body>

	@include('partials.header', array('title'=> 'Profile'))
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
					<a class="button edit" href="{{ URL::to('users/' . $user->id . '/edit') }}">Edit Profile</a>
					@endif
				</div>
			</div>
		</header>
		<div class="section_container list">
			<h3 class="section_container_subtitle">Info</h3>
			<ul>
				<li>Email: {{{ $user->email }}}</li>
				<li>Gender: {{{ $user->gender }}}</li>
				<li>Date of birth: {{{ date("d M Y",strtotime($user->birthdate)) }}}</li>
			</ul>
			<h3 class="section_container_subtitle">About</h3>
			<p>
				{{{ $user->about }}}
			</p>
			@if($trips)
				@include('partials.triplist')
			@endif
		</div>
	</section>
	{{ HTML::script('0.1/js/jquery/jquery-2.1.3.min.js') }}
	{{ HTML::script('0.1/js/main.js')}}
</body>
@stop

