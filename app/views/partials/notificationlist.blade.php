<section class="section list">
	<div class="section_container">
		<h3 class="section_container_title_small "><i class="fa fa-clock-o fa-1x"></i>Notifications</h3>
		@if(count($notifications))
		@foreach($notifications as $notification)
		<div class="notification {{ $notification->type }}">
			@if($notification->type == 'request')
			<p>{{{ $notification->fromUser->forename }}} wants to join your Trip "{{{$notification->regardingTrip->title}}}":</p>
			<div class="notification_title">{{ $notification->subject }}</div>
			<div class="body">{{ $notification->body }}</div>
			<div class="request_buttons">
				{{ HTML::link('', 'Accept', array('class'=>'button input_text')) }}
				{{ HTML::link('', 'Decline', array('class'=>'button input_text')) }}
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