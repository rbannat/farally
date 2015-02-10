@extends('layouts.main')
@section('content')
<body class="dashboard">
	@include('partials.header', array('title'=>'Notifications'))
	@include('partials.notificationlist')
	{{ HTML::script('0.1/js/jquery/jquery-2.1.3.min.js') }}
	{{ HTML::script('0.1/js/main.js')}}
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
</body>
@stop