@extends('layouts.main')

@section('content')
<div class="padding">
	<h3>{{{ $user->forename }}}'s Dashboard</h3>
	<div class="box max_width_400">
		{{ HTML::link('trips', 'Search', array('class'=>'button input_text')) }}
		{{ HTML::link('trips/create', 'Create', array('class'=>'button input_text')) }}
		{{ HTML::link('users/trips', 'Your Trips', array('class'=>'button input_text')) }}
		{{ HTML::link('users/$user->id', 'Profile', array('class'=>'button input_text')) }}
	</div>
</div>

@stop