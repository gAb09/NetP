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

<table class="table">
	<caption>
		Tableau
	</caption>

	<thead>
		<th>
			Prénom
		</th>
		<th>
			Nom
		</th>
		<th>
			Nom complet
		</th>
		<th>
			Statut
		</th>
	</thead>


	<tbody>


		@foreach($personnes as $personne)
		<tr>
			<td>
				{!! $personne->prenom !!}
			</td>
			<td class="{{{$personne->nom_class}}}">
				{!! $personne->nom !!}
			</td>
			<td class="{{{$personne->nomcomplet_class}}}">
				{!! $personne->nomcomplet !!}
			</td>
			<td class="{{{$personne->statut_class}}}">
				{!! $personne->statut !!}
			</td>

			@endforeach

		</tbody>

	</table>

	@stop


	@section('tresorerie/footer')
	@parent
	<h3>  Le footer de banques</h3>
	@stop