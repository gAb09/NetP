<?php namespace App\Gestion;
use App\Models\Adresse;

class AdresseG{

	public function completeModel($model){
		$model = $this->nullVersIndefini($model);
		$model = $this->concatAdresse($model);
		return $model;
	}


	public function nullVersIndefini($model){
		foreach ($model['attributes'] as $attribute => $value)
		{
			if ($attribute != "deleted_at" and is_null($value))
			{
				$model[$attribute] = "Indéfini";
				$model->{$attribute."_class"} = "indefini";
			}
		}

		return $model;
	}


	public function concatAdresse($model){
		$model->adresse = 
		$model->ad1
		.' '.$model->ad2
		.' - '.$model->cp
		.' '.$model->ville
		;

			return $model;
		}



		public function getAll(){
			$collection  = Adresse::all();

			$collection->each(function($model) use ($collection)
			{
				$model = $this->completeModel($model);
			});
			return $collection;
		}

	}


