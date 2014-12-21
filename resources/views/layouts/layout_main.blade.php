<!DOCTYPE html>
<html lang="fr-FR">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Application Title -->
	<title>
		@section('titre')
		{{ isset($title) ? $title : 'Pas de titre' }}
		@show
	</title>

	<!-- Bootstrap CSS -->
	<link href="/css/app.css" rel="stylesheet">
	<link href="/css/style.css" rel="stylesheet">
	<link href="/css/vendor/font-awesome.css" rel="stylesheet">

	<!-- Web Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>



<body @section('body')>
	@show


		<!-- - - - - - - - - - - - - - - - MENU  - - - - - - - - - - - - - - -->
@include('partials.static_menu')

		<!-- - - - - - - - - - - - - - - - TOP CONTENT (2 zones) - - - - - - - - - - - - - - -->
		<div class="row-fluid" style="padding-bottom:5px">

			<div class="span6">
				@yield('topcontent1')
			</div>

			<div class="span6">
				@yield('topcontent2')
			</div> 
		</div>

		<!-- - - - - - - - - - - - - - - - CONTENU - - - - - - - - - - - - - - -->


		<div class="row-fluid">
			<div>
				@yield('contenu')
			</div>
		</div>


		<!-- - - - - - - - - - - - - - - - FOOTER - - - - - - - - - - - - - - -->

		<footer>
			<hr>
			© Nature & Progrès Ariège
		</footer>


		
		@section('script')

		@show
	</body>
	</html>