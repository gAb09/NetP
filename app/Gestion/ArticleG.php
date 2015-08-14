<?php namespace App\Gestion;

use App\Models\Article;

use illuminate\Database\Query\Builder;
use Illuminate\Database\Connection;
use Illuminate\Database\Connectors;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;

class ArticleG {
	use TraitG;

	/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
	/*                          INDEX 
	/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - */

	public function index(){
		$collection  = Article::orderBy('updated_at')
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

		return $model;
	}



/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
/*                          SHOW 
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - */

public function show($id){
  $article  = Article::find($id);

  $article = $this->handleModelShow($article); 

  return $article;
}

private function handleModelShow($model){
  $model = $this->handleModelIndex($model); 
  return $model;
}


/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
/*                          CREATE 
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - */

// public function create($type){
// 	$adhesion = new Adhesion;
// 	$adhesion->type = $type;
// 	$adhesion->annee = Carbon::now()->year;
// 	$adhesion->is_forced = 0;

// 	// return dd($adhesion->toArray());

// 	return $adhesion;
// }



/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
/*                          STORE 
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
// public function store(){
// 	// dd(Input::all());

// 	$adhesion = new Adhesion;
// 	$adhesion->fill(Input::except('adherent', 'adherent2', '_token', '_method'));
// 	$adhesion->is_payed = (Input::get('is_payed')) ? 1 : 0 ;

// 	// return dd($adhesion);
// 	$adhesion->save();
// 	$type = Input::get('type');

// 	switch ($type) {
// 		case 'conso':
// 		$adhesion->personne()->attach(Input::get('adherent'));
// 		break;
		
// 		case 'couple':
// 		$adhesion->personne()->attach(Input::get('adherent'));
// 		$adhesion->personne()->attach(Input::get('adherent2'));
// 		break;
		
// 		case 'pro_personne':
// 		$adhesion->personne()->attach(Input::get('adherent'));
// 		break;
		
// 		case 'pro_structure':
// 		$adhesion->structure()->attach(Input::get('adherent'));
// 		break;
		
// 		default:
// 		dd('problème');
// 		break;
// 	}
// // dd($adhesion);

// }



/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
/*                          EDIT 
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - */

public function edit($id){
	$article  = Article::find($id);

	$article = $this->handleModelEdit($article);

	return $article;
}

private function handleModelEdit($model){
	$model = $this->handleModelIndex($model);

	return $model;
}

/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
/*                          UPDATE 
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - */


  public function update($id)
  {
    // return dd(\Input::all());
    // return 'update de la fiche '.$id;

  $article = Article::find($id);
  $article->titre = Input::get('titre');
  $article->contenu = Input::get('contenu');
  $article->save();
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

  // public function getListForSelect($type, personneG $personneG, structureG $structureG){
  // 	if (in_array($type, $this->type_personne_array)) {
  // 		$liste[0] = "Sélectionnez une personne";
  // 		$liste = $liste + $personneG->listForSelect();
  // 		return $liste;
  // 	}

  // 	if (in_array($type, $this->type_structure_array)) {
  // 		$liste[0] = "Sélectionnez une structure";
  // 		$liste = $liste + $structureG->listForSelect();
  // 		return $liste;
  // 	}	
  // }

  // private function getAdherents($model){
  //   $adherents = array();

  // 	if (count($model->personne)) {
  // 		foreach ($model->personne as $key => $value) {
  // 			$adherents[] = $value->prenom_complet;
  // 		}
  // 	}

  // 	if (count($model->structure)) {
  // 		$adherents[] = $model->structure[0]->rais_soc;
  // 	}

  // 	$model->adherents = $adherents;

		// // return dd($model);
  // 	return $model;
  // }


  // private function setValiditeClasses($model){
  // 	if ($model->validation_is_forced)
  // 	{
  // 		$model->forced_class = "adh_forced";

  // 		if ($model->validation_is_forced == "-1") {
  // 			$model->valid_class = 'adh_invalid';
  // 			$model->valid_etiquette = 'Forcée à : Invalide';
  // 		}

  // 		if ($model->validation_is_forced == "1") {
  // 			$model->valid_class = 'adh_valid';
  // 			$model->valid_etiquette = 'Forcée à : Valide';
  // 		}

  // 	}else{
  // 		$model->forced_class = "";

  // 		if ($model->validite){
  // 			$model->valid_class = 'adh_valid';
  // 			$model->valid_etiquette = 'Valide';
  // 		}else{
  // 			$model->valid_class = 'adh_invalid';
  // 			$model->valid_etiquette = 'Invalide';
  // 		}
  // 	}
		// // return dd($model);
  // 	return $model;
  // }

  // private function setPayedClasse($model){
  // 	if (!$model->is_payed) {
  // 		$model->is_payed_class = "incorrect";
  // 	}else{
  // 		$model->is_payed_class = "";
  // 	}
  // 	return $model;
  // }

}