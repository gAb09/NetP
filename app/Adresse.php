<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

// use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Adresse extends Model {

	protected $table = 'adresses';
	public $timestamps = true;

	// use SoftDeletingTrait;

	protected $dates = ['deleted_at'];
	protected $fillable = array('ad1', 'ad2', 'cp', 'ville');

	public function personne()
	{
		return $this->morphedByMany('App\Personne', 'adressable');
	}

	public function structure()
	{
		return $this->morphedByMany('App\Structure', 'adressable');
	}

}