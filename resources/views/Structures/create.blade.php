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

{!! Form::model($structure, ['action' => 'StructureController@create']) !!}
{!! var_dump($listQualites) !!}
@include('Structures.form')
@stop


@section('zapette')

{!! HTML::linkAction('StructureController@index', 'Retour à la liste', null, array('class' => 'btn btn-info btn-zapette iconesmall list')) !!}

{!! Form::submit('Créer cette structure', array('class' => 'btn btn-edit btn-zapette')) !!}
{!! Form::close() !!}

@stop


