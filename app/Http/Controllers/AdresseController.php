<?php namespace App\Http\Controllers;

use App\Models\Adresse;
use App\Gestion\AdresseG as Gestion;

class AdresseController extends Controller {


  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
  	$this->gestion = new Gestion();
  	$adresses = $this->gestion->getAll();
  	return view('Adresses/index')->with(compact('adresses'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store()
  {

  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {

  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {

  }
  
}

?>