@extends('layouts.layout_main')

@section('titre')
@parent
@stop



@section('topcontent1')
<h1 class="titrepage">{{$titre_page}}</h1>
@stop



@section('topcontent2')
<button class="btn">
Test</button>
@stop



@section('contenu')

<table class="adhesions" style="width:100%">
	<thead>
		<th>
			Notes
		</th>
		<th>
			Id
		</th>
		<th>
			Année
		</th>
		<th>
			Adhérent
		</th>
		<th>
			Type
		</th>
		<th  id="tetiere">
			Payée
		</th>
		<th class="hidden">
			Validité
		</th>
	</thead>
	<tbody>
		@foreach($collection as $adhesion)
		<tr class="{!! $adhesion->type !!}" id="ligne_{!! $adhesion->id !!}" onDblClick="javascript:edit(this, {!! $adhesion->id !!});">
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
