<?php namespace App\Gestion;
use App\Models\Telephone;

class TelephoneG{
	use TraitG;

	public function completeModel($model){
		$model = $this->nullVersIndefini($model);
		return $model;
	}



	public function getAll(){
		$collection  = Telephone::all();

		$collection->each(function($model) use ($collection)
		{
			$model = $this->completeModel($model);
		});
		return $collection;
	}

	/* Liste des telephones */
	public function listForSelect(){
		$telephones = new Telephone;
		$telephones = $this->getAllSortedBy('valeur', 'App\Models\Telephone');
		$liste = array();
		foreach ($telephones as $telephone) {
			$liste[$telephone->id] = $telephone->valeur;
		}
		return $liste;
	}


}


