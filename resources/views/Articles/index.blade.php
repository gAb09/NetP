@extends('layouts.layout_main')

@section('titre')
@parent
@stop



@section('topcontent1')
<h1 class="titrearticle">{{$titre_article}}</h1>
@stop



@section('topcontent2')

@stop



@section('contenu')

<div class="offset3 span11 flexcontainer">
	@foreach($collection as $article)

	<div  class="portrait"

	<!-- Id-->
	<span>{!! $article->id !!}</span>

	<div
	id="titre_{!! $article->id !!}"
	contenteditable="true"
	onDblClick="javascript:editArticle({!! $article->id !!});"
	>


	<!-- Titre-->
	<h3>{!! $article->titre !!}</h3>
</div>

<div
id="contenu_{!! $article->id !!}"
contenteditable="true"
onDblClick="javascript:editArticle({!! $article->id !!});"
>

<!-- contenu -->
<p>
	{!! $article->contenu !!}
</p>

</div>
</div>
@endforeach
</div>


@stop


@section('scripts')
@parent

<script src="/js/articles.js"></script>
<script>
  // Turn off automatic editor creation first.
    // CKEDITOR.disableAutoInline = true;
    </script>
    @stop
