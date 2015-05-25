<?php namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Media extends Model {

	protected $table = 'medias';
	public $timestamps = true;

	protected $dates = ['deleted_at'];
	protected $fillable = array('');



	public function personnes()
	{
		return $this->morphedByMany('App\\Models\\Personne', 'coordonnable');
	}

	public function structures()
	{
		return $this->morphedByMany('App\\Models\\Structure', 'coordonnable');
	}



}