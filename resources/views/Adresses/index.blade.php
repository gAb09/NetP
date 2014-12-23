@extends('layouts.layout_main')

@section('titre')
@parent
@stop



@section('topcontent1')
<h1 class="titrepage">{{$titre_page}}</h1>
@stop


@section('topcontent2')
@stop


@section('contenu')
<div>
	@foreach($adresses as $adresse)
	{!! HTML::linkAction('AdresseController@edit', $adresse->id, $adresse->id, array('class' => 'btn btn-info btn-zapette iconesmall list')) !!}
	{!! $adresse->ad1 !!} {!! $adresse->ad2 !!} {!! $adresse->cp !!} {!! $adresse->ville !!}<br />
	@endforeach
</div>
@stop
