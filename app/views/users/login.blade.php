@extends('layouts.main')
@section('content')
<body class="login">
	<section class="section login">
		<div class="section_container">
			<div class="row center">
				<i class="fa fa-paper-plane fa-4x"></i>
				<h1 class="section_container_title">Trips.<br><small>Your chance for your next adventure.</small></h1>
			</div>
			<div class="row center">
				{{ Form::open(array('url'=>'/login', 'class'=>'max_width_400')) }}
				    <p class="text center">Please Sign In</p>

				    {{ Form::text('email', null, array('class'=>'input input_text', 'placeholder'=>'Email Address')) }}
				    {{ Form::password('password', array('class'=>'input input_text', 'placeholder'=>'Password')) }}

				    {{ Form::submit('Login', array('class'=>'button button_green'))}}
				{{ Form::close() }}

				<div class="box box_sigin max_width_400">
					<p class="text center">OR</p>
					{{ HTML::link('register', 'Sign Up', array('class'=>'button input_text')) }}
				</div>
			</div>

		</div>
	</section>
	{{ HTML::script('0.1/js/jquery/jquery-2.1.3.min.js') }}
	{{ HTML::script('0.1/js/main.js')}}
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
</body>
@stop