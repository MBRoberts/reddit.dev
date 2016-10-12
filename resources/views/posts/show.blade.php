@extends('layouts.master')

@section('title', 'Show')

@section('content')

	<div class="row">
		<div class="col-md-3">
			<p class="lead">Posted By: <b> {{ $post->created_by }} </b></p>
			
		</div>

		<div class="col-md-9">
			<div class="thumbnail animated box">

				<div class="caption-full">
					<h4 class="pull-right"> {{ $post->url }} </h4>
					<h4> {{ $post->title }} </h4>
					<p> {{ $post->content }} </p>
				</div>

				<div class="ratings">
					<p class="pull-right">3 reviews</p>
					<p>
						<span class="glyphicon glyphicon-star"></span>
						<span class="glyphicon glyphicon-star"></span>
						<span class="glyphicon glyphicon-star"></span>
						<span class="glyphicon glyphicon-star"></span>
						<span class="glyphicon glyphicon-star-empty"></span>
						4.0 stars
					</p>
				</div>
			</div>

			<div class="well animated box">

				<div class="text-right">
					<a class="btn btn-success">Leave a Review</a>
				</div>

				<hr>

				<div class="row">
					<div class="col-md-12">
						<span class="glyphicon glyphicon-star"></span>
						<span class="glyphicon glyphicon-star"></span>
						<span class="glyphicon glyphicon-star"></span>
						<span class="glyphicon glyphicon-star"></span>
						<span class="glyphicon glyphicon-star-empty"></span>
						Anonymous
						<span class="pull-right">10 days ago</span>
						<p>This product was great in terms of quality. I would definitely buy another!</p>
					</div>
				</div>

				<hr>

				<div class="row">
					<div class="col-md-12">
						<span class="glyphicon glyphicon-star"></span>
						<span class="glyphicon glyphicon-star"></span>
						<span class="glyphicon glyphicon-star"></span>
						<span class="glyphicon glyphicon-star"></span>
						<span class="glyphicon glyphicon-star-empty"></span>
						Anonymous
						<span class="pull-right">12 days ago</span>
						<p>I've alredy ordered another one!</p>
					</div>
				</div>

				<hr>

				<div class="row">
					<div class="col-md-12">
						<span class="glyphicon glyphicon-star"></span>
						<span class="glyphicon glyphicon-star"></span>
						<span class="glyphicon glyphicon-star"></span>
						<span class="glyphicon glyphicon-star"></span>
						<span class="glyphicon glyphicon-star-empty"></span>
						Anonymous
						<span class="pull-right">15 days ago</span>
						<p>I've seen some better than this, but not at this price. I definitely recommend this item.</p>
					</div>
				</div>
			</div> <!-- /.well box -->
		</div> <!-- /.col-md-9 -->
	</div> <!-- /.row -->

@stop