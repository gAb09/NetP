<?php namespace App\Gestion;
use App\Models\Mail;

class MailG{
	use TraitG;

	public function completeModel($model){
		$model = $this->nullVersIndefini($model);
		return $model;
	}



	public function getAll(){
		$collection  = Mail::all();

		$collection->each(function($model) use ($collection)
		{
			$model = $this->completeModel($model);
		});
		return $collection;
	}

	public function getAllSortedBy($sort){
		$collection  = Mail::orderBy($sort)->get();

		$collection->each(function($model) use ($collection)
		{
			$model = $this->completeModel($model);
		});
		return $collection;
	}


}


