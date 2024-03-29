<header class="section header">

	<div class="section_container">

		<a href="./" class="header_logo">
			<i class="fa fa-paper-plane fa-2x"></i>
		</a>

		<h3 class="header_title">{{{ isset($title) ? $title : 'Dashboard' }}}</h3>
		<a class="header_menu-link">
			<i class="fa fa-navicon fa-2x"></i>
		</a>
		@include('partials.notifications')

	</div>

</header>

<nav id="site-menu" class="dropdown-menu padding">
	<ul class="list">
		<li> {{ HTML::link('/', 'Dashboard', array('class'=>'button input_text')) }} </li>
		<li> {{ HTML::link('trips/create', 'Create Trip', array('class'=>'button input_text')) }} </li>
		<li> {{ HTML::linkRoute('users.user_trips', 'Your Trips', array(Auth::id()), array('class' => 'button input_text')) }} </li>
		<li> {{ HTML::linkRoute('users.one', 'Profile', array(Auth::id()), array('class' => 'button input_text')) }} </li>
		<li> {{ HTML::link('logout', 'Logout', array('class'=>'button input_text')) }} </li>
	</ul>
</nav>