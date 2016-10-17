@extends('layouts.master')

@section('title', $post->title)

@section('header', 'Post')

@section('content')

	<div class="row">
		<div class="col-md-3">
			<p class="lead">Posted By: <b> {{ $post->created_by }} </b></p>
			<p>Posted {{ $post->created_at->diffForHumans() }} </p>
		</div>

		<div class="col-md-9">
			<div class="thumbnail show-box">
				<img src="{{ $post->image }}">
				<div class="caption-full">
					<h4 class="pull-right"><b>"{{ $post->title }}"</b></h4>
					<h4><a href="{{ $post->url }}">View Project</a></h4>
					<hr>
					<p> {{ $post->content }} </p>
				</div>
				<hr>

				<div>
					<p class="pull-right">3 Comments</p>
					<p>
						<i class="fa fa-thumbs-o-up fa-lg"> 2</i>
						<i class="fa fa-thumbs-o-down fa-lg"> 1</i>
					</p>
				</div>
			</div>

			<div class="well show-box">

				<div class="text-right">
					<a class="btn btn-success">Leave a Comment</a>
				</div>

				<hr>

				<div class="row">
					<div class="col-md-12">
						<strong>Anonymous &nbsp;&nbsp;</strong>
						<i class="fa fa-thumbs-o-down fa-lg"></i>
						<span class="pull-right">10 days ago</span>
						<p>I hate Latin!</p>
						<div class="pull-right">
							<i class="fa fa-thumbs-o-up"> 2</i>
							<i class="fa fa-thumbs-o-down"> 1</i>
						</div>
					</div>
				</div>

				<hr>

				<div class="row">
					<div class="col-md-12">
						<strong>Anonymous &nbsp;&nbsp;</strong>
						<i class="fa fa-thumbs-o-up fa-lg"></i>
						
						<span class="pull-right">12 days ago</span>
						<p>I've alredy ordered another one!</p>
						<div class="pull-right">
							<i class="fa fa-thumbs-o-up"> 2</i>
							<i class="fa fa-thumbs-o-down"> 1</i>
						</div>
					</div>
				</div>

				<hr>

				<div class="row">
					<div class="col-md-12">
						<strong>Anonymous &nbsp;&nbsp;</strong>
						<i class="fa fa-thumbs-o-up fa-lg"></i>
						
						<span class="pull-right">15 days ago</span>
						<p>I've seen some better than this, but not at this price. I definitely recommend this item.</p>
						<div class="pull-right">
							<i class="fa fa-thumbs-o-up"> 2</i>
							<i class="fa fa-thumbs-o-down"> 1</i>
						</div>
					</div>
				</div>
			</div> <!-- /.well box -->
		</div> <!-- /.col-md-9 -->
	</div> <!-- /.row -->

@stop