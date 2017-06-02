<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>EM - @yield('title')</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.1/css/materialize.min.css"/>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>

{{-- 	<ul id="slide-out" class="side-nav">
		<li><div class="userView">
			<div class="background">
				<img src="images/office.jpg">
			</div>
			<a href="#!user"><img class="circle" src="images/yuna.jpg"></a>
			<a href="#!name"><span class="white-text name">John Doe</span></a>
			<a href="#!email"><span class="white-text email">jdandturk@gmail.com</span></a>
		</div></li>
		<li><a href="#!"><i class="material-icons">cloud</i>First Link With Icon</a></li>
		<li><a href="#!">Second Link</a></li>
		<li><div class="divider"></div></li>
		<li><a class="subheader">Subheader</a></li>
		<li><a class="waves-effect" href="#!">Third Link With Waves</a></li>
	</ul>
	<a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a> --}}

	@include('partials.nav')

	@include('partials.flash')

	<div class="container">
		<div class="row">
			<aside class="sidebar col s3">
				@yield('sidebar')
			</aside>
			<div class="content col s9">
				@yield('content')
			</div>
		</div>
	</div>

	@include('partials.footer')

	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.1/js/materialize.min.js"></script>
	<script>
		$(".button-collapse").sideNav();
	</script>
</body>
</html>