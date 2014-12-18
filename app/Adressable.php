<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Adressable extends Eloquent {

	protected $table = 'adressables';
	public $timestamps = true;

	use SoftDeletingTrait;

	protected $dates = ['deleted_at'];
	protected $fillable = array('adresse_id', 'adressable_id', 'adressable_type');

}