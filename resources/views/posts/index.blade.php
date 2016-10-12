@extends('layouts.master')

@section('title', 'All Posts')

@section('content')

	<h1 class="jumbotron text-center">All Posts</h1>
	
	<div class="row">
		@foreach($posts as $post) 
			<div class="col-sm-4 col-lg-3 col-md-3">
				<div class="thumbnail">
					<h2>{{ $post->title }}</h2>
					<div class="caption">
						<h4 class="pull-right">{{ $post->url }}</h4>
						<p> {{ $post->content }} </p>
					</div>
				</div> <!-- /.thumbnail -->
			</div> <!-- /.col-sm-4 col-lg-3 col-md-3 box -->
		@endforeach
	</div>

@stop