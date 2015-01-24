@extends('layouts.main')
@section('content')
<body>
	@include('partials.header')
	<section class="section trip">
		<header class="section_header">
			<div class="overlay"></div>
			
			<div class="section_container">
				<div class="section_container_head">
					<h1 class="section_container_title">{{{ $user->forename }}} {{{$user->lastname }}}<br><small><i class="fa fa-user fa-1x"></i>{{{ $user->username}}}</small></h1>
					<p></p>
				</div>
			</div>
		</header>
		<div class="section_container">
			<h3 class="section_container_subtitle">About</h3>
			<p>
				{{{ $user->about }}}
				@if (Auth::id() == $user->id)
				<!-- edit this user (uses the edit method found at GET /users/{id}/edit -->
				<a class="button" href="{{ URL::to('users/' . $user->id . '/edit') }}">Edit Profile</a>
				@endif
			</p>
		</div>
	</section>
	{{ HTML::script('0.1/js/jquery/jquery-2.1.3.min.js') }}
	{{ HTML::script('0.1/js/main.js')}}
</body>
@stop

