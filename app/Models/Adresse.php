<?php namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Adresse extends Model {

	protected $table = 'adresses';
	public $timestamps = true;

	protected $dates = ['deleted_at'];
	protected $fillable = array('ad1', 'ad2', 'cp', 'ville');

	public function personne()
	{
		return $this->morphedByMany('App\\Models\\Personne', 'adressable');
	}

	public function structure()
	{
		return $this->morphedByMany('App\\Models\\Structure', 'adressable');
	}

}