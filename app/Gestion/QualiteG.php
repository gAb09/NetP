<?php namespace App\Gestion;
use App\Models\Qualite;

class QualiteG{
	use TraitG;

	public function completeModel($model){
		$model = $this->nullVersIndefini($model);
		return $model;
	}



	public function getAll(){
		$collection  = Qualite::all();

		$collection->each(function($model) use ($collection)
		{
			$model = $this->completeModel($model);
		});
		return $collection;
	}


	/* Liste des qualités */
	public function listForSelect(){
		$qualites = new Qualite;
		$qualites = $this->getAll();
		foreach ($qualites as $qualite) {
			$liste[$qualite->id] = $qualite->libelle;
		}
		return $liste;
	}


}


