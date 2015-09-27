@extends('layouts.layout_main')

@section('titre')
@parent
@stop



@section('topcontent1')
<textarea name="editor1" id="editor1">&lt;p&gt;Initial editor content.&lt;/p&gt;</textarea>
@stop



@section('topcontent2')
<textarea name="editor2" id="editor2">&lt;p&gt;Initial editor content.&lt;/p&gt;</textarea>
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
CKEDITOR.replace( 'editor1', 'editor2' );  </script>
  @stop
