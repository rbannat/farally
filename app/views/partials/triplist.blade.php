<section class="section list">
	<div class="section_container">
		<h3 class="section_container_title_small "><i class="fa fa-clock-o fa-1x"></i>Latest Trips</h3>
		@if(count($trips))

		@foreach ($trips as $trip)
		<article class="list_item">
			<header class="list_item_head">
				<a href="{{ URL::route('trips.one', $trip->id) }}">
					<h3 class="list_item_title"><i class="fa fa-paper-plane fa-1x"></i>{{{ $trip->title }}}</h3>
				</a>
			</header>
			<div class="list_item_content">
				<p class="list_item_text"><i class="fa fa-location-arrow fa-1x"></i>{{{ $trip->destination }}}</p>
				<p class="list_item_text">
					<a class="profile-link" href="{{ URL::route('users.one', $trip->user->id) }}">
						@if($trip->user->profile_pic)<img src="{{{$trip->user->profile_pic}}}" alt="">
						@else<i class="fa fa-user fa-1x"></i>
						@endif
						<span>{{{ $trip->user->username }}}</span>
					</a>
				</p>
			</div>
		</article>
		@endforeach

		@endif
	</div>
</section>