<span  infobulle="Ajouter/Modifier l'article" onClick="javascript:index({!! $article->id !!}, true);">
	<i class="fa fa-2x fa-check">
	</i>
</span> 
<span  infobulle="Annuler modification" onClick="javascript:index({!! $article->id !!}, false);">
	<i class="fa fa-2x fa-close">
	</i>
</span> 


<script>
    CKEDITOR.inline( 'cible');
    CKEDITOR.replace( 'cible', {
    	language: 'fr',
    	uiColor: '#9AB8F3'
    });
    </script>


