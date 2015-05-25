<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Structure extends Model {

	protected $table = 'structures';
	public $timestamps = true;

	protected $dates = ['deleted_at'];
	protected $fillable = array('Nom', 'Prenom');




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
		return $this->morphToMany('App\\Models\\Telephone', 'telephonable');
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
		return $this->morphToMany('App\\Models\\Qualite', 'qualifiable');
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
			'qualites'
			));
    }

	public function getNomCompletAttributes()
	{
		$this->attributes['nom_complet'] = 
		$this->prenom.' '.$this->nom;
	}


}