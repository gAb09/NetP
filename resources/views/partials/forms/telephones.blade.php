	<?php $nbre = count($model->telephones); ?>

	@if($nbre == 0)
		{!! Form::label('telephone', ' ', array ('class' => '')) !!}
		{!! Form::select('telephone[]', $listTelephones, 0,  array ('class' => '', 'style' => 'display:inline')) !!}
	@else
		@foreach($model->telephones as $telephone)
			@if($telephone->etiquette)
				{!! $telephone->etiquette !!} : 
			@endif
				{!! Form::label('telephone', ' ', array ('class' => '')) !!}
				{!! Form::select('telephone[]', $listTelephones, $telephone->id,  array ('class' => '', 'style' => 'display:inline')) !!}
			<br />
		@endforeach
	@endif
