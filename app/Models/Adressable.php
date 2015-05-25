<?php namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Adressable extends Model {

	protected $table = 'adressables';
	public $timestamps = true;

	protected $dates = ['deleted_at'];
	protected $fillable = array('');






}