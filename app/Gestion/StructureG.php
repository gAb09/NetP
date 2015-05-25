<?php namespace App\Gestion;
use App\Models\Structure;
use App\Gestion\AdresseG as AdresseG;
use App\Gestion\MediaG as MediaG;
use illuminate\Database\Query\Builder;
use Illuminate\Database\Connection;
use Illuminate\Database\Connectors;
use Illuminate\Support\Facades\Input;

class StructureG {
	use TraitG;

	public function getAll(){
		$collection  = Structure::with(array('adresses', 'telephones', 'telephonables', 'qualites'))->orderBy('rais_soc')->get();

// dd($collection);

		$collection->each(function($model) use ($collection)
		{

			$model = $this->completeModel($model); 
		});

		return $collection;
	}



	public function completeModel($model){
		$model = $this->nomComplet($model);
		$model = $this->nullVersIndefini($model);

		return $model;
	}

	public function nomComplet($model){
		$model->getNomCompletAttributes();
		return $model;
	}


	public function listQualites(){
		$qualiteG = new QualiteG;
		$qualites = $qualiteG->getAll();
		$liste = array();
		foreach ($qualites as $qualite) {
			$liste[$qualite->id] = $qualite->libelle;
		}
		return $liste;
	}

	public function listAdresses(){
		$adresseG = new AdresseG;
		$adresses = $adresseG->getAllSortedBy('cp');
		$liste = array();
		foreach ($adresses as $adresse) {
			$liste[$adresse->id] = $adresse->select_adress;
		}
		return $liste;
	}

	public function listCoordonnees(){
		$coordonneeG = new CoordonneeG;
		$coordonnees = $coordonneeG->getAll();
		$liste = array();
		foreach ($coordonnees as $coordonnee) {
			$liste[$coordonnee->id] = $coordonnee->mail1.' - '.$coordonnee->tel1;
		}
		return $liste;
	}


	public function edit($id){
		$structure  = Structure::with(array('adresses', 'coordonnees'))->find($id);
		$structure = $this->completeModel($structure); 


		return $this->nomComplet($structure);
	}


	public function find($id){
		Structure::find($id);
	}



	public function update($id, $input){
// dd($input->all());
		$structure = Structure::find($id); 
// dd($input->get('adresse'));

//AfA prévoir transaction
		$structure->adresses()->sync(array($input->get('adresse')));
		$structure->coordonnees()->sync(array($input->get('coordonnees')));
		$structure->qualites()->sync(array($input->get('qualite')));
			$structure->nom = Input::get('nom');
			// $structure->theme_id = Input::get('theme_id');
			// $type = Input::get('livrable');
			// $structure->livrable_type = $type;
			// $structure->livrable_id = ($type == 'Lib\Editeurs\Editeur') ? Input::get('editeur_id') : Input::get('autoedite_id');
			$structure->save();
	}
}