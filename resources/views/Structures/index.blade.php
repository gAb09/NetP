	<?php $structure = $model ?>

	<div class="portrait {{{$structure['qualites'][0]['nom_sys']}}}" ondblClick = "javascript:document.location.href='structure/{!!$structure['id']!!}/edit';">

		<h3 class="">
			{!! $structure['rais_soc'] !!}
		</h3>

		<!-- Qualité-->
		@if(!empty($structure['qualites']))
		@foreach ($structure['qualites'] as $qualite)
		<p class="qualite">
			{!!$qualite['libelle']!!}
		</p>
		@endforeach
		@else
		<p class="indefini">
			Qualité manquante
		</p>
		@endif




		<!-- Adresse -->
		@if(!empty($structure['adresses']))
		@foreach ($structure['adresses'] as $adresse)
		<p class="">
			{{{$adresse['ad1']}}}<br />
			@if($adresse['ad2'])
			{{{$adresse['ad2']}}}<br />
			@endif
			{{{$adresse['cp']}}} {{{$adresse['ville']}}}
		</p>
		@endforeach
		@else
		<p class="indefini">
			Adresse manquante
		</p>
		@endif

		<!-- Coordonnées -->
		@if(!empty($structure['coordonnees']))
		@foreach ($structure['coordonnees'] as $coordonnee)
		<div class="principales">
			<p>
				Coordonnées principales<br/>
				{{{$coordonnee['tel1']}}}<br />
				{{{$coordonnee['mail1']}}}<br />
			</p>
		</div>
		<div class="secondaires">
			<p>
				Autres coordonnées<br />
				Tél 2 : {{{$coordonnee['tel2']}}}<br />
				Mail 2 : {{{$coordonnee['mail2']}}}
			</p>
		</div>
		@endforeach
		@else
		<p class="indefini">
			Coordonnées manquantes
		</p>
		@endif

		{!! $structure['id'] !!} 
	</div>