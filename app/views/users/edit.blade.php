@extends('layouts.main')
@section('content')
<body>
	@include('partials.header')
	<section class="section trip">
		<header class="section_header">
			<div class="overlay"></div>
			<div class="map_embed" style="width: 100%; overflow: hidden; height: 100%;">

			</div>
			<div class="section_container">
				<div class="section_container_head">
					<h1 class="section_container_title">{{{ $user->forename }}} {{{$user->lastname }}}<br><small><i class="fa fa-user fa-1x"></i>{{{ $user->username}}}</small></h1>
					<p></p>
				</div>
			</div>
		</header>
		<div class="section_container">
			
			<h3 class="section_container_subtitle">About</h3>
			<!-- if there are creation errors, they will show here -->

			{{ Form::model($user, array('route' => array('user.update', $user->id), 'method' => 'PUT')) }}
			<ul class="list">
				{{ HTML::ul($errors->all()) }}
				<li>
					{{ Form::text('username', null, array('class'=>'input input_text', 'placeholder'=>'Username')) }}
				</li>
				<li>
					{{ Form::text('forename', null, array('class'=>'input input_text', 'placeholder'=>'First Name')) }}
				</li>
				<li>
					{{ Form::text('lastname', null, array('class'=>'input input_text', 'placeholder'=>'Last Name')) }}
				</li>
				<li>
					{{ Form::text('email', null, array('class'=>'input input_text', 'placeholder'=>'Email Address')) }}
				</li>
				<li>
					{{ Form::password('password', array('class'=>'input input_text', 'placeholder'=>'Password')) }}
				</li>
				<li>
					{{ Form::password('password_confirmation', array('class'=>'input input_text', 'placeholder'=>'Confirm Password')) }}
				</li>
				<li>
					{{ Form::submit('Save Profile', array('class' => 'button')) }}
				</li>
			</ul>
			{{ Form::close() }}

		</div>
	</section>

	{{ HTML::script('0.1/js/jquery/jquery-2.1.3.min.js') }}
	{{ HTML::script('0.1/js/main.js')}}
</body>
@stop