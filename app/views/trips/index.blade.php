@extends('layouts.main')
@section('content')
<body class="dashboard">
	@extends('partials.header')
	<section class="section search">
		<div class="section_container">
			<h3 class="section_container_title_small"><i class="fa fa-search fa-1x"></i>Find Your Travel Buddy</h3>
			{{ Form::open(array('url'=>'/s')) }}
			{{ Form::text('location-search', null, array('class'=>'input input_text', 'placeholder'=>'search by destination', 'id'=>'location-search')) }}
			<ul class="list filter">
				<li>
					{{ Form::text('start-destination', null, array('class'=>'input input_text', 'placeholder'=>'Start place')) }}
				</li>
				<li>
					{{Form::input('date','start_date', null, array('class'=>'input input_text'))}}
				</li>
				<li>
					{{Form::input('date','end_date', null, array('class'=>'input input_text'))}}
				</li>
				<li>
					{{ Form::number('max_travellers', null, array('class'=>'input input_text', 'placeholder'=>'Max. travellers')) }}

				</li>
			</ul>
			{{ Form::submit('Search', array('class'=>'button'))}}
			{{ Form::close() }}
		</div>
	</section>
	<section class="section list">
		<div class="section_container">
			<h3 class="section_container_title_small "><i class="fa fa-clock-o fa-1x"></i>Search results</h3>
		</div>
		<div class="section_container nopadding">
			@if(count($searchResults))
			<ul class="list">
				@foreach ($searchResults as $result)
				<li class="list_item">
					<a href="trips/{{{ $result->id }}}">
						<h3 class="list_item_title"><i class="fa fa-user fa-1x"></i>{{{ $result->title }}} by {{{ $result->username }}}</h3>
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