@extends('layouts.main')

@section('content')
<article>
	<header>
		<h1>{{{ $trip->title }}} by {{{ $trip->user->username}}}</h1>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sodales urna non odio egestas tempor. Nunc vel vehicula ante. Etiam bibendum iaculis libero, eget molestie nisl pharetra in. In semper consequat est, eu porta velit mollis nec.</p>
	</header>
</article>
@stop

