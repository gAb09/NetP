<!-- Nom - Prénom-->
<fieldset class="fiche">
	<legend>Identité</legend>
	{!! Form::label('rais_soc', 'Nom', array ('class' => '')) !!}
	{!! Form::text('rais_soc', 'Saisir la raison sociale', array ('class' => '')) !!}

	{!! Form::label('pseudo', 'Pseudo', array ('class' => '')) !!}
	{!! Form::text('pseudo', 'Saisir un pseudo', array ('class' => '')) !!}
</fieldset>


<!-- Qualité-->
<fieldset class="fiche">
	<legend>Qualité</legend>
	<?php $nbre = count($structure->qualites); ?>

	@if($nbre == 0)
	{!! Form::label('qualite', ' ', array ('class' => '')) !!}
	{!! Form::select('qualite[]', $listQualites, 0,  array ('class' => '')) !!}
	@else
	@foreach($structure->qualites as $qualite)
	{!! Form::label('qualite', ' ', array ('class' => '')) !!}
	{!! Form::select('qualite[]', $listQualites, $qualite->id,  array ('class' => '')) !!}
	@endforeach
	@endif
</fieldset>


<!-- Adresse-->
<fieldset class="fiche">
	<legend>Adresse</legend>

	@include('partials/forms/adresses', ['model' => $structure])

</fieldset>

<!-- Téléphones-->
<fieldset class="fiche">
	<legend>Téléphones</legend>

	@include('partials/forms/telephones', ['model' => $structure])
</fieldset>

<!-- Mails-->
<fieldset class="fiche">
	<legend>Mails</legend>

	@include('partials/forms/mails', ['model' => $structure])
</fieldset>

