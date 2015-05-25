<!-- Nom - Prénom-->
<fieldset class="fiche">
	<legend>Identité</legend>
	{!! Form::label('prenom', 'Prenom', array ('class' => '')) !!}
	{!! Form::text('prenom', null, array ('class' => '')) !!}

	{!! Form::label('nom', 'Nom', array ('class' => '')) !!}
	{!! Form::text('nom', null, array ('class' => '')) !!}

	{!! Form::label('pseudo', 'Pseudo', array ('class' => '')) !!}
	{!! Form::text('pseudo', null, array ('class' => '')) !!}
</fieldset>


<!-- Qualité-->
<fieldset class="fiche">
	<legend>Qualité</legend>
	{!! Form::label('qualite', ' ', array ('class' => '')) !!}
	{!! Form::select('qualite', $listQualites, $structure->qualites->first()->id,  array ('class' => '')) !!}
</fieldset>


<!-- Adresse-->
<fieldset class="fiche">
	<legend>Adresse</legend>

	{!! Form::label('adresse', ' ', array ('class' => '')) !!}
	{!! Form::select('adresse', $listAdresses, $structure->adresses->first()->id,  array ('class' => '')) !!}
	@if(count($adresseCommuneWith))
	<h4>Cette adresse est partagée avec :</h4>
	<ul>
		@foreach ($adresseCommuneWith as $partageur)
		<li>{!! $partageur->prenom.' '.$partageur->nom !!}</li>
		@endforeach
	</ul>
	@endif

</fieldset>

<!-- Contact-->
<fieldset class="fiche">
	<legend>Coordonnées</legend>
	{!! Form::label('coordonnees', ' ', array ('class' => '')) !!}
	{!! Form::select('coordonnees', $listCoordonnees, $structure->coordonnees->first()->id,  array ('class' => '')) !!}
</fieldset>

