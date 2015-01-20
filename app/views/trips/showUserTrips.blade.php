@extends('layouts.main')
@extends('partials.header')
@section('content')
<body>
<section class="section main">
	<div class="section_container">
@if(count($trips))
<ul class="list">
	@foreach ($trips as $trip)
	<li class="list_item">
		<a href="trips/{{{ $trip->id }}}">
			<h3 class="list_item_title">{{{ $trip->title }}} by {{{ $trip->user_id }}}</h3>
			<p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo, velit alias praesentium veritatis! Possimus cumque, sed assumenda amet eos ipsam molestias? Doloribus deserunt et sequi illum at iusto odit, deleniti.</p>
		</a>
	</li>
	@endforeach
</ul>
@endif
	</div>
</section>
{{ HTML::script('0.1/js/jquery/jquery-2.1.3.min.js') }}
		{{ HTML::script('0.1/js/main.js')}}
		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>

	</body>
@stop
