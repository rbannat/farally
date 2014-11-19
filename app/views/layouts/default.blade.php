<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Trips</title>
	<link rel="stylesheet" href="">
</head>
<body>

	@include('partials.menu')
	
	@yield('content') 

	@section('footer')
	<footer>
	<h3>Footer Headline</h3>

	</footer>
	@show

</body>
</html>