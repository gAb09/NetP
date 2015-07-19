<?php namespace App\Gestion;
use App\Models\Personne;
use App\Models\Structure;
use App\Gestion\TelephoneG as Telephone;
use App\Gestion\MailG as Mail;
use App\Gestion\AdresseG as Adresse;
use App\Gestion\QualiteG as Qualite;
use App\Gestion\StructureG;
use illuminate\Database\Query\Builder;
use Illuminate\Database\Connection;
use Illuminate\Database\Connectors;
use Illuminate\Support\Facades\Input;

class PersonneG {
	use TraitG;

	public function getAll(){
		$collection  = Personne::complet()->orderBy('nom')->get();

		$collection->each(function($model)
		{
			$model = $this->completeModel($model); 
		});

		return $collection;
	}



	public function completeModel($model){
		// return dd($model);
		$model = $this->nullVersIndefini($model);
		// $model = $this->StructureLied($model);
		// $model = $this->classeParRang($model, 'adresses');
		$model = $this->classeParRang($model, 'telephones');
		$model = $this->classeParRang($model, 'mails');
		$model = $this->classeParRang($model, 'qualites');
		// $model = $this->classeParRang($model, 'structures');

		return $model;
	}


	public function StructureLied($model){
		foreach ($model->qualites as $qualite) /* Pour chaque qualité de la personne */
		{
			if ($qualite->appel_structure == 1)  /* Si cette "qualité" appelle une structure on recherche cette dernière. */
			{
				$structure_lied = $this->searchStructureLied($qualite);

				if (is_object($structure_lied))
				{
					$qualite->structure_lied = $structure_lied;
				}else{

					$qualite->structure_lied = false;
				}
			}
		}
		return $model;
	}




	public function searchStructureLied($qualite){

		// if ($qualite->pivot->structure_id)/* On vérifie qu'il y a bien une structure liée */
		// {

		return Structure::find($qualite->pivot->structure_id);
		// }
	}






	public function edit($id){
		$personne  = Personne::complet()->find($id);
		$personne = $this->completeModel($personne); 
		return $personne;
	}


	public function find($id){
		Personne::find($id);
	}



	public function update($id){

		$personne = Personne::complet()->find($id); 

		$personne->prenom =  Input::get('prenom');
		$personne->nom = Input::get('nom');
		// $personne->pseudo =  Input::get('pseudo');
		
		// var_dump($personne->relations->toArray());
		// dd($personne->qualites->toArray());
		var_dump(Input::all());
		var_dump($personne->qualites->toArray());

		\DB::transaction(function() use($personne)
		{  
			if (Input::get('adresse')) {
				$personne->adresses()->sync(Input::get('adresse'));
			}

			if (Input::get('qualite')) {
				var_dump($personne->qualites()->sync(Input::get('qualite')));
			}


			var_dump($personne->qualites()->sync(Input::get('relation')));
			foreach (Input::get('relation') as $key => $value) {

			}


			if (Input::get('telephone')) {
				$personne->telephones()->sync(Input::get('telephone'));
			}

			if (Input::get('mail')) {
				$personne->mails()->sync(Input::get('mail'));
			}

			var_dump($personne->qualites->toArray());
			dd('stop save');

			$personne->save();
			$personne->push();
		});

		// $personne = Personne::complet()->find($id); 
		// dd($personne->toArray());

	}

	public function listForSelect($sort = 'nom'){
		$personnes = $this->getAllSortedBy($sort, 'App\Models\Personne');
		$liste = array();
		foreach ($personnes as $personne) {
			$liste[$personne->id] = $personne->nom_complet;
		}
		return $liste;
	}


}