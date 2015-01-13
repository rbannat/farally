<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Farally</title>
		<link href='http://fonts.googleapis.com/css?family=Lato:400,700|Roboto:400,300,700|Sans+Pro:300,400,600' rel='stylesheet' type='text/css'>
		{{ HTML::style('0.1/css/normalize.css')}}
		{{ HTML::style('0.1/css/font-awesome.min.css')}}
		{{ HTML::style('0.1/css/main.css')}}
	</head>
	<body>

		@yield('content')

		{{ HTML::script('0.1/js/jquery/jquery-2.1.3.min.js') }}
		{{ HTML::script('0.1/js/main.js')}}
		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>

	</body>
</html>

