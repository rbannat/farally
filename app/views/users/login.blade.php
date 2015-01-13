@extends('layouts.main')
@section('content')

<section class="section main">
	<div class="section_container">
<div class="padding">
	{{ Form::open(array('url'=>'/login', 'class'=>'max_width_400')) }}
	    <h3 class="text center">Please Sign In</h3>

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
@stop