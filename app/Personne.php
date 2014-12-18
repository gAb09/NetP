<?php namespace App;
use Illuminate\Database\Eloquent\Model;

// use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Personne extends Model {

	protected $table = 'personnes';
	public $timestamps = true;

	// use SoftDeletingTrait;

	protected $dates = ['deleted_at'];
	protected $fillable = array('Nom', 'Prenom');

	public function adresse()
	{
		return $this->morphToMany('Adresse', 'adressable');
	}

}