	<!-- Notes -->
	<td class="note">
		@if($adhesion->notes)
		<span  infobulle="{!!$adhesion->notes!!}" onClick="javascript:editNote({!! $adhesion->id !!}, '{!! $adhesion->notes !!}');">
			<i class="fa fa-lg fa-file">
			</i>
		</span> 
		@endif
	</td>

	<td class="info">
		<button class="btn btn_id_adh iconesmall list {!! $adhesion->valid_class !!} {!! $adhesion->forced_class !!}">
			{!! $adhesion->id !!}
		</button>
		<span>{!! $adhesion->valid_etiquette !!}</span>
	</td>

	<td>
		{!! $adhesion->annee !!}
	</td>

	<!-- Adhérent -->
	<td class="libelle">
		@foreach($adhesion->adherents as $adherents)
		<p style="margin:0">{!! $adherents !!}
		</p>
		@endforeach
	</td>

	<td>
		{!! $adhesion->etiquette !!}
	</td>
