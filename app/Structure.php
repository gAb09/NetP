<?php namespace App;
use Illuminate\Database\Eloquent\Model;

// use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Structure extends Model {

	protected $table = 'structures';
	public $timestamps = true;

	// use SoftDeletingTrait;

	protected $dates = ['deleted_at'];

	public function adresse()
	{
		return $this->morphToMany('App\Adresse', 'adressable');
	}

}