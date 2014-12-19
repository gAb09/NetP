@extends('layout')

@section('titre')
@parent
@stop


@section('topcontent1')
<h1 class="titrepage">{{$titre_page}}</h1>
@stop


@section('topcontent2')
@stop


@section('contenu')
<div class="container-fluid">

	<div class="page span12">

		@foreach($personnes as $personne)

		<div class="portrait {{{$personne->statut_css}}}">

			<h3>{!! $personne->nomcomplet !!}
			</h3>
			<p class="{{{$personne->nom_class}}}">
				{!! $personne->nom !!}
			</p>
			<p class="{{{$personne->nomcomplet_class}}}">
				{!! $personne->prenom !!}
			</p>
			<p class="{{{$personne->statut_class}}}">
				{!! $personne->statut !!}
			</p>
		</div>

		@endforeach
	</div>
</div>



@stop


@section('tresorerie/footer')
@parent
<h3>  Le footer de banques</h3>
@stop