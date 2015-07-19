	<?php $nbre = count($model->adresses); ?>

	@if($nbre == 0)
		{!! Form::label('adresse', ' ', array ('class' => '')) !!}
		{!! Form::select('adresse[]', $listAdresses, 0,  array ('class' => '')) !!}
	@else
		@foreach($model->adresses as $adresse)
			{!! Form::label('adresse', ' ', array ('class' => '')) !!}
			{!! Form::select('adresse[]', $listAdresses, $adresse->id,  array ('class' => '')) !!}

			@if($adresseCommuneWith)
				<h4>Cette adresse est commune avec :</h4>
				@if(count($adresseCommuneWith->personne))
					<h5>Personnes :</h5>
					<ul>
						@foreach ($adresseCommuneWith->personne as $partageur)
							<li>{!! $partageur->prenom.' '.$partageur->nom !!}</li>
						@endforeach
					</ul>
				@endif
				@if(count($adresseCommuneWith->structure))
					<h5>Structures :</h5>
					<ul>
						@foreach ($adresseCommuneWith->structure as $partageur)
							<li>{!! $partageur->rais_soc !!}</li>
						@endforeach
					</ul>
				@endif
			@endif
		@endforeach
	@endif
