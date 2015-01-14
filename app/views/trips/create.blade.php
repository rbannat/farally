@extends('layouts.main')
@extends('partials.header')
@section('content')
<body>
<section class="section main">
	<div class="section_container">
<article>
	<header>
		<h1>Create Trip</h1>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sodales urna non odio egestas tempor. Nunc vel vehicula ante. Etiam bibendum iaculis libero, eget molestie nisl pharetra in. In semper consequat est, eu porta velit mollis nec.</p>
	</header>
	<section>
		{{ HTML::ul($errors->all()) }}
		{{ Form::open(array('url' => 'trips')) }}
		<ul>
			<li>
				{{ Form::label('title', 'Title:') }}
				{{ Form::text('title') }}
			</li>
			<li>
				{{ Form::label('start-destination', 'Start:') }}
				{{ Form::text('start-destination') }}
			</li>
			<li>
				{{ Form::label('destination', 'Destination:') }}
				{{ Form::text('destination') }}
			</li>
			<li>
				{{ Form::label('start_date', 'From:') }}
				{{Form::input('date','start_date')}}
			</li>
			<li>
				{{ Form::label('end_date', 'To:') }}
				{{Form::input('date','end_date')}}
			</li>
			<li>
				{{ Form::label('description', 'Description:') }}
				{{ Form::textarea('description') }}
			</li>
			<li>

				{{ Form::label('max_travellers', 'Max Travellers:') }}
				{{ Form::number('max_travellers') }}

			</li>
			<li>
				{{ Form::submit('Create') }}
			</li>
		</ul>
		{{ Form::close() }}
	</section>
</article>

	</div>
</section>
{{ HTML::script('0.1/js/jquery/jquery-2.1.3.min.js') }}
		{{ HTML::script('0.1/js/main.js')}}
		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>

	</body>
@stop
