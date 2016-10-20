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
				<textarea class="input-lg form-control" name="content" id="content" rows="5" cols="40" placeholder="Post Content">
				</textarea>
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
			</div>
		</div>


		@if($errors->has('content'))
			<div class="alert alert-danger col-xs-10 col-xs-offset-2">
				{{ $errors->first('content') }}
			</div>
		@endif

		<div class="form-group row">
			<label for="image" class="col-xs-2 control-label">Upload Image:</label>
			<div class="col-xs-3">
				<input type="file" class="input-lg form-control" name="image" id="image" accept="image/*">
			</div>
			<div class="col-xs-3 col-xs-offset-5 img-preview">
				<img class="img-thumbnail thumbnail" id="preview" src="#" alt="Image Preview">
			</div>
		</div>

		<button style="margin: 5px;" type="submit" class="pull-left btn btn-lg btn-primary">Submit</button>
		<button style="margin: 5px;" type="reset" class="pull-left btn btn-lg btn-default">Clear</button>
	</form>
@stop