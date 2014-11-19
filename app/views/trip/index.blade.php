@extends('layouts.default')

@section('content')

	@if(count($trips))
		@foreach ($trips as $trip)
		<p>{{{ $trip->title }}}</p>
		@endforeach
	@endif

@stop

