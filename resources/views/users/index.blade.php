@extends('layouts.master')

@section('title', 'Users Index')

@section('header', 'All Users')

@section('content')
	<form action="/index" class="navbar-form pull-right">
		<div class="form-group">
			<input id="search" name="search" type="search" class="form-control" placeholder="Search" required>
		</div>
		<a  href="{{ action('UsersController@index') }}"><button type="submit" class="btn btn-default">Submit</button></a>
	</form>
	<br>
	<br>
	<br>
	<div class="text-center"> {!! $users->render() !!} </div>

	<table class="table table-striped table-bordered table-hover">
		<tr>
			<th>User ID</th>
			<th>Name</th>
			<th>Email</th>
			<th>Created</th>
			<th>Last Updated</th>
			<th>Actions</th>
		</tr>
		<tbody>
			@foreach($users as $user)
				<tr>
					<td>{{ $user->id }}</td>
					<td>{{ $user->name }}</td>
					<td>{{ $user->email }}</td>
					<td>{{ $user->created_at->format('F jS, Y') }}</td>
					<td>{{ $user->updated_at->format('F jS, Y') }}</td>
					<td>
						<a href="{{ action('UsersController@edit', $user->id)}}" class="btn btn-primary">Edit User</a>
						<a href="{{ action('UsersController@destroy', $user->id)}}" class="btn btn-danger">Delete User</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	<div class="text-center"> {!! $users->render() !!} </div>


@stop