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
@if(!empty($personne->qualites))
<fieldset class="fiche">
	<legend>Qualité</legend>
	@foreach($personne->qualites as $qualite)
	{!! Form::label('qualite', ' ', array ('class' => '')) !!}
	{!! Form::select('qualite[]', $listQualites, $qualite->id,  array ('class' => '')) !!}
	@endforeach
</fieldset>
@endif


<!-- Structure -->
@if(!empty($personne->structures->first()->id))
<fieldset class="fiche">
	<legend>Structure</legend>
	@foreach($personne->structures as $structure){{{$structure->id}}}
	{!! Form::label('structure', 'Structure', array ('class' => '')) !!}
	{!! Form::select('structure[]', $listStructures, $structure->id,  array ('class' => '')) !!}
	<br />
	@endforeach
</fieldset>
@endif



<!-- Adresse-->
<fieldset class="fiche">
	<legend>Adresse</legend>

	{!! Form::label('adresse', ' ', array ('class' => '')) !!}
	{!! Form::select('adresse[]', $listAdresses, $personne->adresses->first()->id,  array ('class' => '')) !!}
	@if(count($adresseCommuneWith))
		<h4>Cette adresse est partagée avec :</h4>
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

</fieldset>

<!-- Téléphones-->
<fieldset class="fiche">
	<legend>Téléphones</legend>

	@foreach($personne->telephones as $telephone)
	@if($telephone->etiquette)
	{!! $telephone->etiquette !!} : 
	@endif
	{!! Form::label('telephone', ' ', array ('class' => '')) !!}
	{!! Form::select('telephone[]', $listTelephones, $telephone->id,  array ('class' => '', 'style' => 'display:inline')) !!}
	<br />
	@endforeach
</fieldset>

<!-- Mails-->
<fieldset class="fiche">
	<legend>Mails</legend>

	@foreach($personne->mails as $mail)
	@if($mail->etiquette)
	{!! $mail->etiquette !!} : 
	@endif
	{!! Form::label('mail', ' ', array ('class' => '')) !!}
	{!! Form::select('mail[]', $listMails, $mail->id,  array ('class' => '', 'style' => 'display:inline')) !!}
	<br />
	@endforeach
</fieldset>

