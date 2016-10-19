@extends('layouts.master')

@section('title', 'Users Index')

@section('header', 'All Users')

@section('content')
	<div class="text-center"> {!! $users->render() !!} </div>

	<table class="table table-striped table-bordered table-hover">
		<tr>
			<th>Name</th>
			<th>Email</th>
			<th>Created</th>
			<th>Last Updated</th>
		</tr>
		<tbody>
			@foreach($users as $user)
				<tr>
					<td><a href="{{ action('UsersController@show', $user->id)}}">{{ $user->name }}</a></td>
					<td>{{ $user->email }}</td>
					<td>{{ $user->created_at->format('F jS, Y') }}</td>
					<td>{{ $user->updated_at->format('F jS, Y') }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	<div class="text-center"> {!! $users->render() !!} </div>


@stop