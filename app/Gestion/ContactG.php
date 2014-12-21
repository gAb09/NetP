<?php namespace App\Gestion;
use App\Models\Contact;

class ContactG{

	public function completeModel($model){
		$model = $this->nullVersIndefini($model);
		$model = $this->concatContact($model);
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


	public function concatContact($model){
		$model->contact = 
		$model->ad1
		.' '.$model->ad2
		.' - '.$model->cp
		.' '.$model->ville
		;

			return $model;
		}



		public function getAll(){
			$collection  = Contact::all();

			$collection->each(function($model) use ($collection)
			{
				$model = $this->completeModel($model);
			});
			return $collection;
		}

	}


