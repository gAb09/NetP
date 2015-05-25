@extends('layouts.layout_main')

@section('titre')
@stop



@section('topcontent1')
@stop


@section('topcontent2')
@stop

@section('contenu')
<hr />

<ul>
	<li>
		{!! Form::label('ad1', 'Ad1:') !!}
		{!! Form::text('ad1') !!}
	</li>
	<li>
		{!! Form::label('ad2', 'Ad2:') !!}
		{!! Form::text('ad2') !!}
	</li>
	<li>
		{!! Form::label('cp', 'Cp:') !!}
		{!! Form::text('cp') !!}
	</li>
	<li>
		{!! Form::label('ville', 'Ville:') !!}
		{!! Form::text('ville')!!}
	</li>
	<li style="width:50%">
		{!! Form::label('itineraire', 'Itinéraire', array ('class' => '', 'style' => '')) !!}
		{!! Form::textarea('itineraire', $adresse->itineraire, array ('class' => '', 'style' => '')) !!}
	</li>
</ul>


{!! HTML::linkAction('AdresseController@index', 'Retour à la liste', null, array('class' => 'btn btn-info btn-zapette iconesmall list')) !!}

{!! Form::submit('Modifier cette fiche', array('class' => 'btn btn-edit btn-zapette')) !!}
{!! Form::close() !!}

{!! Form::open(['method' => 'delete', 'action' => ['AdresseController@destroy', $adresse->id]]) !!}
{!! Form::submit('Supprimer cette fiche', array('class' => 'btn btn-danger', 'onClick' => 'javascript:return(confirmation());')) !!}
{!! Form::close() !!}

@stop


@section('scripts')
@parent
<script>
CKEDITOR.replace( 'itineraire', {
	language: 'en',
	uiColor: '#FFFAAA',
});
</script>
@stop
