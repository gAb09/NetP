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


	/* Liste des mails */
	public function listForSelect(){
		$mails = new Mail;
		$mails = $this->getAllSortedBy('valeur', 'App\Models\Mail');
		$liste = array();
		foreach ($mails as $mail) {
			$liste[$mail->id] = $mail->valeur;
		}
		return $liste;
	}


}


