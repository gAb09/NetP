@extends('layouts.layout_main')

@section('titre')
{!! $title !!}
@stop



@section('topcontent1')
<h1 class="titrepage">{!! $titre_page !!}</h1>
@stop



@section('topcontent2')
@stop




@section('contenu')
<hr />

{!! Form::model($adhesion, ['action' => 'AdhesionController@store', 'class' => 'form-horizontal']) !!}

<!-- Type adhésion -->
{!! Form::hidden('type', $adhesion->type) !!}

<!-- Coordonnées -->
<fieldset class="">
	<legend>Coordonnées</legend>

	<!-- Année -->
	<div class="form-group">
		{!! Form::label('annee', 'Année', ['class' => 'col-sm-2 control-label']) !!}
		<div class="col-sm-1">
			{!! Form::text('annee', $adhesion->annee, ['class' => 'form-control']) !!}
		</div>
	</div>

	<!-- Adhérent(s) -->
	<div class="form-group">
		{!! Form::label('adherent', 'Adhérent', ['class' => 'col-sm-2 control-label']) !!}
		<div class="col-sm-3">
			{!! Form::select('adherent', $listAdherents, 0, ['class' => 'form-control col-sm-10']) !!}
		</div>
	</div>

	@if($adhesion->type == 'couple')
	<div class="form-group">
		{!! Form::label('adherent2', 'Adhérent 2', ['class' => 'col-sm-2 control-label']) !!}
		<div class="col-sm-3">
			{!! Form::select('adherent2', $listAdherents, 0, ['class' => 'form-control']) !!}
		</div>
	</div>
	@endif
</fieldset>


<!-- Suivi -->
<fieldset class="">
	<legend>Suivi</legend>
	
	<!-- Paiement -->
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<div class="checkbox checkbox_correctif">
				{!! Form::checkbox('is_payed', 1, true, ['class' => '']) !!}
				{!! Form::label('is_payed', 'Payée', ['class' => '']) !!}
			</div>
		</div>
	</div>
</fieldset>



<!-- Suivi -->
<fieldset class="">
	<legend>Validité</legend>

	<!-- Forçage validation -->
	<div class="col-sm-offset-2 col-sm-10">
		<div class="radio radio_correctif">
			{!! Form::radio('is_forced', 0, true, ['id' => 'is_forced1']) !!}
			{!! Form::label('is_forced1', 'Le statut de l’adhésion (VALIDE ou INVALIDE) sera déterminée AUTOMATIQUEMENT en fonction de certains paramètres de suivi.', ['class' => '']) !!}
		</div>
		<div class="radio radio_correctif">
			{!! Form::radio('is_forced', -1, false, ['id' => 'is_forced2']) !!}
			{!! Form::label('is_forced2', 'Outrepasser les paramètres automatiques de suivi et FORCER l’adhésion comme VALIDE.', ['class' => '']) !!}
		</div>
		<div class="radio radio_correctif">
			{!! Form::radio('is_forced', 1, false, ['id' => 'is_forced3']) !!}
			{!! Form::label('is_forced3', 'Outrepasser les paramètres automatiques de suivi et FORCER l’adhésion comme INVALIDE.', ['class' => '']) !!}
		</div>
	</div>
</fieldset>


@stop





@section('zapette')

{!! HTML::linkAction('AdhesionController@index', 'Retour à la liste', null, array('class' => 'btn btn-info btn-zapette iconesmall list')) !!}

{!! Form::submit('Créer cette Adhesion', array('class' => 'btn btn-edit btn-zapette')) !!}
{!! Form::close() !!}

@stop


