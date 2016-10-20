@extends('layouts.master')

@section('title', $post->title)

@section('header', '"' . $post->title . '"')

@section('content')

	<div class="row">
		<div class="col-md-3">
			<p class="lead">Posted By: <a href="{{ action('UsersController@show', $post->created_by) }}"><b>{{ $post->user->name }}</b></a></p>
			<p>Posted {{ $post->created_at->diffForHumans() }} </p>
		</div>

		<div class="col-md-9">
			<div class="thumbnail show-box">
				<img src="{{ $post->image }}">
				<div class="caption-full">
					<h4 class="pull-right"><b>"{{ $post->title }}"</b></h4>
					<h4><a href="{{ $post->url }}">View Project</a></h4>
					<hr>
					<p> {!! Markdown::convertToHtml($post->content) !!} </p>
				</div>
				<hr>

				<div>
					<p>
						<form method="POST" action="{{ action('PostsController@setVote') }}">
							{!! csrf_field() !!}
							<input type="hidden" name="vote" value="1">
							<input type="hidden" name="post_id" value="{{ $post->id }}">
							<button type="submit" class="rank pull-left btn-default btn-md"><i class="fa fa-thumbs-o-up fa-lg"> {{ $post->upVotes->count() }} </i></button>
						</form>
						<form method="POST" action="{{ action('PostsController@setVote') }}">
							{!! csrf_field() !!}
							<input type="hidden" name="vote" value="0">
							<input type="hidden" name="post_id" value="{{ $post->id }}">
							<button type="submit" class="rank btn-default btn-md"><i class="fa fa-thumbs-o-down fa-lg"> {{ $post->downVotes->count() }} </i></button>
						</form>
					</p>
				</div>
			</div>

			<div class="well show-box">

				<div id="disqus_thread"></div>

				<script type="text/javascript">
					var disqus_config = function () {
						this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
						this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
					};

					(function() { // DON'T EDIT BELOW THIS LINE
						var d = document, s = d.createElement('script');
						s.src = '//reddit-dev-1.disqus.com/embed.js';
						s.setAttribute('data-timestamp', +new Date());
						(d.head || d.body).appendChild(s);
					})();
				</script>

			</div> <!-- /.well box -->
		</div> <!-- /.col-md-9 -->
	</div> <!-- /.row -->

@stop