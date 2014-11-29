@extends('layouts.main')

@section('content')

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
				{{ Form::label('start', 'Start:') }}
				{{ Form::text('start') }}
			</li>
			<li>
				{{ Form::label('destination', 'Destination:') }}
				{{ Form::text('destination') }}
			</li>
			<li>
				{{ Form::label('start_date', 'From:') }}
				<input type="datetime-local" id="start_date" name="start_date">
			</li>
			<li>
				{{ Form::label('end_date', 'To:') }}
				<input type="datetime-local" id="end_date" name="end_date">
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


@stop
