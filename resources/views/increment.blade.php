@extends('layouts.master')

@section('title', 'Increment')

@section('content')
	<div class="jumbotron text-center">
		<h1> {{ $num }} + 1 = {{ $inc }} </h1>
		<a href="{{action('HomeController@increment', $inc)}}"><h1 class="jumbotron">Again</h1></a>
	</div>
@stop