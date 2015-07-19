	<?php $nbre = count($model->mails); ?>

	@if($nbre == 0)
		{!! Form::label('mail', ' ', array ('class' => '')) !!}
		{!! Form::select('mail[]', $listMails, 0,  array ('class' => '', 'style' => 'display:inline')) !!}
	@else
		@foreach($model->mails as $mail)
			@if($mail->etiquette)
				{!! $mail->etiquette !!} : 
			@endif
				{!! Form::label('mail', ' ', array ('class' => '')) !!}
				{!! Form::select('mail[]', $listMails, $mail->id,  array ('class' => '', 'style' => 'display:inline')) !!}
			<br />
		@endforeach
	@endif
