<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Farally</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	{{ HTML::style('0.1/css/main.css')}}
</head>
<body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
            <![endif]-->

            <div class="header-container">
            	<header class="wrapper clearfix">
            		<h1 class="title">Farally App</h1>
            		<img class="headarea_logo" src="0.1/img/logo.png" alt="farally">
            		<nav>
            			@include('partials.menu')
            		</nav>
            	</header>
            </div>

            <div class="main-container">
            	<div class="main wrapper clearfix">
            		@yield('content') 
            		<div class="container">
            			@if(Session::has('message'))
            			<p class="">{{ Session::get('message') }}</p>
            			@endif
            		</div>

            	</div> <!-- #main -->
            </div> <!-- #main-container -->
            @section('footer')
            <div class="footer-container">
            	<footer class="wrapper">
            		<h3>footer</h3>
            	</footer>
            </div>
            @show
        </body>
        </html>
