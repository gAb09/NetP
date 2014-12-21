<?php namespace App\Gestion;
use App\Models\Personne;
use App\Gestion\AdresseG as AdresseG;
use App\Gestion\ContactG as ContactG;

class PersonneG {

	private function nomComplet($model){
		foreach ($model['attributes'] as $attribute => $value)
		{
			if ($attribute != "deleted_at" and is_null($value))
			{
				$model[$attribute] = "???";
				$model->{$attribute."_class"} = "indefini";
			}else{
				$model->{$attribute."_class"} = "";
			}
		}

		$model->nomcomplet = $model->prenom.' '.$model->nom;
		if ($model->prenom == "???" or $model->nom == "???") {
			$model->nomcomplet_class = 'indefini';
		}else{
			$model->nomcomplet_class = '';
		}
		return $model;
	}



	public function selectAdresses(){
		$adresseG = new AdresseG;
		$adresses = $adresseG->getAll();
		$liste = array();
		foreach ($adresses as $adresse) {
			$liste[$adresse->id] = $adresse->adresse;
		}
		return $liste;
	}

	public function selectContacts(){
		$contactG = new ContactG;
		$contacts = $contactG->getAll();
		$liste = array();
		foreach ($contacts as $contact) {
			$liste[$contact->id] = $contact->contact;
		}
		return $liste;
	}


	public function getAll(){
		$collection  = Personne::with(array('adresses', 'contacts'))->orderBy('statut')->get();

// dd($collection);

		$collection->each(function($model) use ($collection)
		{

			$model = $this->nomComplet($model);
		});

// dd($collection->toArray());

		return $collection->toArray();
	}


	public function edit($id){
		$personne  = Personne::with(array('adresses', 'contacts'))->find($id);


		return $this->nomComplet($personne);
	}


	public function find($id){
		Personne::find($id);
	}



	public function update($id, $input){
dd(Input::all());
		$personne = $this->find($id); 
		DB::transaction(function() use($personne)
		{       
			$personne->auteurs()->sync(Input::get('auteur'));
			$personne->titre = Input::get('titre');
			$personne->theme_id = Input::get('theme_id');
			$type = Input::get('livrable');
			$personne->livrable_type = $type;
			$personne->livrable_id = ($type == 'Lib\Editeurs\Editeur') ? Input::get('editeur_id') : Input::get('autoedite_id');
			$personne->save();
		});
		return true;
	}
}