<section class="section list">
	<div class="section_container">
		<h3 class="section_container_title_small "><i class="fa fa-clock-o fa-1x"></i>Latest Trips</h3>
		@if(count($trips))
		<ul class="list">
			@foreach ($trips as $trip)
			<li class="list_item">
				<a href="{{ URL::route('trips.one', $trip->id) }}">
					<h3 class="list_item_title"><i class="fa fa-paper-plane fa-1x"></i>{{{ $trip->title }}}</h3>
					<p class="list_item_text"><i class="fa fa-location-arrow fa-1x"></i>{{{ $trip->destination }}}</p>
					<p class="list_item_text"><i class="fa fa-user fa-1x"></i>{{{ $trip->user->username }}}</p>
				</a>
			</li>
			@endforeach
		</ul>
		@endif
	</div>
</section>