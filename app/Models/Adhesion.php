<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Adhesion extends Model {

	protected $table = 'adhesions';
	public $timestamps = true;

	protected $dates = ['deleted_at'];
	protected $guarded = array('id');


	public function personne()
	{
		return $this->morphedByMany('App\\Models\\Personne', 'adherable')->withPivot('adherable_type')->withTimestamps();
	}

	public function structure()
	{
		return $this->morphedByMany('App\\Models\\Structure', 'adherable')->withPivot('adherable_type')->withTimestamps();
	}


	public function getEtiquetteAttribute()
	{
		if($this->attributes['type'] == 'conso') return 'Consommateur';
		if($this->attributes['type'] == 'couple') return 'Couple';
		if($this->attributes['type'] == 'pro_personne') return 'Professionnelle en nom propre';
		if($this->attributes['type'] == 'pro_structure') return 'Professionnelle (Structure)';

	}

	public function getValidationIsForcedAttribute()
	{
		if ($this->attributes['is_forced'] == "-1")
		{
			return "-1";
		}

		if ($this->attributes['is_forced'] == "1")
		{
			return "1";
		}

		return false;
	}


	public function getValiditeAttribute()
	{
		if ($this->attributes['is_payed'])
		{
			return true;
		}
	}

}

