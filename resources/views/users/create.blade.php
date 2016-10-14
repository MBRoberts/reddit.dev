@extends('layouts.master')

@section('title', 'Create User')

@section('header', 'Create User')

@section('content')
	
	<form class="text-center" method="POST" action="{{ action('PostsController@store') }}">

		{!! csrf_field() !!}

		<div class="form-group row">
			<label for="name" class="col-xs-2 control-label">name:</label>
			<div class="col-xs-10">
				<input class="input-lg form-control" id="name" type="text" name="name" value="{{ old('name') }}" placeholder="Full Name" autofocus>
			</div>
		</div>

		@if($errors->has('name'))
			<div class="alert alert-danger col-xs-10 col-xs-offset-2">
				{{ $errors->first('name') }}
			</div>
		@endif

		<div class="form-group row">
			<label for="email" class="col-xs-2 control-label">Email:</label>
			<div class="col-xs-10">
				<input class="input-lg form-control" type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Enter Email">
			</div>
		</div>

		@if($errors->has('email'))
			<div class="alert alert-danger col-xs-10 col-xs-offset-2">
				{{ $errors->first('email') }}
			</div>
		@endif

		<div class="form-group row">
			<label for="password" class="col-xs-2 control-label">Password:</label>
			<div class="col-xs-10">
				<input class="input-lg form-control" type="password" id="password" name="password" value="{{ old('password') }}" placeholder="Enter Password">
			</div>
		</div>

		@if($errors->has('password'))
			<div class="alert alert-danger col-xs-10 col-xs-offset-2">
				{{ $errors->first('password') }}
			</div>
		@endif

		<div class="form-group row">
			<label for="confirm_password" class="col-xs-2 control-label">Confirm Password:</label>
			<div class="col-xs-10">
				<input class="input-lg form-control" type="confirm_password" id="confirm_password" name="confirm_password" value="{{ old('confirm_password') }}" placeholder="Enter Confirm Password">
			</div>
		</div>

		@if($errors->has('confirm_password'))
			<div class="alert alert-danger col-xs-10 col-xs-offset-2">
				{{ $errors->first('confirm_password') }}
			</div>
		@endif

		<button style="margin: 5px;" type="submit" class="pull-right btn btn-lg btn-primary">Submit</button>
		<button style="margin: 5px;" type="reset" class="pull-right btn btn-lg btn-default">Clear</button>
	</form>
@stop