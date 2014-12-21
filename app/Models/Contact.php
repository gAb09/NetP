<?php namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model {

	protected $table = 'contacts';
	public $timestamps = true;

	protected $dates = ['deleted_at'];
	protected $fillable = array('ad1', 'ad2', 'cp', 'ville');

	public function personne()
	{
		return $this->morphedByMany('App\\Models\\Personne', 'contactable');
	}

	public function structure()
	{
		return $this->morphedByMany('App\\Models\\Structure', 'contactable');
	}

}