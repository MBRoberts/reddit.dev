<!DOCTYPE html>

<html lang="en">
	<head>

		<meta charset="utf-8">

		<title>@yield('title')</title>

		{{-- Bootstrap Core CSS CDN--}}
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		{{-- Footer custom css --}}
		<link rel="stylesheet" type="text/css" href="/css/footer.css">
		
		{{-- Font-awesome CDN--}}
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

		<style type="text/css">
			body {
				padding-top: 75px;
			}
		</style>

	</head>
	<body>

		@include('partials.navbar')

		<div class="container">
			@yield('content')
		</div>
		
		@include('partials.footer')

		{{-- Jquery.js CDN --}}
		<script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
		{{-- Bootstrap.js CDN --}}
		<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	</body>
</html>