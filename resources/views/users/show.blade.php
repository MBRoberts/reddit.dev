@extends('layouts.master')

@section('title', 'Users Show Page')

@section('header', $user->name )

@section('content')
	<div class="row">
		<div class="col-md-3">
			<p class="lead"><b> {{ $user->name }} </b></p>
			<ul>
				<li>User since {{ $user->created_at->diffForHumans() }} </li>
				<li><a href="mailto:{{  $user->email }}">{{ $user->email }}</a></li>
				<li>{{ count($user->posts)}} {{ (count($user->posts) == 1) ? 'Post' : 'Posts' }}</li>
			
			</ul>
		</div>

		<div class="col-md-9">

			<div class="well show-box">
				@if ($user->id == Auth::id())
					<div class="text-right">
						<a href="{{ action('PostsController@create') }}" class="btn btn-primary">Create New Post</a>
					</div>
				@endif
				<h2>{{ (count($user->posts)) ? "$user->name's Posts" : "$user->name has no posts" }}</h2>
				<hr>
				
				
					@foreach($posts as $post)
						<div class="row">
							<div class="col-md-12">

								<span class="pull-right">Posted {{ $post->created_at->diffForHumans() }}</span>
								<br>
								<span class="pull-right">Last Updated {{ $post->updated_at->diffForHumans() }}</span>
								<strong><h3>"{{ $post->title }}"</h3></strong>
								<img class="thumbnail col-sm-3 pull-right" src="{{ $post->image }}" />
								<p>
									{{ substr($post->content, 0, 200) . '... ' }}
									<a href="{{ action('PostsController@show',$post->id) }}"> View More</a>
								</p>
								<br>
								<br>

								<div class="pull-left">
									<i class="fa fa-thumbs-o-up fa-lg pull-left"> {{ $post->upVotes->count() }} </i>
									<i class="fa fa-thumbs-o-down fa-lg pull-left"> {{ $post->downVotes->count() }} </i>
								</div>

								@if ($post->created_by == Auth::id())
									<a href="{{ action('PostsController@edit', $post->id) }}" class="btn btn-primary pull-right">Edit Post</a>
									
									<form onsubmit="return confirm('Do you really want to delete this post?');" action="{{ action('PostsController@destroy', $post->id)}}" method="POST">
										{!! csrf_field() !!}
										{!! method_field("DELETE") !!}
										<button type="submit" class="btn btn-danger btn-delete pull-right">Delete Post</button>
									</form>
								@endif
							</div>
						</div>
						<hr>
					@endforeach

				<div class="text-center">{!! $posts->render() !!} </div>

			</div> <!-- /.well box -->
		</div> <!-- /.col-md-9 -->
	</div> <!-- /.row -->



@stop