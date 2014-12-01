<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href='http://fonts.googleapis.com/css?family=ABeeZee|Oxygen|Open+Sans' rel='stylesheet' type='text/css'>
		<title>Farally</title>
		{{ HTML::style('0.1/css/main.css')}}
	</head>

	<body>

		<div class="headarea">
			<div class="head_colorfilm"></div>
			<img class="headarea_logo" src="0.1/img/logo.jpg">
			@if(Session::has('message'))
				<h3 class="headarea_title">{{ Session::get('message') }}</h3>
			@endif
		</div>

		<div class="content">

			{{ $content }}

		</div>

	</body>
</html>