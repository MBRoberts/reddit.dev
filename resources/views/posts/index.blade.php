@extends('layouts.master')

@section('title', 'All Posts')

@section('header', 'All Posts')

@section('content')

	<form action="/index" class="navbar-form navbar-right">
		<div class="form-group">
			<input id="search" name="search" type="search" class="form-control" placeholder="Search">
		</div>
		<a  href="{{ action('PostsController@index') }}" type="submit" class="btn btn-default">Submit</a>
	</form>
	<br>
	<br>
	<br>
	<div class="text-center">{!! $posts->render() !!} </div>

	<div class="row">
		@foreach($posts as $post) 
			<div class="col-sm-5 col-lg-4 col-md-3">
				<div class="thumbnail box">
					<img src="{{ $post->image }}" />
					<h2>"{{ substr($post->title, 0, 40) . "..." }}"</h2>
					<p>Posted {{$post->created_at->diffForHumans()}}</p>
					<hr>
					<div class="caption">
						<p> {{ substr($post->content, 0, 225) . '...' }} </p>
					</div>
						<a href="{{ action('PostsController@show', $post->id) }}"><h5 class="pull-right"> View Post</h5></a>
				</div> <!-- /.thumbnail -->
			</div> <!-- /.col-sm-4 col-lg-3 col-md-3 box -->
		@endforeach
	</div>

	<div class="text-center">{!! $posts->render() !!} </div>

@stop