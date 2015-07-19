	<?php $structure = $model; ?>

	<div class="portrait  {{ $structure->qualites[0]->nom_sys }}" ondblClick = "javascript:document.location.href='structure/{!!$structure['id']!!}/edit';">

		<!-- Qualité-->
		@if(!$structure->qualites[0]->id == 0)

			@foreach ($structure->qualites as $qualite)
				<?php $qualite_classe = ""; ?>

				<p class="encadred2{!! $qualite_classe !!}">
					@if($qualite->rang == 1)
						<span class="qualite">
					@else
						<span class="qualite">
					@endif
				{!! $qualite->libelle !!}

				</span>
				</p>
			@endforeach
		@else
			<p class="indefini">
			Qualité à définir
			</p>
		@endif


		<h3 class="">
			{!! $structure->rais_soc !!}
		</h3>



		<!-- Adresse -->
		@if(!$structure->adresses[0]->id == 0)

			@foreach ($structure->adresses as $adresse)

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
		@if(!$structure->telephones[0]->id == 0)

		<div class="encadred">

			<p>
				@foreach ($structure->telephones as $telephone)

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
			@if(!$structure->mails[0]->id == 0)

			<div class="encadred">
				<p>
					@foreach ($structure->mails as $mail)

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



				{!! $structure['id'] !!} 
			</div>