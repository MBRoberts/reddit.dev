@extends('layouts.master')

@section('title', 'Edit Post')

@section('header', 'Edit Post')

@section('content')
	<form class="text-center" method="POST" action="{{ action('PostsController@update', $post->id) }}">

		{!! csrf_field() !!}
		{!! method_field('PUT') !!}

		<div class="form-group row">
			<label for="title" class="col-xs-2 control-label">Title:</label>
			<div class="col-xs-10">
				<input class="input-lg form-control" id='title' type="text" name="title" value="{{ (old('title') == null) ? $post->title : old('title') }}">
			</div>
		</div>

		@if($errors->has('title'))
			<div class="alert alert-danger col-xs-10 col-xs-offset-2">
				{{ $errors->first('title') }}
			</div>
		@endif

		<div class="form-group row">
			<label for="url" class="col-xs-2 col-form-label col-form-label-lg">URL:</label>
			<div class="col-xs-10">
				<input class="input-lg form-control" type="text" name="url" value="http://{{ (old('url') == null) ? $post->url : old('url') }}">
			</div>
		</div>

		@if($errors->has('url'))
			<div class="alert alert-danger col-xs-10 col-xs-offset-2">
				{{ $errors->first('url') }}
			</div>
		@endif

		<div class="form-group row">
			<label for="content" class="col-xs-2 col-form-label col-form-label-lg">Content:</label>
			<div class="col-xs-10">
				<textarea class="input-lg form-control" name="content" rows="5" cols="40">{{ (old('content') == null) ? $post->content : old('content') }}</textarea>
			</div>
		</div>

		@if($errors->has('content'))
			<div class="alert alert-danger col-xs-10 col-xs-offset-2">
				{{ $errors->first('content') }}
			</div>
		@endif

		<button style="margin:5px;" type="submit" class="btn btn-lg btn-primary pull-right">Submit</button>
	</form>

	<form class="text-center" method="POST" action="{{ action('PostsController@destroy', $post->id) }}">
		{!! csrf_field() !!}
		{!! method_field('DELETE')!!}
		<button style="margin:5px;" class="btn btn-danger btn-lg pull-right" type="submit">Delete Post</button>
	</form>
@stop