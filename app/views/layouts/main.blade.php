<!DOCTYPE html>
<html lang="en">
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Farally</title>
	<link href='http://fonts.googleapis.com/css?family=ABeeZee|Oxygen|Open+Sans' rel='stylesheet' type='text/css'>
	{{ HTML::style('0.1/css/normalize.css')}}
	{{ HTML::style('0.1/css/font-awesome.min.css')}}
	{{ HTML::style('0.1/css/main.css')}}
</head>
<body>
<!--[if lt IE 7]>
	<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->

	<header id="header">
		<div class="container">
			<span class="fa-stack fa-lg headarea_logo">
				<i class="fa fa-paper-plane fa-stack-1x fa-inverse"></i>
			</span>			
			@if(Session::has('message'))
			<h3 class="headarea_title">{{ Session::get('message') }}</h3>
			@endif

			@if(Auth::check())
			<a class="menu-link">
				<i class="fa fa-navicon fa-3x"></i>
			</a>    
			<nav id="site-menu" class="dropdown-menu">
				<ul>
					<li>
						<ul>
							<li>
								{{ HTML::link('/', 'Dashboard', array('class'=>'button input_text')) }}

							</li>
							<li>
								{{ HTML::link('trips/create', 'Create Trip', array('class'=>'button input_text')) }}

							</li>
							<li>
								{{ HTML::link('users/trips', 'Your Trips', array('class'=>'button input_text')) }}

							</li>
							<li>
								{{ HTML::link('users/$user->id', 'Profile', array('class'=>'button input_text')) }}  
							</li>
							<li>
								{{ HTML::link('users/$user->id', 'Settings', array('class'=>'button input_text')) }}  
							</li>
							<li>
								{{ HTML::link('/logout', 'Logout', array('class'=>'button input_text')) }}  
							</li>
						</ul>
					</li>

				</ul>
			</nav>
			@endif
		</div>
	</header>

	<section id="main">
		<div class="container">
			@yield('content')
		</div>
	</section>

	@section('footer')
	<footer id="footer">
		<div class="container">

		</div>
	</footer>
	@show

	{{ HTML::script('0.1/js/jquery/jquery-2.1.3.min.js') }}
	{{ HTML::script('0.1/js/main.js')}}
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>

</body>
</html>

