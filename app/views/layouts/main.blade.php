<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Farally</title>
		{{ HTML::style('0.1/css/main.css')}}
	</head>

	<body>

		<div class="headarea">
			<h1 class="headarea_title">Farally App</h1>
			<img class="headarea_logo" src="0.1/img/logo.png">
		</div>

		{{ $content }}

		<div class="container">
			@if(Session::has('message'))
					<p class="">{{ Session::get('message') }}</p>
			@endif
		</div>

	</body>
</html>