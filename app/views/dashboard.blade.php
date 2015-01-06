@extends('layouts.main')

@section('content')

<h3>Latest Trips</h3>
@if(count($trips))
<ul class="list">
	@foreach ($trips as $trip)
	<li class="list_item">
		<a href="trips/{{{ $trip->id }}}">
			<h3 class="list_item_title">{{{ $trip->title }}} by {{{ $trip->user->username }}}</h3>
			<p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo, velit alias praesentium veritatis! Possimus cumque, sed assumenda amet eos ipsam molestias? Doloribus deserunt et sequi illum at iusto odit, deleniti.</p>
		</a>
	</li>
	@endforeach
</ul>
@endif
@stop