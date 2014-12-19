<?php namespace App\Gestion;
use App\Models\Personne;

class PersonneG{

	public function getAll(){
		$collection  = Personne::orderBy('statut', 'desc', 'nom', 'asc')->paginate(9);

		$collection->each(function($model) use ($collection)
		{
			foreach ($model['attributes'] as $attribute => $value)
			{
				if ($attribute != "deleted_at" and is_null($value))
				{
					$model[$attribute] = "Indéfini";
					$model->{$attribute."_class"} = "indefini";
				}
			}
			$model->nomcomplet = $model->prenom.' '.$model->nom;
			if ($model->prenom == "Indéfini" or $model->nom == "Indéfini") {
				$model->nomcomplet_class = 'indefini';
			}
		});
		return $collection;
	}

}


