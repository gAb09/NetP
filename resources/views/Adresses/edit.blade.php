@extends('layouts.layout_main')


		<!-- - - - - - - - - - - - - - - -   Titre   - - - - - - - - - - - - - - -->
@section('titre')

@stop


		<!-- - - - - - - - - - - - - - - -   Topcontent 1   - - - - - - - - - - - - - - -->
@section('topcontent1')

<h1 class="titrepage">Modification de la fiche<br />“{!! $adresse->full_adress !!}”</h1>

@stop


		<!-- - - - - - - - - - - - - - - -   Topcontent 2   - - - - - - - - - - - - - - -->
@section('topcontent2')

@stop


		<!-- - - - - - - - - - - - - - - -   Contenu   - - - - - - - - - - - - - - -->
@section('contenu')
<hr />

{!! Form::model($adresse, ['method' => 'PUT', 'action' => ['AdresseController@update', $adresse->id]]) !!}

@include('Adresses.form')

@stop


		<!-- - - - - - - - - - - - - - - -   Zapette   - - - - - - - - - - - - - - -->
@section('zapette')
@parent

{!! HTML::linkAction('AdresseController@index', 'Retour à la liste', null, array('class' => 'btn btn-info btn-zapette iconesmall list')) !!}

{!! Form::submit('Modifier cette fiche', array('class' => 'btn btn-edit btn-zapette')) !!}
{!! Form::close() !!}

{!! Form::submit('Supprimer cette fiche', array('class' => 'btn btn-danger', 'onClick' => 'javascript:return(confirmation());')) !!}
{!! Form::close() !!}

@stop


		<!-- - - - - - - - - - - - - - - -   Scripts   - - - - - - - - - - - - - - -->
@section('scripts')
@parent

@stop
