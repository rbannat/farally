<header class="section header">

	<div class="section_container">

		<i class="fa fa-paper-plane fa-stack-1x fa-inverse"></i>

	@if(Session::has('message'))
		<h3 class="headarea_title">{{ Session::get('message') }}</h3>
	@endif

	@if(Auth::check())

		<a class="menu-link">
			<i class="fa fa-navicon fa-4x"></i>
		</a>

		<nav id="site-menu" class="dropdown-menu">
			<ul>
				<li> {{ HTML::link('/', 'Dashboard', array('class'=>'button input_text')) }} </li>
				<li> {{ HTML::link('trips/create', 'Create Trip', array('class'=>'button input_text')) }} </li>
				<li> {{ HTML::link('users/trips', 'Your Trips', array('class'=>'button input_text')) }} </li>
				<li> {{ HTML::link('users/$user->id', 'Profile', array('class'=>'button input_text')) }} </li>
				<li> {{ HTML::link('users/$user->id', 'Settings', array('class'=>'button input_text')) }} </li>
				<li> {{ HTML::link('/logout', 'Logout', array('class'=>'button input_text')) }} </li>
			</ul>
		</nav>
	@endif
	</div>
</header>