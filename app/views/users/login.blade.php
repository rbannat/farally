@extends('layouts.main')
@section('content')
{{ Form::open(array('url'=>'/login', 'class'=>'padding')) }}
    <h3 class="text float_row center">Please Sign In</h3>

    {{ Form::text('email', null, array('class'=>'float_row input input_text', 'placeholder'=>'Email Address')) }}
    {{ Form::password('password', array('class'=>'float_row input input_text', 'placeholder'=>'Password')) }}

    {{ Form::submit('Login', array('class'=>'float_row button button_green'))}}
{{ Form::close() }}

<div class="padding">
	<p class="text float_row center">OR</p>
	{{ HTML::link('register', 'Sign Up') }}
</div>
@stop