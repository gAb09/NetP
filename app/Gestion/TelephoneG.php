<?php namespace App\Gestion;
use App\Models\Telephone;

class TelephoneG{
	use TraitG;

	public function completeModel($model){
		$model = $this->nullVersIndefini($model);
		return $model;
	}



	public function getAll(){
		$collection  = Telephone::all();

		$collection->each(function($model) use ($collection)
		{
			$model = $this->completeModel($model);
		});
		return $collection;
	}

	public function getAllSortedBy($sort){
		$collection  = Telephone::orderBy($sort)->get();

		$collection->each(function($model) use ($collection)
		{
			$model = $this->completeModel($model);
		});
		return $collection;
	}


}


