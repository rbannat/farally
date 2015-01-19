<header class="section header">

	<div class="section_container">

		<i class="header_logo fa fa-paper-plane fa-2x"></i>

		<h3 class="header_title">Dashboard</h3>

		<a class="header_menu-link">
			<i class="fa fa-navicon fa-2x"></i>
		</a>

	</div>

</header>

<nav id="site-menu" class="dropdown-menu padding">
	<ul class="list">
		<li> {{ HTML::link('/', 'Dashboard', array('class'=>'button input_text')) }} </li>
		<li> {{ HTML::link('trips/create', 'Create Trip', array('class'=>'button input_text')) }} </li>
		<li> {{ HTML::link('users/trips', 'Your Trips', array('class'=>'button input_text')) }} </li>
		<li> {{ HTML::link('users/$user->id', 'Profile', array('class'=>'button input_text')) }} </li>
		<li> {{ HTML::link('users/$user->id', 'Settings', array('class'=>'button input_text')) }} </li>
		<li> {{ HTML::link('/logout', 'Logout', array('class'=>'button input_text')) }} </li>
	</ul>
</nav>