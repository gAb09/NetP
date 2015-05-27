<?php namespace App\Gestion;
use App\Models\Personne;
use App\Gestion\TelephoneG as Telephone;
use App\Gestion\MailG as Mail;
use App\Gestion\AdresseG as Adresse;
use App\Gestion\QualiteG as Qualite;
use App\Gestion\StructureG as Structure;
use illuminate\Database\Query\Builder;
use Illuminate\Database\Connection;
use Illuminate\Database\Connectors;
use Illuminate\Support\Facades\Input;

class PersonneG {
	use TraitG;

	public function index(){
		$collection  = Personne::complet()->orderBy('nom')->get();

		$collection->each(function($model)
		{
			$model = $this->completeModel($model); 
		});

		return $collection;
	}



	public function completeModel($model){
		$model->getNomCompletAttributes();
		$model = $this->nullVersIndefini($model);
		$model = $this->StructureLied($model);
		$model = $this->classeParRang($model, 'telephones');
		$model = $this->classeParRang($model, 'mails');
		$model = $this->classeParRang($model, 'qualites');

		return $model;
	}


	public function StructureLied($model){
		foreach ($model->qualites as $qualite) /* Pour chaque qualité de la personne */
		{
			if ($qualite->appel_structure == 1)  /* Si cette "qualité" appelle une structure on recherche cette dernière. */
			{
				$structure_lied = $this->searchStructureLied($model, $qualite->pivot->id);
				if ($structure_lied)
				{
					$qualite->structure_lied = $structure_lied;
				}else{
					$qualite->structure_lied = false;
				}
			}
		}
		return $model;
	}




	public function searchStructureLied($model, $id){

		if ($model->structures->count())/* On vérifie qu'il y a bien au moins une structure liée */
		{
			foreach ($model->structures as $structure) /* Pour chaque structure liée */
			{
				if ($structure->pivot->relation == $id)  /* On cherche la correspondance avec l'id de la relation "qualifiables" */
				{
					return $structure->rais_soc;
				}
			}
		}
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
		// var_dump($personne->toArray());
		// dd(Input::all());


		$personne->prenom =  Input::get('prenom');
		$personne->nom = Input::get('nom');
		// $personne->pseudo =  Input::get('pseudo');
		\DB::transaction(function() use($personne)
		{  
			if (Input::get('adresse')) {
				$personne->adresses()->sync(Input::get('adresse'));
			}

			if (Input::get('qualite')) {
				$personne->qualites()->sync(Input::get('qualite'));
			}

			if (Input::get('telephone')) {
				$personne->telephones()->sync(Input::get('telephone'));
			}

			if (Input::get('mail')) {
				$personne->mails()->sync(Input::get('mail'));
			}

			if (Input::get('structure')) {
				$personne->structures()->sync(Input::get('structure'));
			}

			$personne->save();
			$personne->push();
		});

		// $personne = Personne::complet()->find($id); 
		// dd($personne->toArray());

	}
}