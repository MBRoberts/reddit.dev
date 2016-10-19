@extends('layouts.master')

@section('title', 'Edit User')

@section('header', 'Edit User')

@section('content')
<div class="container" style="max-width: 500px;">
	<form class="text-center" method="POST" action="{{ action('UsersController@update', $user->id) }}">

		{!! csrf_field() !!}
		{!! method_field('PUT') !!}

		<div class="form-group row">
			<label for="name" class="col-xs-2 control-label">Name:</label>
			<div class="col-xs-10">
				<input class="input-lg form-control" id='name' type="text" name="name" value="{{ (old('name') == null) ? $user->name : old('name') }}" placeholder="Enter New Name" autofocus>
			</div>
		</div>

		@if($errors->has('name'))
			<div class="alert alert-danger col-xs-10 col-xs-offset-2">
				{{ $errors->first('name') }}
			</div>
		@endif

		<div class="form-group row">
			<label for="email" class="col-xs-2 col-form-label col-form-label-lg">Email:</label>
			<div class="col-xs-10">
				<input class="input-lg form-control" type="email" name="email" value="{{ (old('email') == null) ? $user->email : old('email') }}" placeholder="Enter New Email">
			</div>
		</div>

		@if($errors->has('email'))
			<div class="alert alert-danger col-xs-10 col-xs-offset-2">
				{{ $errors->first('email') }}
			</div>
		@endif

		<div class="form-group row">
			<label for="password" class="col-xs-2 col-form-label col-form-label-lg">Password:</label>
			<div class="col-xs-10">
				<input class="input-lg form-control" type="password" name="password" placeholder="Enter New Password">
			</div>
		</div>

		@if($errors->has('password'))
			<div class="alert alert-danger col-xs-10 col-xs-offset-2">
				{{ $errors->first('password') }}
			</div>
		@endif

		<div class="form-group row">
			<label for="confirm_password" class="col-xs-2 col-form-label col-form-label-lg">Confirm Password:</label>
			<div class="col-xs-10">
				<input class="input-lg form-control" type="password" name="confirm_password" placeholder="Confirm Password">
			</div>
		</div>

		@if($errors->has('confirm_password'))
			<div class="alert alert-danger col-xs-10 col-xs-offset-2">
				{{ $errors->first('confirm_password') }}
			</div>
		@endif
		<button style="margin:5px;" type="submit" class="btn btn-lg btn-primary pull-right">Submit</button>
	</form>

	<form class="text-center" method="POST" action="{{ action('UsersController@destroy', $user->id) }}">
		{!! csrf_field() !!}
		{!! method_field('DELETE')!!}
		<button style="margin:5px;" class="btn btn-danger btn-lg btn-delete pull-right" type="submit">Delete User</button>
	</form>
</div>
@stop