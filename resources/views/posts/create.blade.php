@extends('layouts.master')

@section('title', 'Create Form')

@section('content')
	<h1 class="jumbotron text-center">Create Form</h1>
	<form class="text-center" method="POST" action="{{ action('PostsController@store') }}">

		{!! csrf_field() !!}

		<div class="form-group row">
			<label for="name" class="col-xs-2 control-label">Title:</label>
			<div class="col-xs-10">
				<input class="input-lg form-control" id="title" type="text" name="title" value="{{ old('title') }}">
			</div>
		</div>

		<div class="form-group row">
			<label for="website" class="col-xs-2 col-form-label col-form-label-lg">URL:</label>
			<div class="col-xs-10">
				<input class="input-lg form-control" type="text" id="url" name="url" value="{{ old('url') }}">
			</div>
		</div>

		<div class="form-group row">
			<label for="content" class="col-xs-2 col-form-label col-form-label-lg">Content:</label>
			<div class="col-xs-10">
				<textarea class="input-lg form-control" name="content" id="content" rows="5" cols="40">
					{{ old('content') }}
				</textarea>
			</div>
		</div>
		<button type="submit" class="btn btn-lg btn-primary">Submit</button>
	</form>
@stop