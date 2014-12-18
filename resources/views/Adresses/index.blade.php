<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Adresses</h2>

		<div>
			{{{var_dump($adresses)}}}
			@foreach($adresses as $adresse)
			{{{$adresse->personnes}}}
			@endforeach
		</div>
	</body>
</html>
