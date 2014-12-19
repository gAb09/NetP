<?php namespace App;
use Illuminate\Database\Eloquent\Model;


class Structure extends Model {

	protected $table = 'structures';
	public $timestamps = true;


	protected $dates = ['deleted_at'];

	public function adresse()
	{
		return $this->morphToMany('App\Adresse', 'adressable');
	}

}