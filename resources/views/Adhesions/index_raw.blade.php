
		<td>
			<button class="btn btn-zapette iconesmall list {!! $adhesion->valid_class !!}" onClick="javascript:edit({!!$adhesion->id!!});">
				{!! $adhesion->id !!}
			</button>
		</td>

		<td>
			{!! $adhesion->annee !!}
		</td>

		<td>
			{!! $adhesion->etiquette !!}
		</td>

		<td>
			@foreach($adhesion->adherents as $adherents)
			<p style="margin:0">{!! $adherents !!}</p>
			@endforeach
		</td>

		<td class="{!! $adhesion->is_payed_class !!}">
			@if($adhesion->is_payed)
			Oui
			@else
			Non
			@endif
		</td>

		<td>
			{!! $adhesion->valid_etiquette !!}
		</td>

		<td>
			@if(!is_null($adhesion->is_forced))
			{!! $adhesion->is_forced !!}
			@else
			Non
			@endif
		</td>
