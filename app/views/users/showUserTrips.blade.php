@extends('layouts.main')
@section('content')
<body>
	@include('partials.header', array('title'=> 'Trips from '  . $user->forename . ' ' . $user->lastname))
	<section class="section main">
		@include('partials.triplist')
	</section>
	{{ HTML::script('0.1/js/jquery/jquery-2.1.3.min.js') }}
	{{ HTML::script('0.1/js/main.js')}}
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>

</body>
@stop
