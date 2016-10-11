@extends('layouts.master')

@section('content')
	<div class="container">	
		<div class="jumbotron text-center">
			<h1> Your word: {{ $word }} </h1>
			<h1> Your word Uppercase: {{ $upperWord }} </h1>
		</div>
	</div>
@stop