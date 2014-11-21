@extends('layouts.default')

@section('content')

	@if(count($trips))
		@foreach ($trips as $trip)
		<p>{{{ $trip->title }}} by {{{ $trip->user->email}}}</p>
		@endforeach
	@endif

@stop

