@extends('layouts.main')

@section('content')
<div class="padding">
	<article>
		<header>
			<h1>{{{ $trip->title }}} by {{{ $trip->user->username}}}</h1>
			<p>{{{ $trip->description }}}</p>
		</header>
	</article>
</div>
@stop

