{{ var_dump($personne->qualites()->getRelatedIds()) }}
{{ var_dump($personne->structures) }}
			{!! Form::text('personne_id', $personne->id,  array ('class' => '')) !!}

	@foreach($personne->qualites as $qualite)
		@if(!$qualite->structure_lied)
			{!! Form::label('qualite[]', ' ', array ('class' => '')) !!}
			{!! Form::select('qualite[]', $listQualites, $qualite->id,  array ('class' => '')) !!}
			{!! Form::text('qualite_pivot_id[]', $qualite->pivot->id,  array ('class' => '')) !!}
		@endif
	@endforeach
<hr />

	@foreach($personne->structures as $relation)
		@if($relation->appel_structure)
			{!! Form::label('relation[]', ' ', array ('class' => '')) !!}
			{!! Form::select('relation[]', $listQualites, $relation->id,  array ('class' => '')) !!}

			{!! Form::label('structure_id[]', ' ', array ('class' => '')) !!}
			{!! Form::select('structure_id[]', $listStructures, $relation->pivot->structure_id,  array ('class' => '')) !!}
			{!! Form::text('pivot_id[]', $relation->pivot->id,  array ('class' => '')) !!}
		@endif
	@endforeach
