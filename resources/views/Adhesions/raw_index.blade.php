@include('Adhesions.raw')

		<td class="{!! $adhesion->is_payed_class !!}" onClick="javascript:edit({!! $adhesion->id !!});">
			@if($adhesion->is_payed)
			Payée
			@else
			Non payée
			@endif
		</td>