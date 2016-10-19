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
			<a class="navbar-brand white" href="/">Reddit</a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
			
			@if(Auth::check())
				
				<li class="dropdown">
					<a href="#" class="dropdown-toggle white" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}<span class="caret"></span></a>
					
					<ul class="dropdown-menu">
						<li><a href="{{ action("UsersController@edit", Auth::id()) }}">Edit Account</a></li>
						<li><a href="{{ action("UsersController@show", Auth::user()->id) }}">Profile</a></li>
						<li><a href="{{ action("PostsController@create") }}">Create New Post</a></li>
						<li role="separator" class="divider"></li>
						<li class="dropdown-header">View All:</li>
						<li><a href="{{ action("PostsController@index") }}">Posts</a></li>
						<li><a href="{{ action("UsersController@index") }}">Users</a></li>
					</ul>
				</li>

				<li><a class="white" href="{{ action('Auth\AuthController@getLogout') }}">Logout</a></li>
			@else
				<li><a class="white" href="{{ action('Auth\AuthController@getLogin') }}">Login</a></li>
				<li><a class="white" href="{{ action('Auth\AuthController@getRegister') }}">Register</a></li>
				<li><a class="white" href="{{ action("PostsController@index") }}">Posts</a></li>
			@endif
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li>
					<form method="GET" action="{{ (Request::is('users') || Request::is('users/*')) ? action("UsersController@index") : action("PostsController@index") }}" class="navbar-form navbar-right">
						
						<div class="form-group">
							<input id="search" name="search" type="search" class="form-control empty" placeholder="&#xF002; Search {{ (Request::is('users') || Request::is('users/*')) ? "Users" : "Posts" }}">
						</div>
						<button class="btn btn-default submit">Submit</button>
					</form>
				</li>
			</ul>
		</div><!--/.nav-collapse -->
	</div>
</nav>


