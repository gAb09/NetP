<?php namespace App\Gestion;
use App\Models\Contact;

trait TraitG{

	public function nullVersIndefini($model){
		foreach ($model['attributes'] as $attribute => $value)
		{
			if ($attribute != "deleted_at" and is_null($value))
			{
				$model[$attribute] = "Indéfini";
				$model->{$attribute."_class"} = "indefini";
			}

			if ($model->prenom == 'Indéfini' or $model->nom == 'Indéfini') {
				$model->nom_complet_class = 'indefiniTxt';
			}else{
				$model->nom_complet_class = '';
			}
		}
		return $model;
	}

	public function classeParRang($model, $collection_name){
		$collection = $model->$collection_name;

		foreach ($collection as $item)
		{
			if ($collection->count() == 1)
			{
				$item->rang = 1;
				return $model;
			}

			$item->rang = $item->pivot->rang;
		}

		$collection->sortBy('rang');
		
		return $model;
	}




	public function isPrincipal($model, $media){
		$medias = $media.'s';
		foreach ($model->$medias as $$media) {
			$condition = $model->$medias->count() == 1 || $$media->pivot->principal == 1;
			if ($condition)
			{
				$$media->is_principal = 1;
			}else{
				$$media->is_principal = 0;
			}

		}
		return $model;
	}

}