<!-- Nom - Prénom-->
<fieldset class="fiche">
	<legend>Identité</legend>
	{!! Form::label('prenom', 'Prénom', array ('class' => '')) !!}
	{!! Form::text('prenom', null, array ('class' => '')) !!}

	{!! Form::label('nom', 'Nom', array ('class' => '')) !!}
	{!! Form::text('nom', null, array ('class' => '')) !!}

	{!! Form::label('pseudo', 'Pseudo', array ('class' => '')) !!}
	{!! Form::text('pseudo', null, array ('class' => '')) !!}
</fieldset>


<!-- Qualité-->
<fieldset class="fiche">
	<legend>Qualité</legend>

	@include('partials/forms/qualites', ['model' => $personne])

</fieldset>



<!-- Adresse-->
<fieldset class="fiche">
	<legend>Adresse</legend>

	@include('partials/forms/adresses', ['model' => $personne])

</fieldset>


<!-- Téléphones-->
<fieldset class="fiche">
	<legend>Téléphones</legend>

@include('partials/forms/telephones', ['model' => $personne])
</fieldset>

<!-- Mails-->
<!-- Mails-->
<fieldset class="fiche">
	<legend>Mails</legend>

	@include('partials/forms/mails', ['model' => $personne])
</fieldset>




