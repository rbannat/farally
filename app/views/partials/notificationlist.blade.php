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