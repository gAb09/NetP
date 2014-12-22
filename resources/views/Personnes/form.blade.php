{!! Form::label('prenom', 'Prenom', array ('class' => '')) !!}
{!! Form::text('prenom', null, array ('class' => '')) !!}

{!! Form::label('nom', 'Nom', array ('class' => '')) !!}
{!! Form::text('nom', null, array ('class' => '')) !!}
<br />
{!! Form::label('adresse', 'Adresse', array ('class' => '')) !!}
{!! Form::select('adresse', $selectAdresses, $personne->adresses->first()->id,  array ('class' => '')) !!}
<br />

{!! Form::label('contact', 'Contact', array ('class' => '')) !!}
{!! Form::select('contact', $selectContacts, 1,  array ('class' => '')) !!}

<h4>Cette adresse est commune à :</h4>
@foreach ($adressePartagedWith as $partageur)
<p>{!! $partageur->prenom.' '.$partageur->nom !!}</p>
@endforeach
<br />
