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
		$collection  = Structure::complet()->orderBy('rais_soc')->get();

// var_dump($collection->toArray());

		$collection->each(function($model) use ($collection)
		{

			$model = $this->completeModel($model); 
		});
// dd($collection->toArray());

		return $collection;
	}


	public function create(){
		$structure = new Structure;
		$structure->rais_soc = 0;
		$structure->test = 0;
		$structure->select_option = array('adresse' => 0, 'telephone' => 0, 'mail' => 0);

		return $structure;
	}

	public function store()
	{
        // dd(Input::all());
		$structure = new Structure;
		$structure->rais_soc = Input::get('rais_soc');

		\DB::transaction(function() use($structure)
		{   
			$structure->save();
			$structure->qualites()->attach(array_unique(Input::get('qualite')));
			$structure->adresses()->attach(array_unique(Input::get('adresse')));
			$structure->telephones()->attach(array_unique(Input::get('telephone')));
			$structure->mails()->attach(array_unique(Input::get('mail')));
		});		
	}


	public function edit($id){
		$structure  = Structure::complet()->find($id);
		$structure = $this->completeModel($structure); 
		return $structure;
	}


	public function completeModel($model){
		$model = $this->nullVersIndefini($model);

		return $model;
	}



	public function find($id){
		Structure::find($id);
	}



	public function update($id){

		$structure = Structure::complet()->find($id); 

		$structure->rais_soc = Input::get('rais_soc');

		\DB::transaction(function() use($structure)
		{
			if (Input::get('adresse')) {
				$structure->adresses()->sync(Input::get('adresse'));
			}

			if (Input::get('qualite')) {
				$structure->qualites()->sync(Input::get('qualite'));
			}

			if (Input::get('telephone')) {
				$structure->telephones()->sync(Input::get('telephone'));
			}

			if (Input::get('mail')) {
				$structure->mails()->sync(Input::get('mail'));
			}

		});

		$structure->save();
		$structure->push();
	}

	/* Liste des structures */
	public function listForSelect($sort = 'rais_soc'){
		$structures = new Structure;
		$structures = $this->getAllSortedBy($sort, 'App\Models\Structure');
		$liste = array();
		foreach ($structures as $structure) {
			$liste[$structure->id] = $structure->rais_soc;
		}
		return $liste;
	}



}