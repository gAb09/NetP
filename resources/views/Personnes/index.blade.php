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
<div class="offset3 span11">
	@foreach($personnes as $personne)

	<div class="portrait" ondblClick = "javascript:document.location.href='personne/{!!$personne['id']!!}/edit';">

		<h3 class="{{{$personne['nomcomplet_class']}}}">
			{!! $personne['nomcomplet'] !!}
		</h3>

		<!-- Adresse -->
		@if(!empty($personne['adresses']))
		@foreach ($personne['adresses'] as $adresse)
		<p class="">
			{{{$adresse['ad1']}}}  {{{$adresse['ad2']}}} {{{$adresse['cp']}}} {{{$adresse['ville']}}}
		</p>
		@endforeach
		@else
		<p class="indefini">
			Adresse manquante
		</p>
		@endif

		<!-- Contact -->
		@if(!empty($personne['contacts']))
		@foreach ($personne['contacts'] as $contact)
		<p class="">
			{{{$contact['ad1']}}}  {{{$contact['ad2']}}} {{{$contact['cp']}}} {{{$contact['ville']}}}
		</p>
		@endforeach
		@else
		<p class="indefini">
			Coordonnées manquantes
		</p>
		@endif

		<!-- Statut -->
		@if($personne['statut'] == '???')
		<p class="{{{$personne['statut_class']}}}">
			Statut indéfini !
		</p>
		@endif
	</div>

	@endforeach
</div>



@stop