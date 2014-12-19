<?php namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Personne extends Model {

	protected $table = 'personnes';
	public $timestamps = true;


	protected $dates = ['deleted_at'];
	protected $fillable = array('Nom', 'Prenom');

	public function adresse()
	{
		return $this->morphToMany('Adresse', 'adressable');
	}

}