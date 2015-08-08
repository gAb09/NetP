@include('Adhesions.raw')

<td colspan="2">

	{!!Form::model($adhesion, ['action' => ['AdhesionController@update', $adhesion->id], 'method' => 'put', 'class' => 'form-inline', 'id' => 'formulaire'])!!}

	<div class="form-group">
		{!! 
		Form::checkbox('is_payed', 1, null, 
		[
		'id' => 'input_is_payed'.$adhesion->id, 
		'class' => 'form-control', 
		'onChange' => "javascript:ToggleIsPayed($adhesion->id, this);"
		]
		) !!}
		<br />
		<span id="span_is_payed{{{$adhesion->id}}}">
			@if($adhesion->is_payed) Payée @else Non Payée @endif
		</span>
	</div>

	<div class="form-group">
		{!! Form::radio('is_forced', -1, null, ['class' => '', 'onChange' => "javascript:ToggleIsForced($adhesion->id, this)"]) !!}
		{!! Form::radio('is_forced', 0, null, ['class' => '', 'onChange' => "javascript:ToggleIsForced($adhesion->id, this)"]) !!}
		{!! Form::radio('is_forced', 1, null, ['class' => '', 'onChange' => "javascript:ToggleIsForced($adhesion->id, this)"]) !!}
		<br />
		<span id="span_is_forced{{{$adhesion->id}}}">
			@if($adhesion->is_forced == -1) Forcée Invalide @endif
			@if($adhesion->is_forced == 0) Auto @endif
			@if($adhesion->is_forced == 1) Forcée Valide @endif
		</span>
	</div>

	<div class="form-group">
		<span infobulle="Confirmer" onClick="javascript:index({!! $adhesion->id !!}, true);">
			<i class="fa fa-2x fa-check">
			</i>
		</span> 
		<span  infobulle="Annuler" onClick="javascript:index({!! $adhesion->id !!}, false);">
			<i class="fa fa-2x fa-close">
			</i>
		</span> 
		<span  infobulle="Supprimer" onClick="javascript:deleteAdhesion({!! $adhesion->id !!}, 'Êtes-vous sûr de vouloir supprimer cette adhésion ?');">
			<i class="fa fa-2x fa-trash">
			</i>
		</span> 
		<span  infobulle="Ajouter/Modifier la note" onClick="javascript:editNote({!! $adhesion->id !!}, '{!! $adhesion->notes !!}');">
			<i class="fa fa-2x fa-file">
			</i>
		</span> 
	</div>
	{!! Form::close() !!}
</td>
