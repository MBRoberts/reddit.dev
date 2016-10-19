@extends('layouts.master')

@section('title', 'Create Form')

@section('header', 'Create Form')

@section('content')
	<form class="text-center" method="POST" action="{{ action('PostsController@store') }}" enctype="multipart/form-data">

		{!! csrf_field() !!}

		<div class="form-group row">
			<label for="name" class="col-xs-2 control-label">Title:</label>
			<div class="col-xs-10">
				<input class="input-lg form-control" id="title" type="text" name="title" value="{{ old('title') }}" placeholder="Title Of Post" autofocus>
			</div>
		</div>

		@if($errors->has('title'))
			<div class="alert alert-danger col-xs-10 col-xs-offset-2">
				{{ $errors->first('title') }}
			</div>
		@endif

		<div class="form-group row">
			<label for="url" class="col-xs-2 control-label">URL:</label>
			<div class="col-xs-10">
				<input class="input-lg form-control" type="url" id="url" name="url" value="{{ old('url') }}" placeholder="Website URL">
			</div>
		</div>

		@if($errors->has('url'))
			<div class="alert alert-danger col-xs-10 col-xs-offset-2">
				{{ $errors->first('url') }}
			</div>
		@endif

		<div class="form-group row">
			<label for="content" class="col-xs-2 control-label">Content:</label>
			<div class="col-xs-10">
				<textarea class="input-lg form-control" name="content" id="content" rows="5" cols="40" placeholder="Post Content">{{ old('content') }}</textarea>
			</div>
		</div>

		@if($errors->has('content'))
			<div class="alert alert-danger col-xs-10 col-xs-offset-2">
				{{ $errors->first('content') }}
			</div>
		@endif

		<div class="form-group row">
			<label for="image" class="col-xs-2 control-label">Upload Image:</label>
			<div class="col-xs-10">
				<input type="file" class="input-lg form-control" name="image" id="image" accept="image/*">
				<div class="col-xs-5 col-xs-offset-3">
					<img class="img-thumbnail thumbnail" id="preview" src="#" alt="Image Preview">
				</div>
			</div>
		</div>



		<button style="margin: 5px;" type="submit" class="pull-right btn btn-lg btn-primary">Submit</button>
		<button style="margin: 5px;" type="reset" class="pull-right btn btn-lg btn-default">Clear</button>
	</form>
@stop