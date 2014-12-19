<?php namespace App;
use Illuminate\Database\Eloquent\Model;


class Adressable extends Eloquent {

	protected $table = 'adressables';
	public $timestamps = true;


	protected $dates = ['deleted_at'];
	protected $fillable = array('adresse_id', 'adressable_id', 'adressable_type');

}