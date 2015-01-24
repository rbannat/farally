<section class="section search">
	<div class="section_container">
		<h3 class="section_container_title_small"><i class="fa fa-search fa-1x"></i>Find Your Travel Buddy<i class="fa fa-sliders filter_button fa-1x"></i></h3>
		{{ Form::open(array('url'=>'/search')) }}
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