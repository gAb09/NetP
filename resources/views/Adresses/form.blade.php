@extends('layouts.layout_main')

@section('titre')
@stop



@section('topcontent1')
<h1 class="titrepage">Modification de la fiche de {!! $adresse->id !!}</h1>
@stop


@section('topcontent2')
@stop

@section('contenu')
<hr />

{!! Form::model($adresse, ['method' => 'PUT', 'action' => ['AdresseController@update', $adresse->id]]) !!}

{!! Form::label('itineraire', 'Itinéraire', array ('class' => '', 'style' => '')) !!}
{!! Form::textarea('itineraire', $adresse->itineraire, array ('class' => '', 'style' => '')) !!}

<script>
CKEDITOR.replace( 'itineraire', {
	language: 'en',
	uiColor: '#FFFAAA',
});
</script>

{!! HTML::linkAction('AdresseController@index', 'Retour à la liste', null, array('class' => 'btn btn-info btn-zapette iconesmall list')) !!}

{!! Form::submit('Modifier cette fiche', array('class' => 'btn btn-edit btn-zapette')) !!}
{!! Form::close() !!}

{!! Form::open(['method' => 'delete', 'action' => ['AdresseController@destroy', $adresse->id]]) !!}
{!! Form::submit('Supprimer cette fiche', array('class' => 'btn btn-danger', 'onClick' => 'javascript:return(confirmation());')) !!}
{!! Form::close() !!}

@stop

