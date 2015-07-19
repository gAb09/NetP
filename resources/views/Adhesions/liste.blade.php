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
<table class="adhesions" style="width:100%">
	<thead>
		<th>
			Id
		</th>
		<th>
			Année
		</th>
		<th>
			Type
		</th>
		<th>
			Adhérent
		</th>
		<th>
			Payée
		</th>
		<th>
			Valide
		</th>
		<th>
			Forcée
		</th>
	</thead>
	<tbody>
	@foreach($collection as $adhesion)
		<tr class="{!! $adhesion->type !!}" id="raw{!! $adhesion->id !!}">

	@include('Adhesions.index_raw')
		</tr>
	@endforeach
	</tbody>

</table>
@stop


@section('scripts')
@parent
<script src="/js/adhesions.js"></script>
@stop
