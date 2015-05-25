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

<div class="offset3 span11 flexcontainer">
	@foreach($collection as $model)

		@if(get_class($model) == 'App\Models\Personne')
		@include("Personnes/index")
		@endif

		@if(get_class($model) == 'App\Models\Structure')
		@include("Structures/index")
		@endif
	
	@endforeach
</div>

@stop