@extends('layouts.master')

@section('title', 'All Posts')

@section('header', 'All Posts')

@section('content')

	<div class="text-center">
		{!! $posts->appends(['search' => Request::get('search')])->render() !!}
		<h3>Showing {{ $posts->firstItem() }}-{{ $posts->lastItem() }} of {{ $posts->total() }} results found </h3>
	</div>
	<br>
	<div class="row">
		@foreach($posts as $post) 
			<div class="col-sm-5 col-lg-4 col-md-3">
				<div class="thumbnail box">
					<img class="index-pic" src="{{ ($post->image) ? $post->image : 'http://www.engraversnetwork.com/files/placeholder.jpg' }}" />
					<div class="title"><h2>"{{ substr($post->title, 0, 40) . "..." }}"</h2></div>
					<h5>Posted By: {{ $post->user->name }}</h5>
					<p>{{$post->created_at->diffForHumans()}}</p>
					<hr>
					<div class="caption index-caption">
						<p> {{ substr($post->content, 0, 215) . '...' }} </p>
					</div>
					<hr>
					<a href="{{ action('PostsController@show', $post->id) }}"><h5 class="pull-right"> View Post</h5></a>
					<p class="subscript">
						<i class="fa fa-thumbs-o-up fa-lg pull-left"> {{ $post->upVotes->count() }} </i>
						<i class="fa fa-thumbs-o-down fa-lg pull-left"> {{ $post->downVotes->count() }} </i>
					</p>
				</div> <!-- /.thumbnail -->
			</div> <!-- /.col-sm-4 col-lg-3 col-md-3 box -->
		@endforeach
	</div>

	<div class="text-center">{!! $posts->appends(['search' => Request::get('search')])->render() !!}
	</div>

@stop