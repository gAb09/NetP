<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Adhesion extends Model {

	protected $table = 'adhesions';
	public $timestamps = true;

	protected $dates = ['deleted_at'];
	protected $guarded = array('id');


	public function personne()
	{
		return $this->morphedByMany('App\\Models\\Personne', 'adherable')->withPivot('adherable_type');
	}

	public function structure()
	{
		return $this->morphedByMany('App\\Models\\Structure', 'adherable')->withPivot('adherable_type');
	}


	public function getEtiquetteAttribute()
	{
		if($this->attributes['type'] == 'conso') return 'Consommateur';
		if($this->attributes['type'] == 'couple') return 'Couple';
		if($this->attributes['type'] == 'pro_personne') return 'Professionnelle en nom propre';
		if($this->attributes['type'] == 'pro_structure') return 'Professionnelle (Structure)';

	}

	public function getValidationAttribute()
	{
		if ($this->attributes['is_forced'] == 0){
			if ($this->getValidite()) {
				return 2;
			}
			return 3;
		}else{
			if ($this->attributes['is_forced'] == 1) {
				return 1;
			}
			return 4;
		}
	}

	public function getValidite()
	{
			if ($this->attributes['is_payed']) {
				return true;
			}
	}

}

