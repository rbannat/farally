@extends('layouts.default')

@section('content')
<h2>{{{ $trip->title }}}</h2>
@stop

@section('footer')
@parent
<p><a href="#">Link</a></p>
<p><a href="#">Link</a></p>
<p><a href="#">Link</a></p>
@stop

