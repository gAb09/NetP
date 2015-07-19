@extends('layouts.layout_main')

@section('titre')
{!! $title !!}
@stop



@section('topcontent1')
<h1 class="titrepage">Modification de la fiche de “{!! $structure->rais_soc !!}”</h1>
@stop


@section('topcontent2')
@stop

@section('contenu')
<hr />

{!! Form::model($structure, ['method' => 'PUT', 'action' => ['StructureController@update', $structure->id], 'class' => 'edit']) !!}

@include('Structures.form')
@stop


@section('zapette')

{!! HTML::linkAction('StructureController@index', 'Retour à la liste', null, array('class' => 'btn btn-info btn-zapette iconesmall list')) !!}

{!! Form::submit('Modifier cette fiche', array('class' => 'btn btn-edit btn-zapette')) !!}
{!! Form::close() !!}

{!! Form::open(['method' => 'delete', 'action' => ['StructureController@destroy', $structure->id]]) !!}
{!! Form::submit('Supprimer cette fiche', array('class' => 'btn btn-danger', 'onClick' => 'javascript:return(confirmation());')) !!}
{!! Form::close() !!}

@stop


