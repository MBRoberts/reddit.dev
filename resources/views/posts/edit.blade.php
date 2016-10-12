@extends('layouts.master')

@section('title', 'Create Form')

@section('content')
	<h1 class="jumbotron text-center">Create Form</h1>
	<form class="text-center" method="POST" action="{{ action('PostsController@update', 1) }}">

		{!! csrf_field() !!}
		{!! method_field('PUT') !!}

		<div class="form-group row">
			<label for="name" class="col-xs-2 control-label">Title:</label>
			<div class="col-xs-10">
				<input class="input-lg form-control" id="name" type="text" name="name" value="{{ old('name') }}">
			</div>
		</div>

		<div class="form-group row">
			<label for="website" class="col-xs-2 col-form-label col-form-label-lg">URL:</label>
			<div class="col-xs-10">
				<input class="input-lg form-control" type="text" name="website" value="{{ old('website') }}">
			</div>
		</div>

		<div class="form-group row">
			<label for="content" class="col-xs-2 col-form-label col-form-label-lg">Content:</label>
			<div class="col-xs-10">
				<textarea class="input-lg form-control" name="content" rows="5" cols="40">
					{{ old('content') }}
				</textarea>
			</div>
		</div>
		<button type="submit" class="btn btn-lg btn-primary">Submit</button>
	</form>
@stop