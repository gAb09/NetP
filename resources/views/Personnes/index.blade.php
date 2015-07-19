	<?php $personne = $model; ?>

	<div class="portrait {{{ $personne->qualites[0]->nom_sys }}}" ondblClick = "javascript:document.location.href='personne/{!! $personne['id'] !!}/edit';">

		<!-- Qualité-->
		@if(!$personne->qualites[0]->id == 0)

			@foreach ($personne->qualites as $qualite)
				<?php $qualite_classe = ""; ?>

				<p class="encadred2 {!! $qualite_classe !!}">
					@if($qualite->rang == 1)
						<span class="qualite">
					@else
						<span class="qualite">
					@endif
				{!! $qualite->libelle !!}

				@if($qualite->id == 1)
					en nom propre
				@endif

				</span>
				</p>
			@endforeach
		@else
			<p class="indefini">
			Qualité à définir
			</p>
		@endif


		<!-- Nom -->
		<h3 class="nom {!! $personne->nom_complet_class !!}">
			{!! $personne->nom_complet !!}
			{!! $personne->nom_complet_class !!}
		</h3>


		<!-- Structure-->
		@if(!$personne->structures->isEmpty() and !$personne->structures[0]->id == 0)

			@foreach ($personne->structures as $structure)
				<?php $structure_classe = ""; ?>

				<p class="encadred2 {!! $structure_classe !!}">
					@if($structure->rang == 1)
						<span class="structure">
					@else
						<span class="structure">
					@endif
				{!! $structure->rais_soc !!}

				</span>
				</p>
			@endforeach
		@else
			<p class="indefini">
			Pas de lien avec une structure
			</p>
		@endif



		<!-- Adresse -->
		@if(!$personne->adresses[0]->id == 0)

			@foreach ($personne->adresses as $adresse)

				@if($adresse->etiquette)
					{!! $adresse->etiquette !!} : 
				@endif

				<p class="encadred">
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


		<!-- telephones -->
		@if(!$personne->telephones[0]->id == 0)

		<div class="encadred">

			<p>
				@foreach ($personne->telephones as $telephone)

					@if($telephone->rang == 1)
						<span class="telephone principal">
					@else
						<span class="telephone">
					@endif

					@if($telephone->pivot->etiquette)
						{!! $telephone->pivot->etiquette !!} : 
					@endif
					{!!$telephone->valeur !!}
					</span>
					@if($telephone->pivot->note)
						<br />
						<span class="note">
							{!! $telephone->pivot->note !!}
						</span>
					@endif
					<br />
				@endforeach

				</p>
			</div>
			@else
			<p class="indefini">
				Téléphone inconnu
			</p>
			@endif


			<!-- mails -->
			@if(!$personne->mails[0]->id == 0)

			<div class="encadred">
				<p>
					@foreach ($personne->mails as $mail)

					@if($mail->rang == 1)
					<span class="mail principal">
						@else
						<span class="mail">
							@endif
							@if($mail->pivot->etiquette)
							{!! $mail->pivot->etiquette !!} : 
							@endif
							{!!$mail->valeur !!}
						</span>
						@if($mail->pivot->note)
						<br />
						<span class="note">
							{!! $mail->pivot->note !!}
						</span>
						@endif
						<br />
						@endforeach
					</p>
				</div>
				@else
				<p class="indefini">
					Mail inconnu
				</p>
				@endif




				{!! $personne['id'] !!} 
			</div>