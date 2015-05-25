<?php namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Mailable extends Model {

	protected $table = 'mailables';
	public $timestamps = true;

	protected $dates = ['deleted_at'];
	protected $fillable = array('');






}