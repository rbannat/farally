@extends('layouts.main')
@extends('partials.header')
@section('content')
<body>
	<section class="section trip">
		<header class="section_header">
			<div class="overlay"></div>
			<div class="map_embed" style="width: 100%; overflow: hidden; height: 100%;">

			</div>
			<div class="section_container">
				<div class="section_container_head">
					<h1 class="section_container_title">{{{ $user->forename }}} {{{$user->lastname }}}<br><small><i class="fa fa-user fa-1x"></i>{{{ $user->username}}}</small></h1>
					<p></p>
				</div>
			</div>
		</header>
		<div class="section_container">

		</div>
	</section>
		{{ HTML::script('0.1/js/jquery/jquery-2.1.3.min.js') }}
		{{ HTML::script('0.1/js/main.js')}}
</body>
@stop

