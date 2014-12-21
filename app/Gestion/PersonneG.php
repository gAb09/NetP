<?php namespace App\Gestion;
use App\Models\Personne;

class PersonneG {

	public function getAll(){
		$collection  = Personne::with(array('adresses', 'contacts'))->get();

// dd($collection);

		$collection->each(function($model) use ($collection)
		{

			foreach ($model['attributes'] as $attribute => $value)
			{
				if ($attribute != "deleted_at" and is_null($value))
				{
					$model[$attribute] = "???";
					$model->{$attribute."_class"} = "indefini";
				}else{
					$model->{$attribute."_class"} = "";
				}
			}

			$model->nomcomplet = $model->prenom.' '.$model->nom;
			if ($model->prenom == "???" or $model->nom == "???") {
				$model->nomcomplet_class = 'indefini';
			}else{
				$model->nomcomplet_class = '';
			}
		});

// dd($collection->toArray());

		return $collection->toArray();
	}

}

