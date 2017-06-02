<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>EM - @yield('title')</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.1/css/materialize.min.css"/>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>

	@include('partials.navadmin')

	@include('partials.flash')

	@yield('content')


	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.1/js/materialize.min.js"></script>
	<script>
		$(document).ready(function() {
			//$('select').material_select('destroy');
			$('.selectmaterial').material_select();
		});
	</script>
</body>
</html>