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
			{{{$adresse->ad1}}}
			@endforeach
		</div>
	</body>
</html>
