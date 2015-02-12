<section class="section list">
	<div class="section_container">
		<h3 class="section_container_title_small "><i class="fa fa-clock-o fa-1x"></i>Notifications</h3>
		@if(count($notifications))
		@foreach($notifications as $notification)
		<div class="notification {{ $notification->type }}">
			@if($notification->type == 'request')
			<h3>{{{ $notification->fromUser->forename }}} wants to join your Trip "{{{$notification->regardingTrip->title}}}":</h3>
			<div class="notification_title">{{ $notification->subject }}</div>
			<div class="body">{{ $notification->body }}</div>
			<div class="request_buttons">

				@if($notification->tripRequest->status == '1')
				You accepted the request from {{{ $notification->fromUser->forename }}} for {{{$notification->regardingTrip->title}}}
				@elseif($notification->tripRequest->status == '2')
				You declined the request from {{{ $notification->fromUser->forename }}}

				@else
				{{ Form::open(array('action' => array('TripRequestsController@update', $notification->trip_request_id), 'method' => 'put', )) }}
				{{ Form::submit('Accept', array('name' => 'accept', 'class' => 'button accept')) }}
				{{ Form::submit('Decline', array('name' => 'decline', 'class' => 'button decline')) }}
				{{ Form::close() }}
				@endif

			</div>


			@elseif($notification->type == 'accepted')

			<p>{{{ $notification->fromUser->forename }}} accepted your Triprequest for "{{{$notification->regardingTrip->title}}}":</p>
			<div class="notification_title">{{ $notification->subject }}</div>
			<div class="body">{{ $notification->body }}</div>

			@elseif($notification->type == 'declined')

			<p>{{{ $notification->fromUser->forename }}} declined your Triprequest for "{{{$notification->regardingTrip->title}}}":</p>
			<div class="notification_title">{{ $notification->subject }}</div>
			<div class="body">{{ $notification->body }}</div>

			@endif
		</div>
		@endforeach
		@endif
	</div>
</section>