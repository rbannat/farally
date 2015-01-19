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
		<ul class="list">
			<li>
				{{ Form::text('title', null, array('class'=>'input input_text', 'placeholder'=>'Title')) }}
			</li>
			<li>
				{{ Form::text('start-destination', null, array('class'=>'input input_text', 'placeholder'=>'Start place')) }}
			</li>
			<li>
				{{ Form::text('destination', null, array('class'=>'input input_text', 'placeholder'=>'Destination')) }}
			</li>
			<li>
				{{Form::input('date','start_date', null, array('class'=>'input input_text'))}}
			</li>
			<li>
				{{Form::input('date','end_date', null, array('class'=>'input input_text'))}}
			</li>
			<li>
				{{ Form::textarea('description', null, ['class' => 'input input_text']) }}
			</li>
			<li>
				{{ Form::number('max_travellers', null, array('class'=>'input input_text', 'placeholder'=>'Max. travellers')) }}
			</li>
			<li>
				{{ Form::submit('Create', array('class'=>'button')) }}
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
