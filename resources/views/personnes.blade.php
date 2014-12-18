{{ Form::open(array('route' => 'route.name', 'method' => 'POST')) }}
	<ul>
		<li>
			{{ Form::label('id', 'Id:') }}
			{{ Form::text('id') }}
		</li>
		<li>
			{{ Form::label('Nom', 'Nom:') }}
			{{ Form::text('Nom') }}
		</li>
		<li>
			{{ Form::label('Prenom', 'Prenom:') }}
			{{ Form::text('Prenom') }}
		</li>
		<li>
			{{ Form::submit() }}
		</li>
	</ul>
{{ Form::close() }}