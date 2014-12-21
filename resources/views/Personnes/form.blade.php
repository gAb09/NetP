{!! Form::label('prenom', 'Prenom', array ('class' => '')) !!}
{!! Form::text('prenom', null, array ('class' => '')) !!}

{!! Form::label('nom', 'Nom', array ('class' => '')) !!}
{!! Form::text('nom', null, array ('class' => '')) !!}
<br />
{!! Form::label('adresse', 'Adresse', array ('class' => '')) !!}
{!! Form::select('adresse', $selectAdresses, 1,  array ('class' => '')) !!}
<br />

{!! Form::label('contact', 'Contact', array ('class' => '')) !!}
{!! Form::select('contact', $selectContacts, 1,  array ('class' => '')) !!}
<br />
