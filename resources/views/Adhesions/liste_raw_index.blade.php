@include('Adhesions.liste_raw_shared')

		<td class="{!! $adhesion->is_payed_class !!}">
			@if($adhesion->is_payed)
			Payée
			@else
			Non payée
			@endif
		</td>