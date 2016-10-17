<!-- Fixed navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/">Fake Reddit</a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
			
			@if(Auth::check())
				<li class="active"><a href="{{ action("PostsController@index") }}">Posts</a></li>
				
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}<span class="caret"></span></a>
					
					<ul class="dropdown-menu">
						<li><a href="{{ action("UsersController@index") }}">Edit Account</a></li>
						<li><a href="#">Another action</a></li>
						<li><a href="#">Something else here</a></li>
						<li role="separator" class="divider"></li>
						<li class="dropdown-header">Nav header</li>
						<li><a href="#">Separated link</a></li>
						<li><a href="#">One more link</a></li>
					</ul>
				</li>
			@else

			@endif
			</ul>
			<ul class="nav navbar-nav navbar-right">
				@if(Auth::check())
					<li><a href="{{ action('Auth\AuthController@getLogout') }}">Logout</a></li>
				@else
					<li><a href="{{ action('Auth\AuthController@getLogin') }}">Login</a></li>
					<li><a href="{{ action('Auth\AuthController@getRegister') }}">Register</a></li>
				@endif
			</ul>
		</div><!--/.nav-collapse -->
	</div>
</nav>


