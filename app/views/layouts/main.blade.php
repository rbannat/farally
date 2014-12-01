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
		{{ HTML::style('0.1/css/main.css')}}
	</head>
	<body>
		<!--[if lt IE 7]>
			<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
		<![endif]-->

		<div class="headarea">
			<div class="head_colorfilm"></div>
			<img class="headarea_logo" src="0.1/img/logo.jpg">
			@if(Session::has('message'))
				<h3 class="headarea_title">{{ Session::get('message') }}</h3>
			@endif
		</div>

		<div class="content">

			@yield('content')

		</div>

		@section('footer')
		<div class="footer-container">
			<footer class="wrapper">
				<h3>footer</h3>
			</footer>
		</div>
		@show

	</body>
</html>

