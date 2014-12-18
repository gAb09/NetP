<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Personnes</h2>

		<div>
			{{{var_dump($personnes)}}}
			@foreach($personnes as $personne)
			{{{$personne->personnes}}}
			@endforeach
		</div>
	</body>
</html>
