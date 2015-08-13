<?php

use  App\Models\Personne;
use  App\Models\Media;
use  App\Models\Telephone;
use  App\Models\Coordonnable;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::get('/imap/free/{util}', 'Imap\ImapController@free');

Route::get('/imap', 'Imap\ImapController@index');

Route::resource('adresse', 'AdresseController');
Route::resource('adherent', 'AdherentController');
Route::resource('personne', 'PersonneController');
Route::resource('structure', 'StructureController');
Route::resource('article', 'ArticleController');

Route::get('adhesion/create/{type}', ['as' => 'adhesion.create', 'uses' => 'AdhesionController@create']);
Route::resource('adhesion', 'AdhesionController', ['except' => array('create')]);


Route::get('ck', function(){
	return View::make('ck');
});


Route::get('ad', function(){
	$test = Personne::with('adresses')->find(10);
	return var_dump($test->toArray());
	return var_dump($test);
});

Route::get('able', function(){
	$test = Coordonnable::with('mails', 'telephones')->get();
	return var_dump($test->toArray());
	return var_dump($test);
	// return var_dump($test[0]->personne);
});


// Route::get('able', function(){
// 	$test = Coordonnable::whereHas('personne', function($query){
// 		$query->where('personnes.id', 'like', 7);
// 	})->toSql();
// 	return var_dump($test);
// 	// return var_dump($test[0]->personne);
// });


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
