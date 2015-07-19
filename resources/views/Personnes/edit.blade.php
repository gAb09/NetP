@extends('layouts.layout_main')

@section('titre')
{!! $title !!}
@stop



@section('topcontent1')
<h1 class="titrepage">Modification de la fiche de “{!! $personne->nom_complet !!}” ({!! $personne->id !!})</h1>
@stop


@section('topcontent2')
@stop

@section('contenu')
<hr />

{!! Form::model($personne, ['method' => 'PUT', 'action' => ['PersonneController@update', $personne->id], 'class' => 'edit']) !!}

@include('Personnes.form')
@stop


@section('zapette')

{!! HTML::linkAction('PersonneController@index', 'Retour à la liste', null, array('class' => 'btn btn-info btn-zapette iconesmall list')) !!}

{!! Form::submit('Modifier cette fiche', array('class' => 'btn btn-edit btn-zapette')) !!}
{!! Form::close() !!}

{!! Form::open(['method' => 'delete', 'action' => ['PersonneController@destroy', $personne->id]]) !!}
{!! Form::submit('Supprimer cette fiche', array('class' => 'btn btn-danger', 'onClick' => 'javascript:return(confirmation());')) !!}
{!! Form::close() !!}

@stop


