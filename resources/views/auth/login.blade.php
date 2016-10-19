@extends('layouts.master')

@section('title', 'Login')

@section('header', 'Login')

@section('content')

<section id="login">
		<div class="row">

			<div class="col-md-6 col-md-offset-3">

				<p class="text-center">Login with your email and password</p>

				<form method="POST" class="usersForm" action="{{ action('Auth\AuthController@postLogin') }}">
					
					{!! csrf_field() !!}

					<div class="form-group">
					    <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{ old('email') }}" autofocus>
					</div>

					@if($errors->has('email'))
						<div class="alert alert-danger col-xs-12">
							{{ $errors->first('email') }}
						</div>
					@endif

					<div class="form-group">
					    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
					</div>

					@if($errors->has('password'))
						<div class="alert alert-danger col-xs-12">
							{{ $errors->first('password') }}
						</div>
					@endif

					<div class="row">
						<div class="col-sm-6">
							<button type="submit" class="btn btn-primary">Login</button>
						</div>
				</form>
						<div class="col-sm-6 text-right">
							<a href="{{ action('Auth\AuthController@getRegister')}}" type="GET" class="btn btn-success">Go To Signup</a>
						</div>
					</div>
			</div>
		</div><!-- /.row -->
	</section><!-- /#login -->

@stop