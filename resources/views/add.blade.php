@extends('layouts.master')

@section('title', 'Add')

@section('content')
	<div class="jumbotron text-center">
		<h1> {{ $a }} + {{ $b }} = {{ $result }} </h1>
	</div>
@stop