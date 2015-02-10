@foreach($notifications as $notification)
@if($notification->type = 'request')
<p>
Request:
	<a href="">
		{{{$notification->subject}}}
	</a>
	<a href="">
		{{{$notification->from_user}}}
	</a>
	<a href="">
		{{{$notification->trip_id}}}
	</a>
</p>
@endif
@endforeach



<section class="section list">
		<div class="section_container">
			<h3 class="section_container_title_small "><i class="fa fa-clock-o fa-1x"></i>Notifications</h3>
			@if(count($notifications))
				@foreach($notifications as $notification)
				<div class="notification {{ $notification->type }}">
				    <div class="notification_title">{{ $notification->subject }}</div>
				    <div class="body">{{ $notification->body }}</div>
				    @if($notification->type = 'request')
						<div class="request_buttons">
							{{ HTML::link('', 'Accept', array('class'=>'button input_text')) }}
							{{ HTML::link('', 'Decline', array('class'=>'button input_text')) }}
						</div>
				    @endif
				</div>
				@endforeach
			@endif
		</div>
	</section>