<a href="{{ URL::to('/notifications'); }}" class="header_menu-link">
	@if(count($notifications) > 0)
		<i class="fa fa-bell fa-1x"></i> {{ count($notifications) }}
	@else
		<i class="fa fa-bell-o fa-1x"></i> {{ count($notifications) }}
	@endif
</a>