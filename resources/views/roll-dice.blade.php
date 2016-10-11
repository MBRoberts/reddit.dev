@extends('layouts.master')

@section('title', 'Roll Dice')

@section('content')
	<div class="jumbotron text-center">
		<h2> Die Roll: {{$dice}} </h2>
		<h2> Your Guess: {{$guess}} </h2>
		<h2> {{$result}} </h2>
	</div>
@stop
		