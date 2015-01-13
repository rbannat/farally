@extends('layouts.main')
@extends('partials.header')
@section('content')

<section class="section main">
	<div class="section_container">
<div class="padding">
	<article>
		<header>
			<h1>{{{ $trip->title }}} by {{{ $trip->user->username}}}</h1>
			<p>{{{ $trip->description }}}</p>
		</header>
	</article>
</div>
	</div>
</section>
@stop

