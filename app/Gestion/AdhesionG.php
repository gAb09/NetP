<?php namespace App\Gestion;

use App\Models\Adhesion;
use App\Gestion\StructureG;
use App\Gestion\PersonneG;
use illuminate\Database\Query\Builder;
use Illuminate\Database\Connection;
use Illuminate\Database\Connectors;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;

class AdhesionG {
	use TraitG;

	private $type_personne_array = ['conso', 'pro_personne', 'couple'];
	private $type_structure_array = ['pro_structure'];



	/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
	/*                          INDEX 
	/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - */

	public function index(){
		$collection  = Adhesion::with(['personne', 'structure'])
		->get();

		// dd($collection);

		$collection->each(function($model)
		{
			// var_dump($model->id);
			$model = $this->handleModelIndex($model); 
		});

		// dd($collection->toArray());

		return $collection;
	}


	private function handleModelIndex($model){
		$model = $this->getAdherents($model);
		$model = $this->setValidite($model);
		$model = $this->setFlagClasses($model);

		return $model;
	}



	private function getAdherents($model){

		if (count($model->personne)) {
			foreach ($model->personne as $key => $value) {
				$adherents[] = $value->prenom_complet;
			}
		}

		if (count($model->structure)) {
			$adherents[] = $model->structure[0]->rais_soc;
		}
		
		$model->adherents = $adherents;

		// return dd($model);
		return $model;
	}


	private function setValidite($model){
		if ($model->validation == 1) {
			$model->valid_class = 'valide_forced';
			$model->valid_etiquette = 'Validation forcée';
		}

		if ($model->validation == 2) {
			$model->valid_class = 'valide';
			$model->valid_etiquette = 'Valide';
		}

		if ($model->validation == 3) {
			$model->valid_class = 'invalide';
			$model->valid_etiquette = 'Invalide';
		}

		if ($model->validation == 4) {
			$model->valid_class = 'invalide_forced';
			$model->valid_etiquette = 'Invalidation forcée';
		}
		// return dd($model);
		return $model;
	}


	private function setFlagClasses($model){
		if (!$model->is_payed) {
			$model->is_payed_class = "invalide";
		}
		return $model;
	}


/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
/*                          CREATE 
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - */

public function create($type){
	$adhesion = new Adhesion;
	$adhesion->type = $type;
	$adhesion->annee = Carbon::now()->year;
	$adhesion->is_forced = 0;

	// return dd($adhesion->toArray());

	return $adhesion;
}


  /**
   * Détermine la chaîne de caractère pour le titre selon le type d'adhésion à créer.
   * 
   * @param Object Adhesion
   * 
   * @return String
   */
  public function setTitleCreation($adhesion)
  {
  	return "Création d’une adhésion “".$adhesion->etiquette."”";
  }



/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
/*                          STORE 
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
public function store(){
	// dd(Input::all());

	$adhesion = new Adhesion;
	$adhesion->fill(Input::except('adherent', 'adherent2', '_token', '_method'));
	$adhesion->is_payed = (Input::get('is_payed')) ? 1 : 0 ;

	return dd($adhesion);
	$adhesion->save();

	$type = Input::get('type');

	switch ($type) {
		case 'conso':
		$adhesion->personne()->attach(Input::get('adherent'));
		break;
		
		case 'couple':
		$adhesion->personne()->attach(Input::get('adherent'));
		$adhesion->personne()->attach(Input::get('adherent2'));
		break;
		
		case 'pro_personne':
		$adhesion->personne()->attach(Input::get('adherent'));
		break;
		
		case 'pro_structure':
		$adhesion->structure()->attach(Input::get('adherent'));
		break;
		
		default:
		dd('problème');
		break;
	}

}



/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
/*                          EDIT 
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - */

public function edit($id){
	$adhesion  = Adhesion::with(['personne', 'structure'])->find($id);

	$adhesion = $this->handleModelEdit($adhesion);




	// $adhesion = $this->completeModel($adhesion); 
	return $adhesion;
}

private function handleModelEdit($adhesion){
	$adhesion = $this->getAdherents($adhesion);
		// $adhesion = $this->setValidite($adhesion);
		// $adhesion = $this->setFlagClasses($adhesion);

	return $adhesion;
}

/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
/*                          Globales 
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - */

  /**
   * Détermine la chaîne de caractère pour le titre selon le type d'adhésion à créer.
   * 
   * @param Object Adhesion
   * 
   * @return String
   */
  public function getAdherableType($type){
  	if (in_array($type, $this->type_personne_array)) {
  		return 'App\Models\Personne';
  	}

  	if (in_array($type, $this->type_structure_array)) {
  		return 'App\Models\Structure';
  	}	
  }


  public function getListForSelect($type, personneG $personneG, structureG $structureG){
  	if (in_array($type, $this->type_personne_array)) {
  		$liste[0] = "Sélectionnez une personne";
  		$liste = $liste + $personneG->listForSelect();
  		return $liste;
  	}

  	if (in_array($type, $this->type_structure_array)) {
  		$liste[0] = "Sélectionnez une structure";
  		$liste = $liste + $structureG->listForSelect();
  		return $liste;
  	}	
  }




// 	public function find($id){
// 		Personne::find($id);
// 	}



// 	public function update($id, $input){
// // dd($input->all());
// 		$personne = Personne::find($id); 
// // dd($input->get('adresse'));

// //AfA prévoir transaction
// 		$personne->adresses()->sync(array($input->get('adresse')));
// 		$personne->coordonnees()->sync(array($input->get('coordonnees')));
// 		$personne->qualites()->sync(array($input->get('qualite')));
// 		$personne->structures()->sync(array($input->get('structure')));
// 		$personne->nom = Input::get('nom');
// 			// $personne->theme_id = Input::get('theme_id');
// 			// $type = Input::get('livrable');
// 			// $personne->livrable_type = $type;
// 			// $personne->livrable_id = ($type == 'Lib\Editeurs\Editeur') ? Input::get('editeur_id') : Input::get('autoedite_id');
// 		$personne->save();
// 	}
}