<?php namespace App\Gestion;
use App\Models\Adresse;

class AdresseG{
	use TraitG;

	public function getAll(){
		$collection  = Adresse::all();

		$collection->each(function($model) use ($collection)
		{
			$model = $this->completeModel($model);
		});
		return $collection;
	}


	public function edit($id){

		$adresse = $this->completeModel(Adresse::find($id)); 
		// dd($adresse);

		return $adresse;
	}


	public function update($id){
		$adresse = Adresse::find($id); 
		// dd(\Input::get('itineraire'));

		$adresse->itineraire = \Input::get('itineraire');
			// $adresse->theme_id = Input::get('theme_id');
			// $type = Input::get('livrable');
			// $adresse->livrable_type = $type;
			// $adresse->livrable_id = ($type == 'Lib\Editeurs\Editeur') ? Input::get('editeur_id') : Input::get('autoedite_id');
		$adresse->save();
	}


	public function completeModel($model){
		$model = $this->nullVersIndefini($model);
		$model = $this->FullAdress($model);
		$model = $this->SelectAdress($model);

		return $model;
	}


	public function FullAdress($model){
		$model->getFullAdressAttributes();
		return $model;
	}

	public function SelectAdress($model){
		$model->getSelectAdressAttributes();
		return $model;
	}


	public function adresseCommuneWith($adressable_id, $adresse_id){
		$adresses = Adresse::with(array('personne' => function($q) use($adressable_id)
		{
			$q->where('adressable_id', '!=', $adressable_id);
		}))
		->with(array('structure' => function($q) use($adressable_id)
		{
			$q->where('adressable_id', '!=', $adressable_id);
		}))
		->where('id', $adresse_id)
		->get()
		;


		if (empty($adresses[0]->personne[0]) and empty($adresses[0]->structure[0])) {
			return false;
		}

		return $adresses[0];

	}


	/* Liste des adresses */
	public function listForSelect(){
		$adresses = new Adresse;
		$adresses = $this->getAllSortedBy('cp', 'App\Models\Adresse');
		$liste[0] = 'Inconnue';
		foreach ($adresses as $adresse) {
			$liste[$adresse->id] = $adresse->select_adress;
		}
		return $liste;
	}


}