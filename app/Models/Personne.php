<?php namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Personne extends Model {

	protected $table = 'personnes';
	public $timestamps = true;


	protected $dates = ['deleted_at'];
	protected $fillable = array('Nom', 'Prenom');

	public function adresses()
	{
		return $this->morphToMany('App\\Models\\Adresse', 'adressable');
	}

	public function contacts()
	{
		return $this->morphToMany('App\\Models\\Contact', 'contactable');
	}

}