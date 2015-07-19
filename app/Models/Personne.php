<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Personne extends Model {

	protected $table = 'personnes';
	public $timestamps = true;

	protected $dates = ['deleted_at'];
	protected $fillable = array('Nom', 'Prenom');

	protected $appends = array('nom_complet', 'prenom_complet');


	public function adresses()
	{
		return $this->morphToMany('App\\Models\\Adresse', 'adressable');
	}

	public function adressables()
	{
		return $this->hasMany('App\\Models\\Adressable', 'adressable_id');
	}

	public function telephones()
	{
		return $this->morphToMany('App\\Models\\Telephone', 'telephonable')->withPivot('rang', 'etiquette', 'note');
	}

	public function telephonables()
	{
		return $this->hasMany('App\\Models\\Telephonable', 'telephonable_id');
	}

	public function mails()
	{
		return $this->morphToMany('App\\Models\\Mail', 'mailable');
	}

	public function mailables()
	{
		return $this->hasMany('App\\Models\\Mailable', 'mailable_id');
	}

	public function qualites()
	{
		return $this->morphToMany('App\\Models\\Qualite', 'qualifiable')->withPivot('id', 'rang', 'structure_id');
	}

	public function structures()
	{
		return $this->belongsToMany('App\\Models\\Structure')->withPivot('relation');
	}

	public function adhesions()
	{
		return $this->morphToMany('App\\Models\\Adhesion', 'adherable')->withPivot('id');
	}


	public function scopeComplet($query)
	{
		return $query->with(array(
			'adresses',
			'adressables',
			'telephones',
			'telephonables',
			'mails',
			'mailables',
			'qualites',
			'structures'
			));
	}

	public function getPrenomCompletAttribute()
	{
		return $this->attributes['prenom_complet'] = "$this->prenom $this->nom";
	}

	public function getNomCompletAttribute()
	{
		return $this->attributes['nom_complet'] = "$this->nom $this->prenom";
	}


}