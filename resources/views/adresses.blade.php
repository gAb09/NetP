{!! Form::open(array('route' => 'adresse.create', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('ad1', 'Ad1:') !!}
			{!! Form::text('ad1') !!}
		</li>
		<li>
			{!! Form::label('ad2', 'Ad2:') !!}
			{!! Form::text('ad2') !!}
		</li>
		<li>
			{!! Form::label('cp', 'Cp:') !!}
			{!! Form::text('cp') !!}
		</li>
		<li>
			{!! Form::label('ville', 'Ville:') !!}
			{!! Form::text('ville')!!}
		</li>
		<li>
			{!! Form::label('id', 'Id:') !!}
			{!! Form::text('id') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}