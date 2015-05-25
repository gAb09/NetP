<?php namespace App\Gestion;
use App\Models\Personne;
use App\Models\Structure;
use App\Gestion\AdresseG as Adresse;
use App\Gestion\MediaG as Media;
use App\Gestion\QualiteG as Qualite;
// use App\Gestion\StructureG as Structure;
use illuminate\Database\Query\Builder;
use Illuminate\Database\Connection;
use Illuminate\Database\Connectors;
use Illuminate\Support\Facades\Input;

class AdherentG {
	use TraitG;

	public function index(){
		$personnes  = Personne::complet()
		->whereHas('qualites', function($q)
		{
			$q->whereIn('qualite_id', ['1', '2']);
		})
		->orderBy('nom')
		->get();

		$structures  = Structure::complet()
		->whereHas('qualites', function($q)
		{
			$q->where('qualite_id', '=', '1');
		})
		->orderBy('rais_soc')
		->get();

		$collection = $personnes->merge($structures);
// dd($collection);

		$collection->each(function($model)
		{
			// var_dump($model->nom);
			$model = $this->completeModel($model); 
		});

// dd($collection->toArray());

		return $collection;
	}


	public function completeModel($model){
		$model->getNomCompletAttributes();
		$model = $this->nullVersIndefini($model);
		// $model = $this->LiedAdhesionPro($model);

		return $model;
	}


	public function LiedAdhesionPro($model){
		foreach ($model->qualites as $qualite) {
			if ($qualite->id == 3) {
				if ($model->structures->count()) {
					$qualite->libelle = "Adhérent profesionnel  :<br />".$model->structures[0]->nom;
				}
			}
			if ($qualite->id == 1) {
				$qualite->libelle = "Adhérent profesionnel en nom propre";
			}
		}
		return $model;
	}

/* - - - - - - - - - - - - - - - - - - - - - - - - - 
Composition des listes pour les input select 
- - - - - - - - - - - - - - - - - - - - - - - - - */

/* Liste des qualités */
public function listQualites(){
	$qualites = new Qualite;
	$qualites = $qualites->getAll();
	$liste = array();
	foreach ($qualites as $qualite) {
		$liste[$qualite->id] = $qualite->libelle;
	}
	return $liste;
}

/* Liste des adresses */
public function listAdresses(){
	$adresses = new Adresse;
	$adresses = $adresses->getAllSortedBy('cp');
	$liste = array();
	foreach ($adresses as $adresse) {
		$liste[$adresse->id] = $adresse->select_adress;
	}
	return $liste;
}

/* Liste des coordonnées */
public function listMedias(){
	$coordonnees = new Media;
	$coordonnees = $coordonnees->getAll();
	$liste = array();
	foreach ($coordonnees as $coordonnee) {
		$liste[$coordonnee->id] = $coordonnee->mail1.' - '.$coordonnee->tel1;
	}
	return $liste;
}

/* Liste des structures */
public function listStructures(){
	$structures = new Structure;
	$structures = $structures->getAll();
	$liste = array();
	foreach ($structures as $structure) {
		$liste[$structure->id] = $structure->prenom.' - '.$structure->nom;
	}
	return $liste;
}




public function edit($id){
	$personne  = Personne::with(array('adresses', 'coordonnees', 'structures'))->find($id);
	$personne = $this->completeModel($personne); 
	return $personne;
}


public function find($id){
	Personne::find($id);
}



public function update($id, $input){
// dd($input->all());
	$personne = Personne::find($id); 
// dd($input->get('adresse'));

//AfA prévoir transaction
	$personne->adresses()->sync(array($input->get('adresse')));
	$personne->coordonnees()->sync(array($input->get('coordonnees')));
	$personne->qualites()->sync(array($input->get('qualite')));
	$personne->structures()->sync(array($input->get('structure')));
	$personne->nom = Input::get('nom');
			// $personne->theme_id = Input::get('theme_id');
			// $type = Input::get('livrable');
			// $personne->livrable_type = $type;
			// $personne->livrable_id = ($type == 'Lib\Editeurs\Editeur') ? Input::get('editeur_id') : Input::get('autoedite_id');
	$personne->save();
}
}