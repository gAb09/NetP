<?php namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Telephone extends Model {

	protected $table = 'telephones';
	public $timestamps = true;

	protected $dates = ['deleted_at'];
	protected $fillable = array();

	public function personnes()
	{
		return $this->morphedByMany('App\\Models\\Personne', 'telephonable');
	}

	public function structure()
	{
		return $this->morphedByMany('App\\Models\\Structure', 'coordonnable');
	}

}