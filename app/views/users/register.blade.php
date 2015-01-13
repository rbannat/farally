@extends('layouts.main')
@section('content')

<section class="section main">
    <div class="section_container">
{{ HTML::link('login', 'Login') }}
{{ Form::open(array('url'=>'users/add', 'class'=>'')) }}
    <h2 class="">Please Register</h2>
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>

    {{ Form::text('username', null, array('class'=>'', 'placeholder'=>'Username')) }}

    {{ Form::text('forename', null, array('class'=>'', 'placeholder'=>'First Name')) }}
    {{ Form::text('lastname', null, array('class'=>'', 'placeholder'=>'Last Name')) }}
    {{ Form::text('email', null, array('class'=>'', 'placeholder'=>'Email Address')) }}
    {{ Form::password('password', array('class'=>'', 'placeholder'=>'Password')) }}
    {{ Form::password('password_confirmation', array('class'=>'', 'placeholder'=>'Confirm Password')) }}
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

    {{ Form::submit('Register', array('class'=>''))}}
{{ Form::close() }}
    </div>
</section>
@stop