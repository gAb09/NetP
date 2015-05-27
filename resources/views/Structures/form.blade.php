<!-- Nom - Prénom-->
<fieldset class="fiche">
	<legend>Identité</legend>
	{!! Form::label('rais_soc', 'Nom', array ('class' => '')) !!}
	{!! Form::text('rais_soc', null, array ('class' => '')) !!}

	{!! Form::label('pseudo', 'Pseudo', array ('class' => '')) !!}
	{!! Form::text('pseudo', null, array ('class' => '')) !!}
</fieldset>


<!-- Qualité-->
<?php $valeur = (isset($structure->qualites->first()->id)) ? : 0 ?>
<fieldset class="fiche">
	<legend>Qualité</legend>
	{!! Form::label('qualite', ' ', array ('class' => '')) !!}
	{!! Form::select('qualite', $listQualites, $valeur,  array ('class' => '')) !!}
</fieldset>


<!-- Adresse-->
<fieldset class="fiche">
	<legend>Adresse</legend>

	{!! Form::label('adresse', ' ', array ('class' => '')) !!}
	{!! Form::select('adresse', $listAdresses, $valeur,  array ('class' => '')) !!}
	@if(count($adresseCommuneWith))
	<h4>Cette adresse est partagée avec :</h4>
	<ul>
		@foreach ($adresseCommuneWith as $partageur)
		<li>{!! $partageur->prenom.' '.$partageur->nom !!}</li>
		@endforeach
	</ul>
	@endif

</fieldset>

